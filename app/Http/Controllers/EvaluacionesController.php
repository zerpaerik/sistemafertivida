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
use App\Evaluaciones;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class EvaluacionesController extends Controller
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


        $evaluaciones = DB::table('evaluaciones as a')
        ->select('a.id','a.id_paciente','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.apellidos1')
        ->join('pacientes as b','b.id','a.id_paciente')
        ->where('a.estatus', '=', 1)
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f2))])
        ->get(); 

        } else {
            $f1 =date('Y-m-d');
            $f2 = date('Y-m-d');

            $evaluaciones = DB::table('evaluaciones as a')
            ->select('a.id','a.id_paciente','a.estatus','a.created_at','b.nombres', 'b.apellidos','b.apellidos1')
            ->join('pacientes as b','b.id','a.id_paciente')
            ->where('a.estatus', '=', 1)
            ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime($f1)))
            ->get(); 

        }
       

        return view('evaluaciones.index', compact('evaluaciones','f1','f2'));
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       

        $pacientes = Pacientes::where('estatus','=', 1)->orderby('apellidos','asc')->get();


        return view('evaluaciones.create', compact('pacientes'));
    }

    public function utero1()
    {

        return view('evaluaciones.utero1');

        //
    }

    public function utero2()
    {

    
        return view('evaluaciones.utero2');

        //
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


        
        $evaluaciones = new Evaluaciones();
        $evaluaciones->id_paciente =$request->paciente;
        $evaluaciones->tipo =$request->tipo;
        $evaluaciones->p1 =$request->p1;
        $evaluaciones->p2 =$request->p2;
        $evaluaciones->p3 =$request->p3;
        $evaluaciones->observaciones =$request->observaciones;
        $evaluaciones->usuario =Auth::user()->id;
        $evaluaciones->estatus =1;
        $evaluaciones->save();

    
      



        return redirect()->action('EvaluacionesController@index')
        ->with('success','Creado Exitosamente!');


    }

    public function ver($id)
    {

      $eval = DB::table('evaluaciones as a')
      ->select('a.*')
      ->where('a.id', '=', $id)
      ->first(); 

      $paciente = Pacientes::where('id','=',$eval->id_paciente)->first();
      $edad = Carbon::parse($paciente->fechanac)->age;

      return view('evaluaciones.ver', compact('eval','paciente','edad'));
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

        $analisis = Evaluaciones::find($id);
        $analisis->estatus = 0;
        $analisis->save();

        return redirect()->action('EvaluacionesController@index');

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

