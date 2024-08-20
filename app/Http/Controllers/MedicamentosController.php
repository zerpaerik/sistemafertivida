<?php

namespace App\Http\Controllers;
use App\Equipos;
use App\Analisis;
use App\Clientes;
use App\Tiempo;
use App\Material;
use App\Medicamentos;
use App\User;
use Auth;
use Illuminate\Http\Request;
use DB;


class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $medicamentos = DB::table('medicamentos as a')
        ->select('a.id','a.nombre','a.principio','a.estatus')
       // ->where('a.empresa', '=', Auth::user()->empresa)
        ->where('a.estatus', '=', 1)
        ->get(); 

        return view('medicamentos.index', compact('medicamentos'));
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
            $analisis = new Medicamentos();
            $analisis->nombre =$request->nombre;
            $analisis->principio =$request->principio;
            $analisis->save();
               

        return redirect()->action('MedicamentosController@index')
        ->with('success','Creado Exitosamente!');

        //return redirect()->action('AnalisisController@index', ["created" => true, "analisis" => Analisis::all()]);

    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analisis  $Clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $medicamento = Medicamentos::where('id','=',$id)->first();
        return view('medicamentos.edit', compact('medicamento')); //
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


       

      $p = Medicamentos::find($request->id);
      $p->nombre =$request->nombre;
      $p->principio =$request->principio;
      $res = $p->update();
    
    
    return redirect()->action('MedicamentosController@index')
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

        $analisis = Medicamentos::find($id);
        $analisis->estatus = 0;
        $analisis->save();

        return redirect()->action('MedicamentosController@index');

        //
    }
}

