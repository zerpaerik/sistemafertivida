<?php

namespace App\Http\Controllers;
use App\Equipos;
use App\Admision;
use App\AdmisionAtencion;
use App\Clientes;
use App\Tiempo;
use App\Material;
use App\Pacientes;
use App\Servicios;
use App\User;
use App\Atenciones;
use App\Consultas;
use App\Metodos;
use App\Ciexes;
use App\Historia;
use App\HistoriaP;
use App\HistoriaM;
use App\AntecedentesObstetricos;
use App\Control;
use App\HistoriaBase;
use App\HistoriaBaseP;
use App\HistoriaBM;
use App\Evolucion;
use Auth;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;



class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      
      if ($request->inicio) {
        $f1 = $request->inicio;
        $f2 = $request->fin;

     
        $consultas = DB::table('consultas as a')
        ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.apellidos','b.apellidos1','c.nombres as nombresh','c.apellidos as apellidosh','c.apellidos1 as apellidos1h', 'u.name','u.lastname','s.nombre as servicio')
        ->join('pacientes as b','b.id','a.id_paciente_mujer')
        ->join('pacientes as c','c.id','a.id_paciente_hombre')
        ->join('users as u','u.id','a.id_especialista')
        ->join('servicios as s','s.id','a.tipo')
        ->whereBetween('a.created_at', [$f1, $f2])
        ->orderBy('a.id','DESC')
        ->get(); 

      } else {

        $f1 = date('Y-m-d');
        $f2 = date('Y-m-d');

        $consultas = DB::table('consultas as a')
        ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.apellidos','b.apellidos1','c.nombres as nombresh','c.apellidos as apellidosh','c.apellidos1 as apellidos1h', 'u.name','u.lastname','s.nombre as servicio')
        ->join('pacientes as b','b.id','a.id_paciente_mujer')
        ->join('pacientes as c','c.id','a.id_paciente_hombre')
        ->join('users as u','u.id','a.id_especialista')
        ->join('servicios as s','s.id','a.tipo')
        ->whereBetween('a.created_at', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f1))])
        ->orderBy('a.id','DESC')
        ->get(); 

      }

      


        return view('consultas.index', compact('consultas','f1','f2'));
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $servicios = Servicios::where('estatus','=',1)->get();
        $pacientesm = Pacientes::where('sexo','=','F')->orderby('apellidos','asc')->get();
        $pacientesh = Pacientes::where('sexo','=','M')->orderby('apellidos','asc')->get();
        $prof = DB::table('users as a')
        ->select('a.id','a.name','a.lastname','a.telefono','a.nacimiento','a.especialidad','a.estatus','a.tipo','a.centro','a.email')
        ->where('a.estatus','=',1)
        ->where('a.tipo','=',2)
        ->get(); 
     

        return view('consultas.create', compact('servicios','pacientesm','pacientesh','prof'));
    }

    public function historia_crear($consulta)

    {


      $cie = Ciexes::all();
      $cie1 = Ciexes::all();
      $consulta = Consultas::where('id','=',$consulta)->first();
      $hist = HistoriaBase::where('id_paciente','=',$consulta->id_paciente)->where('estatus','=',0)->first();
     // $historias = Historia::where('id_paciente','=',$consulta->id_paciente)->get();



      
      $historias = DB::table('historia as a')
      ->select('a.*','b.name','b.lastname')
      ->join('users as b','b.id','a.usuario')
      ->where('a.id_paciente', '=',$consulta->id_paciente)
      ->get(); 

      $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();


        return view('consultas.historia',compact('cie','cie1','consulta','hist','historias','paciente'));
    }

    public function admision($consulta)

    {

      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.apellidos','b.email','b.apellidos1','c.nombres as nombresh','c.apellidos as apellidosh','c.email as emailh','c.apellidos1 as apellidosh1', 'u.name','u.lastname','s.nombre as servicio','b.dni','b.direccion','b.telefono','b.ocupacion','b.religion as religionm','b.fechanac','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as b','b.id','a.id_paciente_mujer')
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $consulta)
      ->first(); 

      $edad = Carbon::parse($consulta->fechanac)->age;
      $edad1 = Carbon::parse($consulta->fechanach)->age;



      return view('consultas.admision',compact('consulta','edad','edad1'));
    }

    public function admisionm($consulta)

    {

      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.apellidos','b.email','b.apellidos1','c.nombres as nombresh','c.apellidos as apellidosh','c.email as emailh','c.apellidos1 as apellidosh1', 'u.name','u.lastname','s.nombre as servicio','b.dni','b.direccion','b.telefono','b.ocupacion','b.religion as religionm','b.fechanac','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as b','b.id','a.id_paciente_mujer')
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $consulta)
      ->first(); 

      $edad = Carbon::parse($consulta->fechanac)->age;
      $edad1 = Carbon::parse($consulta->fechanach)->age;



      return view('consultas.admisionm',compact('consulta','edad','edad1'));
    }

    public function atencion($id)

    {

      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.email','b.apellidos','b.apellidos1','c.nombres as nombresh','c.email as emailh','c.apellidos as apellidosh','c.apellidos1 as apellidosh1', 'u.name','u.lastname','s.nombre as servicio','b.dni','b.direccion','b.telefono','b.ocupacion','b.religion as religionm','b.fechanac','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as b','b.id','a.id_paciente_mujer')
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $id)
      ->first(); 

      $edad = Carbon::parse($consulta->fechanac)->age;
      $edad1 = Carbon::parse($consulta->fechanach)->age;

      $evoluciones  = Evolucion::where('id_paciente','=',$consulta->id_paciente_mujer)->get();


      $admision = Admision::where('consulta','=',$id)->first();



      return view('consultas.atencion',compact('consulta','edad','edad1', 'admision','evoluciones'));
    }

    public function evolucion($id)

    {

      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.email','b.apellidos','b.apellidos1','c.nombres as nombresh','c.email as emailh','c.apellidos as apellidosh','c.apellidos1 as apellidosh1', 'u.name','u.lastname','s.nombre as servicio','b.dni','b.direccion','b.telefono','b.ocupacion','b.religion as religionm','b.fechanac','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as b','b.id','a.id_paciente_mujer')
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $id)
      ->first(); 

      $edad = Carbon::parse($consulta->fechanac)->age;
      $edad1 = Carbon::parse($consulta->fechanach)->age;

      $admision = Admision::where('consulta','=',$id)->first();

      return view('consultas.evolucion',compact('consulta','edad','edad1', 'admision'));
    }



   

    public function uro($id)

    {

      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','c.nombres as nombresh','c.email as emailh','c.apellidos as apellidosh','c.apellidos1 as apellidosh1','u.name','u.lastname','s.nombre as servicio','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $id)
      ->first(); 


      $edad1 = Carbon::parse($consulta->fechanach)->age;

      $admision = Admision::where('consulta','=',$id)->first();



      return view('consultas.urologia',compact('consulta','edad1', 'admision'));
    }

    public function atencionm($id)

    {

      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.email','b.apellidos','b.apellidos1','c.nombres as nombresh','c.email as emailh','c.apellidos as apellidosh','c.apellidos1 as apellidosh1', 'u.name','u.lastname','s.nombre as servicio','b.dni','b.direccion','b.telefono','b.ocupacion','b.religion as religionm','b.fechanac','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as b','b.id','a.id_paciente_mujer')
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $id)
      ->first(); 

      $edad = Carbon::parse($consulta->fechanac)->age;
      $edad1 = Carbon::parse($consulta->fechanach)->age;

      $admision = Admision::where('consulta','=',$id)->first();




      return view('consultas.atencionm',compact('consulta','edad','edad1', 'admision'));
    }


    public function ver($id)
    {
      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.email','b.apellidos','b.apellidos1','c.nombres as nombresh','c.email as emailh','c.apellidos as apellidosh','c.apellidos1 as apellidosh1', 'u.name','u.lastname','s.nombre as servicio','b.dni','b.direccion','b.telefono','b.ocupacion','b.religion as religionm','b.fechanac','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as b','b.id','a.id_paciente_mujer')
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $id)
      ->first(); 

      $edad = Carbon::parse($consulta->fechanac)->age;
      $edad1 = Carbon::parse($consulta->fechanach)->age;
      $admision = Admision::where('consulta','=',$id)->first();
      $atencion = AdmisionAtencion::where('consulta','=',$id)->first();
      $evoluciones  = Evolucion::where('id_paciente','=',$consulta->id_paciente_mujer)->get();

      return view('consultas.ver',compact('consulta','edad','edad1', 'admision','atencion','evoluciones'));
    }

    public function editarAtencion($id)
    {
      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.email','b.apellidos','b.apellidos1','c.nombres as nombresh','c.email as emailh','c.apellidos as apellidosh','c.apellidos1 as apellidosh1', 'u.name','u.lastname','s.nombre as servicio','b.dni','b.direccion','b.telefono','b.ocupacion','b.religion as religionm','b.fechanac','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as b','b.id','a.id_paciente_mujer')
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $id)
      ->first(); 

      $edad = Carbon::parse($consulta->fechanac)->age;
      $edad1 = Carbon::parse($consulta->fechanach)->age;
      $admision = Admision::where('consulta','=',$id)->first();
      $atencion = AdmisionAtencion::where('consulta','=',$id)->first();
      $evoluciones  = Evolucion::where('id_paciente','=',$consulta->id_paciente_mujer)->get();

      return view('consultas.editar_atencion',compact('consulta','edad','edad1', 'admision','atencion','evoluciones'));
    }

    

    public function editar($id)
    {
      $servicios = Servicios::where('estatus','=',1)->get();
      $pacientesm = Pacientes::where('sexo','=','F')->orderby('apellidos','asc')->get();
      $pacientesh = Pacientes::where('sexo','=','M')->orderby('apellidos','asc')->get();
      $prof = DB::table('users as a')
      ->select('a.id','a.name','a.lastname','a.telefono','a.nacimiento','a.especialidad','a.estatus','a.tipo','a.centro','a.email')
      ->where('a.estatus','=',1)
      ->where('a.tipo','=',2)
      ->get(); 
   
      $consulta = DB::table('consultas as a')
      ->select('a.id','a.id_paciente_mujer','a.id_paciente_hombre','a.id_especialista','a.historia','a.id_especialista','a.tipo','a.created_at','a.estatus','b.nombres','b.email','b.apellidos','b.apellidos1','c.nombres as nombresh','c.email as emailh','c.apellidos as apellidosh','c.apellidos1 as apellidosh1', 'u.name','u.lastname','s.nombre as servicio','b.dni','b.direccion','b.telefono','b.ocupacion','b.religion as religionm','b.fechanac','c.dni as dnih','c.direccion as direccionh','c.telefono as telefonoh','c.ocupacion as ocupacionh','c.fechanac as fechanach',)
      ->join('pacientes as b','b.id','a.id_paciente_mujer')
      ->join('pacientes as c','c.id','a.id_paciente_hombre')
      ->join('users as u','u.id','a.id_especialista')
      ->join('servicios as s','s.id','a.tipo')
      ->where('a.id', '=', $id)
      ->first(); 

      return view('consultas.editar', compact('consulta','prof','pacientesm','pacientesh','servicios')); //
    }

    public function update(Request $request)
    {
      $atencion = AdmisionAtencion::where('consulta','=',$request->consulta)->first();

      $ad = AdmisionAtencion::find($atencion->id);
      $ad->tirh = $request->tirh;
      $ad->genh = $request->genh;
      $ad->otrosh = $request->otrosh;
      $ad->imph = $request->imph;
      $ad->planh = $request->planh;
      $ad->trath = $request->trath;
      $ad->proch = $request->proch;
      $ad->update();

      $at_fin = Consultas::where('id','=',$request->consulta)->first();
      $at_fin->estatus = 3;
      $at_fin->historia = 3;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');
    }


    public function updateAtencion(Request $request)
    {
      $atencion = AdmisionAtencion::where('consulta','=',$request->consulta)->first();

      $admi = Admision::find($request->admision);

    
      $adm = Admision::find($request->admision);
      $adm->motivo =  $request->motivo_ad;
      $adm->peso =  $request->peso;
      $adm->pesoh = $request->pesoh;
      $adm->talla = $request->talla;
      $adm->pap = $request->pap_ad;
      $adm->ant_pap = $request->ant_pap;
      $adm->tallah = $request->tallah;
      $adm->imc =((float)$request->peso / (float)$request->talla) / (float)$request->talla;
      $adm->imch = $request->pesoh != null ? ((float)$request->pesoh / (float)$request->tallah) / (float)$request->tallah : '0';
      $adm->g = $request->g_ad;
      $adm->g1 = $request->g1_ad;
      $adm->g2 = $request->g2_ad;
      $adm->g3 = $request->g3_ad;
      $adm->g4 = $request->g4_ad;
      $adm->g5 = $request->g5;
      $adm->g6 = $request->g6;
      $adm->g7 = $request->g7;
      $adm->g8 = $request->g8_ad;
      $adm->obserg = $request->obserg_ad;
      $adm->hijos = $request->hijos_ad;
      $adm->pa = $request->pa_ad;
      $adm->t = $request->t_ad;
      $adm->fur = $request->fur_ad;
      $adm->rc = $request->rc_ad;
      $adm->menarquia = $request->menarquia_ad;
      $adm->disme = $request->dismeno_ad;
      $adm->fsex = $request->sexo_ad;
      $adm->fum = $request->fumam_ad;
      $adm->alc = $request->alcoholm_ad;
      $adm->cir = $request->cirm_ad;
      $adm->enf = $request->enfm_ad;
      $adm->med = $request->medm_ad;
      $adm->alerg = $request->alergm_ad;
      $adm->parejas = $request->parejas;
      $adm->anti = $request->anticonceptivos_ad;
      $adm->trat = $request->fert;
      $adm->usuario = Auth::user()->id;
      $adm->drogm = $request->drogm_ad;
      $adm->disparemia = $request->dispa_ad;
      $adm->update();

      $ad = AdmisionAtencion::find($request->atencion);
      $ad->motivo =  $request->motivo_at;
      $ad->tirm =  $request->tir_at;
      $ad->mamas =  $request->mamas_at;
      $ad->genm = $request->genm_at;
      $ad->eco = $request->eco_at;
      $ad->otrosm = $request->otrosm_at;
      $ad->impm = $request->impm_at;
      $ad->planm = $request->planm_at;
      $ad->tratm	 = $request->tratm_at;
      $ad->procm = $request->procm_at;
      $ad->usuario = Auth::user()->id;
      $ad->update();

      return redirect()->action('ConsultasController@index')
      ->with('success','Actualizado Exitosamente!');

    }

    




    public function historiap_crear($consulta)

    {
      $cie = Ciexes::all();
      $cie1 = Ciexes::all();
      $consulta = Consultas::where('id','=',$consulta)->first();
      $hist = HistoriaBaseP::where('id_paciente','=',$consulta->id_paciente)->where('estatus','=',0)->first();
     // $historias = Historia::where('id_paciente','=',$consulta->id_paciente)->get();

      $historias = DB::table('historia_pediatrica as a')
      ->select('a.*','b.name','b.lastname')
      ->join('users as b','b.id','a.usuario')
      ->where('a.id_paciente', '=',$consulta->id_paciente)
      ->get(); 

      $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();


        return view('consultas.historiap',compact('cie','cie1','consulta','hist','historias','paciente'));
    }

    public function historiam_crear($consulta)

    {


      $cie = Ciexes::all();
      $cie1 = Ciexes::all();
      $consulta = Consultas::where('id','=',$consulta)->first();
      $hist = HistoriaBM::where('id_paciente','=',$consulta->id_paciente)->where('estatus','=',0)->first();
     // $historias = Historia::where('id_paciente','=',$consulta->id_paciente)->get();

      
      $historias = DB::table('historia_medicina as a')
      ->select('a.*','b.name','b.lastname')
      ->join('users as b','b.id','a.usuario')
      ->where('a.id_paciente', '=',$consulta->id_paciente)
      ->get(); 

      $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();


        return view('consultas.historiam',compact('cie','cie1','consulta','hist','historias','paciente'));
    }

    
    public function control_crear($consulta)

    {


      $consulta = Consultas::where('id','=',$consulta)->first();

      $ant = AntecedentesObstetricos::where('id_paciente','=',$consulta->id_paciente)->where('estatus','=',0)->first();
      $controles = Control::where('id_paciente','=',$consulta->id_paciente)->get();

      //dd($controles);

      $paciente = Pacientes::where('id','=',$consulta->id_paciente)->first();




        return view('consultas.control',compact('consulta','ant','controles','paciente'));
    }

    public function guardar_controlh(Request $request){



      $consultaf = Consultas::where('id','=',$request->consulta)->first();




      $con = new AntecedentesObstetricos();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->gestas = $request->gestas;
      $con->abortos = $request->abortos;
      $con->vaginales = $request->vavinales;
      $con->viven = $request->viven;
      $con->parto = $request->parto;
      $con->cesarea = $request->cesa;
      $con->nac_muertos = $request->nac_muertos;
      $con->ant_fam = $request->ant_fam;
      $con->ant_pers = $request->ant_per;
      $con->gest_ant = $request->term_gest;
      $con->fecha_ant = $request->fecha_gest;
      $con->tipo_aborto = $request->tipo_ab;
      $con->mayor_peso = $request->mayor_peso;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->tipo_sangre = $request->tipo_sangre;
      $con->sangre = $request->grupo_sangre;
      $con->fun= $request->fun;
      $con->fpp = $request->fpp;
      $con->ecoeg = $request->ecoeg;
      $con->orina = $request->orina;
      $con->fec_orina = $request->fec_orina;
      $con->urea = $request->urea;
      $con->fec_urea = $request->fec_urea;
      $con->creatinina = $request->creatinina;
      $con->fec_creati = $request->fec_creati;
      $con->bk = $request->bk;
      $con->fec_bk = $request->fec_bk;
      $con->torch = $request->torch;
      $con->fec_torch = $request->fec_torch;
      $con->usuario = Auth::user()->id;
      $con->save();

      return back();

    }

    public function guardar_historiab(Request $request){



      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new HistoriaBase();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->alergias = $request->alerg;
      $con->ant_pat = $request->pat;
      $con->ant_per = $request->per;
      $con->ant_fam = $request->fam;
      $con->sex = $request->sexo;
      $con->save();

      return back();

    }

    public function guardar_historiabp(Request $request){


      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new HistoriaBaseP();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->fam_mat = $request->ant_mat;
      $con->fam_pad = $request->ant_pad;
      $con->fam_her = $request->ant_her;
      $con->emb_num = $request->emb_num;
      $con->emb_normal = $request->emb_normal;
      $con->causa_emb = $request->causa_emb;
      $con->sem_gest = $request->gest_sem;
      $con->part_eut = $request->part_eut;
      $con->causa_eut = $request->causa_eut;
      $con->anestesia = $request->sexo;
      $con->causa_anestesia = $request->causa_anestesia;
      $con->rupt_mem = $request->rupt_mem;
      $con->causa_rupt = $request->causa_rupt;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->pc = $request->pc;
      $con->pa = $request->pa;
      $con->apgar = $request->apgar;
      $con->apnea = $request->apnea;
      $con->ictericia	 = $request->icte;
      $con->hemo = $request->hemo;
      $con->convul = $request->conv;
      $con->otros = $request->otros;
      $con->infecciones = $request->infecciones;
      $con->trauma = $request->trauma;
      $con->quirur = $request->quirur;
      $con->hospi = $request->hospi;
      $con->alerg = $request->alerg;
      $con->transfusiones = $request->transf;
      $con->otros_pat = $request->otros1;
      $con->usuario = Auth::user()->id;
      $con->save();

      return back();

    }

    public function guardar_historiabm(Request $request){


      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new HistoriaBM();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->ant_pers = $request->ant_per;
      $con->ant_fam = $request->ant_fam;
      $con->ant_qui = $request->ant_qui;
      $con->tto_hab = $request->tto_hab;
      $con->hosp_prev = $request->hosp;
      $con->alerg = $request->alerg;
      $con->tto_act = $request->tto_act;
      $con->enf_act = $request->enf_act;
      $con->anam = $request->anam;
      $con->save();

      return back();

    }

    public function guardar_historia(Request $request)

    {


      $consultaf = Consultas::where('id','=',$request->consulta)->first();
      $con = new Historia();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->id_consulta = $consultaf->id;
      $con->id_especialista = $consultaf->id_especialista;
      $con->motivo = $request->motivo;
      $con->pa = $request->pa;
      $con->pulso = $request->pulso;
      $con->temp = $request->temp;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->apetito = $request->apetito;
      $con->sed = $request->sed;
      $con->animo = $request->animo;
      $con->mic = $request->mic;
      $con->rc = $request->rc;
      $con->dep = $request->dep;
      $con->fur = $request->fur;
      $con->pap = $request->pap;
      $con->mac = $request->mac;
      $con->andria = $request->andria;
      $con->g = $request->g;
      $con->p = $request->p;
      $con->piel = $request->piel;
      $con->mamas = $request->mamas;
      $con->abdomen = $request->abdomen;
      $con->ext = $request->gen_ext;
      $con->int = $request->gen_int;
      $con->miem = $request->miem_inf;
      $con->evo = $request->evo_enf;
      $con->tipo = $request->tipo_enf;
      $con->pd = $request->pre_diag;
      $con->df = $request->diag_fin;
      $con->cie = $request->cie_pd;
      $con->cie1 = $request->cie_df;
      $con->ex_aux = $request->ex_aux;
      $con->plan = $request->plan;
      $con->obser = $request->obser;
      $con->prox = $request->prox;
      $con->usuario = Auth::user()->id;
      $con->save();

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->historia = 2;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  


      $at_fin = Atenciones::where('id','=',$consultaf->id_atencion)->first();
      $at_fin->atendido = 2;
      $at_fin->atendido_por = $usuario->lastname.' '.$usuario->name;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');


    }

    public function guardar_historiap(Request $request)

    {


      $consultaf = Consultas::where('id','=',$request->consulta)->first();
      $con = new HistoriaP();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->id_consulta = $consultaf->id;
      $con->lact = $request->lact;
      $con->dur_lact = $request->dur_lact;
      $con->ablac = $request->ablac;
      $con->dest = $request->dest;
      $con->alim = $request->alim;
      $con->polio = $request->polio;
      $con->rota = $request->rota;
      $con->dpt = $request->dpt;
      $con->influ = $request->influ;
      $con->hinflu = $request->hinflu;
      $con->saram = $request->saramp;
      $con->hb = $request->hb;
      $con->rube = $request->rub;
      $con->neumoco = $request->neu;
      $con->paro = $request->paro;
      $con->bcg = $request->bcg;
      $con->vari = $request->vari;
      $con->tox = $request->tox;
      $con->ha = $request->ha;
      $con->dt = $request->dt;
      $con->vph = $request->vph;
      $con->gamma = $request->gamma;
      $con->siguio = $request->siguio;
      $con->sost = $request->sos_cab;
      $con->sento = $request->sento;
      $con->prim_pal = $request->prim_pal;
      $con->prim_fra = $request->prim_fra;
      $con->sonrio = $request->sonrio;
      $con->camino = $request->camino;
      $con->esfint = $request->esfint;
      $con->alt_leng = $request->alt_len;
      $con->cual_alt = $request->cual_alt;
      $con->datos = $request->datos_anorm;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->pcefa = $request->pcefa;
      $con->pbra = $request->pbrazo;
      $con->ppier = $request->ppier;
      $con->imc = divnum($request->peso, $request->talla);
      $con->pa = $request->pa;
      $con->t = $request->t;
      $con->fc = $request->fc;
      $con->fr = $request->fr;
      $con->sat = $request->sat;
      $con->glas = $request->glass;
      $con->piel = $request->piel;
      $con->cabeza = $request->cabe;
      $con->ojos = $request->ojos;
      $con->oidos = $request->oidos;
      $con->nariz = $request->nariz;
      $con->boca = $request->boca;
      $con->cuello = $request->cuello;
      $con->toral = $request->toral;
      $con->mamas = $request->mamas;
      $con->cardio = $request->cardio;
      $con->abdomen = $request->abdo;
      $con->gen = $request->geni;
      $con->ano = $request->ano;
      $con->extrem = $request->extrem;
      $con->column = $request->column;
      $con->neuro = $request->neuro;
      $con->diag1 = $request->pre_diag;
      $con->diag2 = $request->diag_fin;
      $con->cie1 = $request->cie_pd;
      $con->cie2 = $request->cie_df;
      $con->trata = $request->trata;
      $con->obser = $request->observ;
      $con->usuario = Auth::user()->id;
      $con->save();

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->historia = 2;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  


      $at_fin = Atenciones::where('id','=',$consultaf->id_atencion)->first();
      $at_fin->atendido = 2;
      $at_fin->atendido_por = $usuario->lastname.' '.$usuario->name;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');


    }

    public function guardar_historiam(Request $request)

    {


      $consultaf = Consultas::where('id','=',$request->consulta)->first();
      $con = new HistoriaM();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->id_consulta = $consultaf->id;
      $con->pa = $request->pa;
      $con->t = $request->t;
      $con->fc = $request->fc;
      $con->fr = $request->fr;
      $con->sat = $request->sat;
      $con->peso = $request->peso;
      $con->talla = $request->talla;
      $con->glass = $request->glass;
      $con->piel = $request->piel;
      $con->tto_act = $request->tto_act;
      $con->enf_act = $request->enf_act;
      $con->anam = "N/D";
      $con->mamas = $request->mamas;
      $con->cardio = $request->cardio;
      $con->abdo = $request->abdo;
      $con->gen = $request->geni;
      $con->extrem = $request->extrem;
      $con->diag1 = $request->pre_diag;
      $con->diag2 = $request->diag_fin;
      $con->cie1 = $request->cie_pd;
      $con->cie2 = $request->cie_df;
      $con->trata = $request->trata;
      $con->ex_aux = $request->ex_aux;
      $con->obser = $request->observ;
      $con->usuario = Auth::user()->id;
      $con->save();

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->historia = 2;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  


      $at_fin = Atenciones::where('id','=',$consultaf->id_atencion)->first();
      $at_fin->atendido = 2;
      $at_fin->atendido_por = $usuario->lastname.' '.$usuario->name;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');


    }



    public function reversar_ant_cont($id){

        $at_fin = AntecedentesObstetricos::where('id','=',$id)->first();
        $at_fin->estatus = 1;
        $at_fin->save();
        return back();
    }

    public function reversar_ant_hist($id){

      $at_fin = HistoriaBase::where('id','=',$id)->first();
      $at_fin->estatus = 1;
      $at_fin->save();
      return back();
  }

    public function guardar_control(Request $request){

      $usuario = DB::table('users')
      ->select('*')
      ->where('id','=', Auth::user()->id)
      ->first();  




      $consultaf = Consultas::where('id','=',$request->consulta)->first();

      $con = new Control();
      $con->id_paciente =  $consultaf->id_paciente;
      $con->id_consulta = $consultaf->id;
      $con->sem = $request->sem;
      $con->peso = $request->peso;
      $con->temp = $request->temp;
      $con->ten = $request->ten;
      $con->alt = $request->alt;
      $con->pres = $request->pres;
      $con->fcf = $request->fcf;
      $con->mov = $request->mov;
      $con->edema = $request->edema;
      $con->pulso = $request->pulso;
      $con->conse = $request->conse;
      $con->sulfato = $request->sulfa;
      $con->perfil = $request->perfil;
      $con->sero = $request->sero;
      $con->fec_sero = $request->fec_sero;
      $con->gluco = $request->gluco;
      $con->fec_gluco = $request->fec_gluco;
      $con->vih= $request->vih;
      $con->fec_vih = $request->fec_vih;
      $con->hemo = $request->hemo;
      $con->fec_hemo = $request->fec_hemo;
      $con->piel = $request->piel;
      $con->abdomen = $request->abdomen;
      $con->mamas = $request->mamas;
      $con->gen_int = $request->gen_int;
      $con->gen_ext = $request->gen_ext;
      $con->miem = $request->miem_inf;
      $con->diag = $request->diag_pres;
      $con->ex = $request->ex_aux;
      $con->diag_def = $request->diag_def;
      $con->plan = $request->plan;
      $con->prox = $request->prox;
      $con->observaciones = $request->observaciones;
      $con->usuario = Auth::user()->id;
      $con->save();

      $con_fin = Consultas::where('id','=',$request->consulta)->first();
      $con_fin->historia = 1;
      $con_fin->atendido = Auth::user()->id;
      $con_fin->save();


      $at_fin = Atenciones::where('id','=',$consultaf->id_atencion)->first();
      $at_fin->atendido = 2;
      $at_fin->atendido_por = $usuario->lastname.' '.$usuario->name;
      $at_fin->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');

    }

    public function store(Request $request){


      $con = new Consultas();
      $con->tipo =  $request->servicio;
      $con->id_especialista = $request->especialista;
      $con->id_paciente_mujer = $request->pacientem;
      $con->id_paciente_hombre = $request->pacienteh;
      $con->entero = $request->entero;
      $con->provincia = $request->provincia;
      $con->save();


      return redirect()->action('ConsultasController@index')
      ->with('success','Creado Exitosamente!');

    }

    public function storeAdmision(Request $request){



      $at_fin = Consultas::where('id','=',$request->consulta)->first();
      $at_fin->estatus = 1;
      $at_fin->historia = 1;
      $at_fin->save();

      
      $ad = new Admision();
      $ad->motivo =  $request->motivo;
      $ad->consulta =  $request->consulta;
      $ad->peso =  $request->peso;
      $ad->pesoh = $request->pesoh;
      $ad->talla = $request->talla;
      $ad->pap = $request->pap;
      $ad->ant_pap = $request->ant_pap;
      $ad->tallah = $request->tallah;
      $ad->imc =((float)$request->peso / (float)$request->talla) / (float)$request->talla;
      $ad->imch = $request->pesoh != null ? ((float)$request->pesoh / (float)$request->tallah) / (float)$request->tallah : '0';
      $ad->g = $request->g;
      $ad->g1 = $request->g1;
      $ad->g2 = $request->g2;
      $ad->g3 = $request->g3;
      $ad->g4 = $request->g4;
      $ad->g5 = $request->g5;
      $ad->g6 = $request->g6;
      $ad->g7 = $request->g7;
      $ad->g8 = $request->g8;
      $ad->obserg = $request->obserg;
      $ad->hijos = $request->hijos;
      $ad->pa = $request->pa;
      $ad->t = $request->t;
      $ad->fur = $request->fur;
      $ad->desc_fur = $request->desc_fur;
      $ad->rc = $request->rc;
      $ad->menarquia = $request->menarquia;
      $ad->disme = $request->dismeno;
      $ad->fsex = $request->sexo;
      $ad->fum = $request->fumam;
      $ad->alc = $request->alcoholm;
      $ad->cir = $request->cirm;
      $ad->enf = $request->enfm;
      $ad->med = $request->medm;
      $ad->alerg = $request->alergm;
      $ad->parejas = $request->parejas;
      $ad->anti = $request->anticonceptivos;
      $ad->trat = $request->fert;
      $ad->usuario = Auth::user()->id;
      $ad->cirh = $request->cirugias;
      $ad->enfh = $request->enf;
      $ad->medh = $request->medh;
      $ad->alergh = $request->alerg;
      $ad->fumh = $request->fuma;
      $ad->drogh = $request->drogas;
      $ad->drogm = $request->drogm;
      $ad->alch = $request->alcohol;
      $ad->disparemia = $request->dispa;
      $ad->papanico = $request->papanico;
      $ad->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Admitido Exitosamente!');

    }

    public function storeAtencion(Request $request){


      $at_fin = Consultas::where('id','=',$request->consulta)->first();
      $at_fin->estatus = 2;
      $at_fin->historia = 2;
      $at_fin->save();

      
      $ad = new AdmisionAtencion();
      $ad->consulta =  $request->consulta;
      $ad->motivo =  $request->motivo;
      $ad->tirm =  $request->tirm;
      $ad->mamas =  $request->mamas;
      $ad->genm = $request->genm;
      $ad->eco = $request->eco;
      $ad->otrosm = $request->otrosm;
      $ad->impm = $request->impm;
      $ad->planm = $request->planm;
      $ad->tratm	 = $request->tratm;
      $ad->procm = $request->procm;
      $ad->tirh = $request->tirh;
      $ad->genh = $request->genh;
      $ad->otrosh = $request->otrosh;
      $ad->imph = $request->imph;
      $ad->planh = $request->planh;
      $ad->trath = $request->trath;
      $ad->proch = $request->proch;
      $ad->usuario = Auth::user()->id;
      $ad->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Atendido Exitosamente!');

    }


    public function storeEvolucion(Request $request){


      $at_fin = Consultas::where('id','=',$request->consulta)->first();
      $at_fin->estatus = 2;
      $at_fin->historia = 2;
      $at_fin->save();


      $consu = Consultas::where('id','=',$request->consulta)->first();


      
      $ad = new Evolucion();
      $ad->consulta =  $request->consulta;
      $ad->id_paciente =  $consu->id_paciente_mujer;
      $ad->descripcion =  $request->detalle;
      $ad->save();

      return redirect()->action('ConsultasController@index')
      ->with('success','Atendido Exitosamente!');

    }






  

  
    public function delete($id)
    {

        $cliente = Consultas::find($id);
        $cliente->delete();

        return redirect()->action('ConsultasController@index')
        ->with('success','Eliminado Exitosamente!');
        //
    }


    public function historias(Request $request)
    {


        if($request->id_paciente != null){
         // $historias = Historias::where('id_paciente','=',$request->id_paciente)->get();

          $historias = DB::table('historia as a')
          ->select('a.id_paciente','a.id','a.created_at','a.reevalua','a.observacion','a.usuario_reevalua','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',$request->id_paciente)
          ->orderBy('a.created_at','ASC')
          ->get(); 

          $historias_m = DB::table('historia_medicina as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',$request->id_paciente)
          ->orderBy('a.created_at','ASC')
          ->get(); 

          $historias_p = DB::table('historia_pediatrica as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',$request->id_paciente)
          ->orderBy('a.created_at','ASC')
          ->get(); 


            
        } else {
          //$historias = Historias::where('id_paciente','=',77777777777)->get();

          $historias = DB::table('historia as a')
          ->select('a.id_paciente','a.id','a.created_at','a.reevalua','a.observacion','a.usuario_reevalua','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',77777777777)
          ->get(); 

          $historias_m = DB::table('historia_medicina as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',77777777777)
          ->orderBy('a.created_at','ASC')
          ->get(); 

          $historias_p = DB::table('historia_pediatrica as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',77777777777)
          ->orderBy('a.created_at','ASC')
          ->get(); 
        }

        if(!is_null($request->filtro)){
        $pacientes =Pacientes::where("estatus", '=', 1)->where('apellidos','like','%'.$request->filtro.'%')->orderby('apellidos','ASC')->get();
        }else{
        $pacientes =Pacientes::where("estatus", '=', 9)->orderby('apellidos','ASC')->get();
        }




        return view('consultas.historias', compact('pacientes','historias', 'historias_m', 'historias_p'));


    }

    public function controles(Request $request)
    {


        if($request->id_paciente != null){
         // $historias = Historias::where('id_paciente','=',$request->id_paciente)->get();

          $controles = DB::table('control as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',$request->id_paciente)
          ->orderBy('a.created_at','DESC')
          ->get(); 
  
        } else {
          //$historias = Historias::where('id_paciente','=',77777777777)->get();

          $controles = DB::table('control as a')
          ->select('a.id_paciente','a.id','a.created_at','b.nombres','b.apellidos','b.dni','b.fechanac','b.telefono','b.gradoinstruccion')
          ->join('pacientes as b','b.id','a.id_paciente')
          ->where('a.id_paciente', '=',77777777777)
          ->get(); 
        }

        if(!is_null($request->filtro)){
        $pacientes =Pacientes::where("estatus", '=', 1)->where('apellidos','like','%'.$request->filtro.'%')->orderby('apellidos','ASC')->get();
        }else{
        $pacientes =Pacientes::where("estatus", '=', 9)->orderby('apellidos','ASC')->get();
        }




        return view('consultas.controles', compact('pacientes','controles'));


    }

    public function ver_historias($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 



         $historias_base = HistoriaBase::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

        return view('consultas.historias_ver', compact('hist','historias_base','paciente'));


    }

    
    public function ver_historiasp($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia_pediatrica as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 



         $historias_base = HistoriaBaseP::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

        return view('consultas.historiasp_ver', compact('hist','historias_base','paciente'));


    }

    public function ver_historiasm($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia_medicina as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 



         $historias_base = HistoriaBM::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

        return view('consultas.historiasm_ver', compact('hist','historias_base','paciente'));


    }

    public function ver_controles($id)
    {


        // $cont = Control::where('id','=',$id)->first();

         $cont = DB::table('control as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 

         $ant = AntecedentesObstetricos::where('id_paciente','=',$cont->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$cont->id_paciente)->first();

        return view('consultas.controles_ver', compact('ant','cont','paciente'));


    }

    
    public function reevaluar($id)
    {


   

        return view('consultas.reevaluar', compact('id'));


    }

    public function ver_historias_pdf($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 




         $historias_base = HistoriaBase::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

         $edad = Carbon::parse($paciente->fechanac)->age;


             
          $view = \View::make('consultas.historia-pdf', compact('hist','historias_base','paciente','edad'));

          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
   
     
      return $pdf->stream('report-pdf'.'.pdf');




    }

    public function ver_historiasp_pdf($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia_pediatrica as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 





         $historias_base = HistoriaBaseP::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

         $edad = Carbon::parse($paciente->fechanac)->age;


             
          $view = \View::make('consultas.historiap-pdf', compact('hist','historias_base','paciente','edad'));

          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
   
     
      return $pdf->stream('report-pdf'.'.pdf');




    }

    public function ver_historiasm_pdf($id)
    {


        // $hist = Historia::where('id','=',$id)->first();

         $hist = DB::table('historia_medicina as a')
         ->select('a.*','u.name','u.lastname')
         ->join('users as u','u.id','a.usuario')
         ->where('a.id', '=',$id)
         ->first(); 




         $historias_base = HistoriaBM::where('id_paciente','=',$hist->id_paciente)->first();

         $paciente = Pacientes::where('id','=',$hist->id_paciente)->first();

         $edad = Carbon::parse($paciente->fechanac)->age;


             
          $view = \View::make('consultas.historiam-pdf', compact('hist','historias_base','paciente','edad'));

          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
   
     
      return $pdf->stream('report-pdf'.'.pdf');




    }

    public function reevaluarPost(Request $request)
    {

        $searchUsuarioID = DB::table('users')
        ->select('*')
        ->where('id','=', Auth::user()->id)
        ->first();  

        $atencion = Historia::find($request->id);
        $atencion->reevalua = 2;
        $atencion->observacion = $request->observacion;
        $atencion->usuario_reevalua= $searchUsuarioID->lastname.' '.$searchUsuarioID->name;
        $atencion->save();

        return back();


    }










}

