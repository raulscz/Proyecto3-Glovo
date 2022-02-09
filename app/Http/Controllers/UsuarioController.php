<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\Storage;
use App\Mail\EnviarMensaje;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CrearUsuario;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\RegistrarUsuario;

class UsuarioController extends Controller
{
    /*Login & Logout*/
    public function loginP(Request $request){
        $datos= $request->except('_token','_method');
        $user=DB::table("tbl_rol")->join('tbl_user', 'tbl_rol.id', '=', 'tbl_user.id_rol')->where('correo_user','=',$datos['correo_user'])->where('pass_user','=',$datos['pass_user'])->first();
        if($user->nombre_rol=='Administrador'){
           $request->session()->put('nombre_admin',$request->correo_user);
           return redirect('cPanelAdmin');
        }else{
            $request->session()->put('nombre_user',$request->correo_user);
            return view('');
        }
        return view('');
    }
    public function logout(Request $request){
        $request->session()->forget('nombre_admin');
        $request->session()->forget('nombre_user');
        $request->session()->flush();
        return redirect('');
    }

    /*Mostrar*/
    public function mostrarAdmin(){
        return view('cPanelAdmin');
    }

    public function mostrarUsuarios(){
        $listaUsuarios = DB::table('tbl_rol')->join('tbl_user','tbl_rol.id','=','tbl_user.id_rol')->select('*')->get();
        return view('mostrarUser', compact('listaUsuarios'));
    }
    /*Crear*/
    public function crearUsuario(){
        return view('crearUser');
    }

    public function crearUsuarioPost(CrearUsuario $request){
        $datos = $request->except('_token');
        
        try{
            DB::beginTransaction();
            $idRol = DB::table('tbl_rol')->select('id')->where('nombre_rol','=',$datos['nombre_rol'])->first();
            DB::table('tbl_user')->insertGetId(["nombre_user"=>$datos['nombre_user'],"apellido_user"=>$datos['apellido_user'],"dni_user"=>$datos['dni_user'],"edad_user"=>$datos['edad_user'],"correo_user"=>$datos['correo_user'],"pass_user"=>$datos['pass_user'],"id_rol"=>$idRol->id]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarUsuarios');
    }
    /*REGISTRAR*/
    public function registrarUsuario(){
        return view('registrarUser');
    }

    public function registrarUsuarioPost(RegistrarUsuario $request){
        //return $request;
        $datos = $request->except('_token');
        try{
            DB::beginTransaction();
            $idRols = DB::table('tbl_rol')->select('id')->where('nombre_rol','=',"Usuario")->first();
            DB::table('tbl_user')->insertGetId(["nombre_user"=>$datos['nombre_user'],"apellido_user"=>$datos['apellido_user'],"dni_user"=>$datos['dni_user'],"edad_user"=>$datos['edad_user'],"correo_user"=>$datos['correo_user'],"pass_user"=>$datos['pass_user'],"id_rol"=>$idRols->id]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('');
    }
    /*Modificar*/
    public function modificarUsuario($id){
        $Usuario = DB::table('tbl_rol')->join('tbl_user','tbl_rol.id','=','tbl_user.id_rol')->select('*')->where("tbl_user.id","=",$id)->first();
        return view('modificarUser',compact('Usuario'));
    }

    public function modificarUsuarioPut(CrearUsuario $request){
        $datos = $request->except('_token','_method');
        $datosUser = $request->except('_token','_method','nombre_rol');
        try{
            DB::beginTransaction();
            $datos['id_rol'] = DB::table('tbl_rol')->select('id')->where('nombre_rol','=',$datos['nombre_rol'])->get();
            DB::table('tbl_user')->where('id','=',$datosUser['id'])->update($datosUser);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarUsuarios');
    }
    /*Eliminar*/
    public function eliminarUsuario($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_user')->where('id','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarUsuarios');
    }
    /*Filtro*/
    /*AJAX*/

    public function leercontroller(Request $request){
        $leer = $request->input('leer_tipo');
        if(isset($leer)){
            $datos=DB::select('select * from tbl_restaurante where nombre_resta like ? AND id_tipo = ?',
        ['%'.$request->input('filtrocontrolador').'%', $request->input('leer_tipo')]);
        }else{
            $datos=DB::select('select * from tbl_restaurante where nombre_resta like ?', ['%'.$request->input('filtrocontrolador').'%']);
        }
        
        return response()->json($datos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
