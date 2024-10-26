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
use App\Medicamentos;
use App\Pacientes;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class RecetasController extends Controller
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


        $recetas = DB::table('receta as a')
        ->select('a.id','a.id_paciente','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.apellidos1')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->where('a.estatus', '=', 1)
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f2))])
        ->get(); 

        } else {
            $f1 =date('Y-m-d');
            $f2 = date('Y-m-d');

            $recetas = DB::table('receta as a')
            ->select('a.id','a.id_paciente','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.apellidos1')
            ->join('pacientes as b','b.id','a.id_paciente')
            ->where('a.estatus', '=', 1)
            ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime($f1)))
            ->get(); 

        }
       

        return view('recetas.index', compact('recetas','f1','f2'));
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $medicamentos = DB::table('medicamentos as a')
        ->select('a.id','a.nombre','a.principio','a.estatus')
        ->where('a.estatus', '=', 1)
        ->orderby('a.nombre','asc')
        ->get(); 
        

        if(!is_null($request->pac)){
            $paciente = Pacientes::where('dni','=',$request->pac)->first();
            $res = 'SI';
            } else {
            $paciente = Pacientes::where('dni','=','LABORATORIO')->first();
            $res = 'NO';
            }


            $pacientes = Pacientes::where('estatus','=', 1)->orderby('apellidos','asc')->get();


        return view('recetas.create', compact('medicamentos','paciente','res', 'pacientes'));
    }


    public function dibujo(Request $request)
    {
        


        return view('recetas.dibujo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $receta = new Recetas();
        $receta->id_paciente =$request->paciente;
        $receta->usuario =Auth::user()->id;
        $receta->descanso =$request->descanso;
        $receta->desc_descanso = $request->descripcion;
        $receta->estatus =1;
        $receta->save();

    
        if (isset($request->id_laboratorio)) {
            foreach ($request->id_laboratorio['laboratorios'] as $key => $lab) {
              if (!is_null($lab['laboratorio'])) {

               $monto = $request->monto_l['laboratorios'][$key]['monto'];

               $items= new RecetasItems();
               $items->id_receta =$receta->id;
               $items->id_producto =$lab['laboratorio'];
               $items->descripcion =$monto;
               $items->save();

              
            }
          }

        }




               

        return redirect()->action('RecetasController@index')
        ->with('success','Creado Exitosamente!');


    }


    public function descanso()
    {

        return view('recetas.descanso');

        //
    }

    public function descanso1()
    {


        return view('recetas.descanso1');

    
    }





    public function ver($id)
    {

      $receta = DB::table('receta as a')
      ->select('a.id','a.id_paciente','a.created_at','a.descanso','a.desc_descanso','a.usuario')
      ->where('a.id', '=', $id)
      ->first(); 


      $paciente = Pacientes::where('id','=',$receta->id_paciente)->first();
      $edad = Carbon::parse($paciente->fechanac)->age;

      
      $items = DB::table('receta_items as a')
      ->select('a.*','u.nombre as producto','u.principio')
      ->join('medicamentos as u','u.id','a.id_producto')
      ->where('a.id_receta', '=',$id)
      ->get(); 



      $view = \View::make('recetas.pdf', compact('paciente','receta','edad','items'));

      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
   
     
      return $pdf->stream('report-receta'.'.pdf');

    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analisis  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        
      $receta = DB::table('receta as a')
      ->select('a.id','a.id_paciente','a.created_at')
      ->where('a.id', '=', $id)
      ->first(); 


      $paciente = Pacientes::where('id','=',$receta->id_paciente)->first();
      $edad = Carbon::parse($paciente->fechanac)->age;
      $pacientes = Pacientes::where('estatus','=', 1)->orderby('apellidos','asc')->get();


      
      $items = DB::table('receta_items as a')
      ->select('a.*','u.nombre as producto','u.principio')
      ->join('medicamentos as u','u.id','a.id_producto')
      ->where('a.id_receta', '=',$id)
      ->get(); 


        return view('recetas.editar', compact('receta','pacientes','items')); //
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

    public function updateItem(Request $request)
    {


      $p = RecetasItems::find($request->id);
      $p->id_producto =$request->medicamento;
      $p->descripcion =$request->indicacion;
      $res = $p->update();

      return redirect()->route('recetas.edit', [$request->receta]);

    
    }

  
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $analisis = Recetas::find($id);
        $analisis->estatus = 0;
        $analisis->save();

        return redirect()->action('RecetasController@index');

        //
    }

    public function editItem($id)
    {


        $medicamentos = DB::table('medicamentos as a')
        ->select('a.id','a.nombre','a.principio','a.estatus')
        ->where('a.estatus', '=', 1)
        ->get(); 
       
        
    
        $items = DB::table('receta_items as a')
        ->select('a.*')
        ->where('a.id', '=',$id)
        ->first(); 


        return view('recetas.editar-item', compact('items','medicamentos')); //
    }

    public function deleteItem($id)
    {
        $analisis = RecetasItems::find($id);
        $analisis->delete();
        return back();
    }

    public function deletea($id)
    {

        $analisis = Activos::find($id);
        $analisis->delete();


        return redirect()->action('ActivosController@index');

        //
    }
}

