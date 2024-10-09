<?php

namespace App\Http\Controllers;
use App\Equipos;
use App\Analisis;
use App\Servicios;
use App\Clientes;
use App\Tiempo;
use App\Material;
use App\Solicitudes;
use App\Activos;
use App\Ubicaciones;
use App\User;
use App\Recetas;
use App\RecetasItems;
use App\Orden;
use App\OrdenItems;
use App\OrdenIteml;
use App\Medicamentos;
use App\Pacientes;
use App\ResultadosServicios;
use App\Proformas;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Style\Font;
use File;



class ProformasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        if($request->inicio){
            $f1 = $request->inicio;
            $f2 = $request->fin;


        $proformas = DB::table('proformas as a')
        ->select('a.id','a.id_paciente','a.modelo','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.apellidos1')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f2))])
        ->get(); 

        } else {
            $f1 =date('Y-m-d');
            $f2 = date('Y-m-d');

            $proformas = DB::table('proformas as a')
            ->select('a.id','a.id_paciente','a.modelo','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.apellidos1')
            ->join('pacientes as b','b.id','a.id_paciente')
            ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime($f1)))
            ->get(); 

        }
       

        return view('proformas.index', compact('proformas','f1','f2'));
        //
    }

    public function modelo_informe($id,$informe)
    {

        File::delete(File::glob('*.docx'));
        $informe = $templateProcessor = new TemplateProcessor(public_path('modelos_informes/'.$informe));
   

        $proformas = DB::table('proformas as a')
        ->select('a.id','a.id_paciente','a.modelo','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.dni','b.apellidos1','b.fechanac')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->where('a.id','=', $id)
        ->first(); 


  
        if ($proformas->fechanac != null) {
            $edad = Carbon::parse($proformas->fechanac)->age;
        } else {
          $edad = "X";

        }

  
        $informe->setValue('name', $proformas->apellidos. ' '.$proformas->nombres. ' Edad: '.$edad);
        $informe->setValue('descripcion',$proformas->modelo);
        $informe->setValue('date',date('d-m-Y'));  
        $informe->saveAs($proformas->id.'-'.$proformas->apellidos.'-'.$proformas->nombres.'-'.$proformas->dni.'.docx');
        return response()->download($proformas->id.'-'.$proformas->apellidos.'-'.$proformas->nombres.'-'.$proformas->dni.'.docx');

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

        $pacientes = Pacientes::where('estatus','=', 1)->orderby('apellidos','asc')->get();


        return view('proformas.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd($request->all());
        
        $orden = new Proformas();
        $orden->id_paciente =$request->paciente;
        $orden->usuario =Auth::user()->id;
        $orden->estatus = 1;
        $orden->modelo =$request->modelo;
        $orden->save();

        return redirect()->action('ProformasController@index')
        ->with('success','Creado Exitosamente!');


    }

    public function ver($id)
    {

      $orden = DB::table('orden as a')
      ->select('a.id','a.id_paciente','a.created_at')
      ->where('a.id', '=', $id)
      ->first(); 

      $paciente = Pacientes::where('id','=',$orden->id_paciente)->first();
      $edad = Carbon::parse($paciente->fechanac)->age;

      $items = DB::table('orden_items as a')
      ->select('a.*','u.nombre as servicio')
      ->join('servicios as u','u.id','a.id_servicio')
      ->where('a.id_orden', '=',$id)
      ->get(); 


      $iteml = DB::table('orden_iteml as a')
      ->select('a.*','u.nombre as analisis')
      ->join('analisis as u','u.id','a.id_lab')
      ->where('a.id_orden', '=',$id)
      ->get(); 


      $view = \View::make('orden.pdf', compact('paciente','orden','edad','items', 'iteml'));

      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
   
     
      return $pdf->stream('report-orden'.'.pdf');

    }

    
    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analisis  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orden = DB::table('orden as a')
        ->select('a.id','a.id_paciente','a.created_at')
        ->where('a.id', '=', $id)
        ->first(); 
  
        $paciente = Pacientes::where('id','=',$orden->id_paciente)->first();
        $edad = Carbon::parse($paciente->fechanac)->age;
  
        $item = DB::table('orden_items as a')
        ->select('a.*','u.nombre as servicio')
        ->join('servicios as u','u.id','a.id_servicio')
        ->where('a.id_orden', '=',$id)
        ->get(); 
  
  
        $iteml = DB::table('orden_iteml as a')
        ->select('a.*','u.nombre as analisis')
        ->join('analisis as u','u.id','a.id_lab')
        ->where('a.id_orden', '=',$id)
        ->get(); 



        return view('orden.edit', compact('item','iteml','orden'));
    }

    public function upload($id)
    {
        
  
        $proforma = Proformas::where('id','=',$id)->first();
      
        return view('proformas.upload', compact('proforma'));
    }

    public function uploadPost(Request $request)
    {

      $p = Proformas::find($request->id);
      $img = $request->file('archivo');
      $nombre_imagen=$img->getClientOriginalName();
      $p->proforma=$nombre_imagen;
      $p->estatus= 2;
      if ($p->update()) {
        \Storage::disk('public')->put($nombre_imagen, \File::get($img));
        }
      \DB::commit();     
       return redirect()->action('ProformasController@index');


    }


    public function editItem($id)
    {

        $servicios = DB::table('servicios as a')
        ->select('a.id','a.nombre','a.tipo')
        ->orderby('a.nombre','asc')
        ->where('a.tipo','=','SERVICIOS')
        ->where('a.estatus', '=', 1)
        ->get(); 
    
      

        $item = DB::table('orden_items as a')
        ->select('a.*')
        ->where('a.id', '=',$id)
        ->first(); 
  



        return view('orden.edit-item', compact('item','servicios'));
    }

    public function editItemL($id)
    {

        $analisis = Analisis::where('estatus','=',1)->orderby('nombre','asc')->get();

    
       
  
        $iteml = DB::table('orden_iteml as a')
        ->select('a.*')
        ->where('a.id', '=',$id)
        ->first(); 



        return view('orden.edit-iteml', compact('iteml','analisis'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analisis $analisis)
    {


       

      $p = Activos::find($request->id);
      $p->nombre =$request->nombre;
      $p->descripcion =$request->descripcion;
      $p->precio =$request->precio;
      $p->estado =$request->estado;
      $p->ubicacion =$request->ubicacion;
      $p->estatus =$request->estatus;
      $res = $p->update();
    
    
    return redirect()->action('ActivosController@index')
    ->with('success','Modificado Exitosamente!');

        //
    }

    public function updatel(Request $request)
    {


      $p = OrdenItemL::find($request->id);
      $p->id_lab =$request->analisis;
      $res = $p->update();
    
    
      return redirect()->route('ordenes.edit', [$request->orden]);


        //
    }

    public function updates(Request $request)
    {


       

      $p = OrdenItems::find($request->id);
      $p->id_servicio =$request->servicio;
      $res = $p->update();
    
    
      return redirect()->route('ordenes.edit', [$request->orden]);

        //
    }

  
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $analisis = Proformas::find($id);
        $analisis->delete();

        return redirect()->action('ProformasController@index');

    }

    public function deletes($id)
    {

        $analisis = OrdenItems::find($id);
        $analisis->delete();

        return back();

        //
    }

    public function deletel($id)
    {

        $analisis = OrdenItemL::find($id);
        $analisis->delete();

        return back();

        //
    }

    public function deletea($id)
    {

        $analisis = Activos::find($id);
        $analisis->estatus = 99;
        $analisis->save();

        return redirect()->action('ActivosController@index');

        //
    }
}

