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
use App\Medicamentos;
use App\Pacientes;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class OrdenesController extends Controller
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


        $ordenes = DB::table('orden as a')
        ->select('a.id','a.id_paciente','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.apellidos1')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f2))])
        ->get(); 

        } else {
            $f1 =date('Y-m-d');
            $f2 = date('Y-m-d');

            $ordenes = DB::table('orden as a')
            ->select('a.id','a.id_paciente','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.apellidos1')
            ->join('pacientes as b','b.id','a.id_paciente')
            ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime($f1)))
            ->get(); 

        }
       

        return view('orden.index', compact('ordenes','f1','f2'));
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = DB::table('servicios as a')
        ->select('a.id','a.nombre','a.tipo')
        ->orderby('a.nombre','asc')
        ->where('a.tipo','=','ORDENES')
        ->where('a.estatus', '=', 1)
        ->get(); 
        
        $pacientes = Pacientes::where('estatus','=',1)->orderby('apellidos','asc')->get();

        return view('orden.create', compact('servicios','pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $orden = new Orden();
        $orden->id_paciente =$request->paciente;
        $orden->usuario =Auth::user()->id;
        $orden->save();

    
        if (isset($request->id_laboratorio)) {
            foreach ($request->id_laboratorio['laboratorios'] as $key => $lab) {
              if (!is_null($lab['laboratorio'])) {


               $items= new OrdenItems();
               $items->id_orden =$orden->id;
               $items->id_servicio =$lab['laboratorio'];
               $items->save();

              
            }
          }

        }


        return redirect()->action('OrdenesController@index')
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

      $view = \View::make('orden.pdf', compact('paciente','orden','edad','items'));

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
       
        $activo = Activos::where('id','=',$id)->first();
        $ubicaciones = Ubicaciones::all();

        return view('activos.edit', compact('activo','ubicaciones')); //
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

  
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $analisis = Ordenes::find($id);
        $analisis->estatus = 0;
        $analisis->save();

        return redirect()->action('OrdenesController@index');

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
