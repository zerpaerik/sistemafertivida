<?php

namespace App\Http\Controllers;
use App\Equipos;
use App\Clientes;
use App\User;
use App\Eva;
use App\Pacientes;
use Auth;
use Illuminate\Http\Request;
use DB;

class EvaController extends Controller
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


        $eva = DB::table('eva as a')
        ->select('a.id','a.texto','a.created_at','a.usuario','a.paciente','a.created_at','b.name as name','b.lastname as lastname','p.nombres', 'p.apellidos', 'p.apellidos1')
        ->join('users as b','b.id','a.usuario')
        ->join('pacientes as p','p.id','a.paciente')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f2))])
        ->get(); 

    } else {
        $f1 =date('Y-m-d');
        $f2 = date('Y-m-d');

        $eva = DB::table('eva as a')
        ->select('a.id','a.created_at','a.texto','a.usuario','a.paciente','a.created_at','b.name as name','b.lastname as lastname','p.nombres', 'p.apellidos', 'p.apellidos1')
        ->join('users as b','b.id','a.usuario')
        ->join('pacientes as p','p.id','a.paciente')
        ->whereDate('a.created_at', date('Y-m-d 00:00:00', strtotime($f1)))
        ->get(); 

    

    }



        return view('eva.index', compact('eva', 'f1', 'f2'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pacientes = Pacientes::where('estatus','=',1)->get();

        return view('eva.create', compact('pacientes'));

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $equipos = new Eva();
        $equipos->texto =$request->texto;
        $equipos->paciente =$request->paciente;
        $equipos->usuario =Auth::user()->id;
        $equipos->save();

        return redirect()->action('EvaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $Clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipos::find($id);
        return view('equipos.edit', compact('equipo')); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $Clientes)
    {

      $p = Equipos::find($request->id);
      $p->nombre =$request->nombre;
      $p->descripcion =$request->descripcion;
      $p->marca =$request->marca;
      $p->serial =$request->serial;
      $p->modelo =$request->modelo;
      $p->precio =$request->precio;
      $p->estado =$request->estado;
      $p->estatus =1;
      $p->usuario =Auth::user()->id;
      $p->empresa = Auth::user()->empresa;
      $res = $p->update();
      return redirect()->action('EquiposController@index');

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

        $analisis = Eva::find($id);
        $analisis->delete();

        return back();

        //
    }


    public function ver($id)
    {

    

      $eva = DB::table('eva as a')
      ->select('a.id','a.texto','a.usuario','a.paciente','a.created_at','b.name as name','b.lastname as lastname','p.nombres', 'p.apellidos', 'p.apellidos1')
      ->join('users as b','b.id','a.usuario')
      ->join('pacientes as p','p.id','a.paciente')
      ->where('a.id', '=', $id)
      ->first(); 

      return view('eva.ver', compact('eva'));
    }	  





}

