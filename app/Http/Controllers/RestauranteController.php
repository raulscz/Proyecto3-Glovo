<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\Storage;
use App\Mail\EnviarMensaje;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CrearRestaurante;
use App\Http\Requests\CrearSecciones;
use App\Http\Requests\CrearDireccion;
use App\Http\Requests\CrearPlatos;


class RestauranteController extends Controller
{
    /*Mostrar*/
    public function mostrarRestaurantes(){
        $listaRestaurantes = DB::table("tbl_tipo")->join('tbl_restaurante', 'tbl_tipo.id', '=', 'tbl_restaurante.id_tipo')->select('*')->get();
        return view('mostrarRestaurante', compact('listaRestaurantes'));
    }

    public function mostrarDirecciones($id){
        $listaDirecciones = DB::table('tbl_restaurante')->join('tbl_dirección','tbl_restaurante.id', '=', 'tbl_dirección.id_resta')->select('*')->where('tbl_restaurante.id','=',$id)->get();
        return view('mostrarDirecciones', compact('listaDirecciones'));
    }

    public function mostrarSecciones($id){
        $listaSecciones = DB::table('tbl_restaurante')->join('tbl_seccion','tbl_restaurante.id','=','tbl_seccion.id_resta')->select('*')->where('tbl_restaurante.id','=',$id)->get();
        return view('mostrarSecciones', compact('listaSecciones'));
    }

    public function mostrarPlatos($id){
        $listaPlatos = DB::table('tbl_seccion')->join('tbl_plato','tbl_seccion.id','=','tbl_plato.id_seccion')->select('*')->where('tbl_plato.id_seccion','=',$id)->get();
        return view('mostrarPlatos', compact('listaPlatos'));
    }

    /*Crear*/
    public function crearRestaurante(){
        $listaTipo = DB::table("tbl_tipo")->select('*')->get();
        return view('crearRestaurante',compact('listaTipo'));
    }

    public function crearRestaurantePost(CrearRestaurante $request){
        //return "Hola";
        $datos = $request->except('_token');

        if($request->hasFile('img_resta')){
            $datos['img_resta'] = $request->file('img_resta')->store('uploads','public');
        }else{
            $datos['img_resta'] = NULL;
        }

        try{
            DB::beginTransaction();
            DB::table('tbl_restaurante')->insertGetId(["img_resta"=>$datos['img_resta'],"nombre_resta"=>$datos['nombre_resta'],"desc_resta"=>$datos['desc_resta'],"horario_ini_resta"=>$datos['horario_ini_resta'],"horario_fi_resta"=>$datos['horario_fi_resta'],"id_tipo"=>$datos['id_tipo']]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function crearSecciones(){
        return view('crearSecciones');
    }

    public function crearSeccionesPost(CrearSecciones $request){
        $datos = $request->except('_token');

        if($request->hasFile('img_seccion')){
            $datos['img_seccion'] = $request->file('img_seccion')->store('uploads','public');
        }else{
            $datos['img_seccion'] = NULL;
        }

        try {
            DB::beginTransaction();
            DB::table('tbl_seccion')->InsertGetId(["img_seccion"=>$datos['img_seccion'],"nombre_seccion"=>$datos['nombre_seccion'],"id_resta"=>$datos['id_resta']]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function crearDireccion(){
        return view('crearDireccion');
    }

    public function crearDireccionPost(CrearDireccion $request){
        //return $request;
        $datos = $request->except('_token');
        try {
            DB::beginTransaction();
            DB::table('tbl_dirección')->InsertGetId(["direccion_resta"=>$datos['direccion_resta'],"id_resta"=>$datos['id_resta']]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function crearPlato(){
        return view('crearPlato');
    }

    public function crearPlatoPost(CrearPlatos $request){
        $datos = $request->except('_token');

        if($request->hasFile('img_plato')){
            $datos['img_plato'] = $request->file('img_plato')->store('uploads','public');
        }else{
            $datos['img_plato'] = NULL;
        }

        try {
            DB::beginTransaction();
            DB::table('tbl_plato')->InsertGetId(["img_plato"=>$datos['img_plato'],"nombre_plato"=>$datos['nombre_plato'],"desc_plato"=>$datos['desc_plato'],"precio_plato"=>$datos['precio_plato'],"id_seccion"=>$datos['id_seccion']]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    /*Modificar*/
    public function modificarRestaurante($id){
        $restaurante = DB::table("tbl_tipo")->join('tbl_restaurante', 'tbl_tipo.id', '=', 'tbl_restaurante.id_tipo')->select()->where('tbl_restaurante.id','=',$id)->first();
        $listaTipo = DB::table("tbl_tipo")->select('*')->get();
        return view('modificarRestaurante',compact('restaurante','listaTipo'));
    }

    public function modificarRestaurantePut(Request $request){
        $datos=$request->except('_token','_method');

        if ($request->hasFile('img_resta')) {
            $foto = DB::table('tbl_restaurante')->select('img_resta')->where('id','=',$request['id'])->first();
            if ($foto->img_resta != null) {
                Storage::delete('public/'.$foto->img_resta);
            }
            $datos['img_resta'] = $request->file('img_resta')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_restaurante')->select('img_resta')->where('id','=',$request['id'])->first();
            $datos['img_resta'] = $foto->img_resta;
        }

        try {
            DB::beginTransaction();
            DB::table('tbl_restaurante')->where('id','=',$datos['id'])->update($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function modificarSeccion($id){
        $Seccion = DB::table('tbl_seccion')->select('*')->where('id','=',$id)->first();
        return view('modificarSeccion',compact('Seccion'));
    }

    public function modificarSeccionPut(Request $request){
        $datos=$request->except('_token','_method');

        if ($request->hasFile('img_seccion')) {
            $foto = DB::table('tbl_seccion')->select('img_seccion')->where('id','=',$request['id'])->first();
            if ($foto->img_seccion != null) {
                Storage::delete('public/'.$foto->img_seccion);
            }
            $datos['img_seccion'] = $request->file('img_seccion')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_seccion')->select('img_seccion')->where('id','=',$request['id'])->first();
            $datos['img_seccion'] = $foto->img_seccion;
        }

        try {
            DB::beginTransaction();
            DB::table('tbl_seccion')->where('id','=',$datos['id'])->update($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function modificarDireccion($id){
        $Direccion = DB::table('tbl_restaurante')->join('tbl_dirección','tbl_restaurante.id','=','tbl_dirección.id_resta')->select('*')->where('tbl_dirección.id','=',$id)->first();
        return view('modificarDireccion',compact('Direccion'));
    }

    public function modificarDireccionPut(Request $request){
        $datos=$request->except('_token','_method');

        try {
            DB::beginTransaction();
            DB::table('tbl_dirección')->where('id','=',$datos['id'])->update($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function modificarPlato($id){
        $Plato = DB::table('tbl_seccion')->join('tbl_plato','tbl_seccion.id','=','tbl_plato.id_seccion')->select('*')->where('tbl_plato.id','=',$id)->first();
        return view('modificarPlato',compact('Plato'));
    }

    public function modificarPlatoPut(Request $request){
        $datos=$request->except('_token','_method');

        if ($request->hasFile('img_plato')) {
            $foto = DB::table('tbl_plato')->select('img_plato')->where('id','=',$request['id'])->first();
            if ($foto->img_plato != null) {
                Storage::delete('public/'.$foto->img_plato);
            }
            $datos['img_plato'] = $request->file('img_plato')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_plato')->select('img_plato')->where('id','=',$request['id'])->first();
            $datos['img_plato'] = $foto->img_plato;
        }

        try {
            DB::beginTransaction();
            DB::table('tbl_plato')->where('id','=',$datos['id'])->update($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    /*Eliminar*/
    public function eliminarRestaurante($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_restaurante')->where('id','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function eliminarSeccion($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_seccion')->where('id','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function eliminarDireccion($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_dirección')->where('id','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }

    public function eliminarPlato($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_plato')->where('id','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarRestaurantes');
    }
    /*Filtro*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo=DB::table('tbl_tipo')->select('*')->get();
        $restaurantes=DB::table('tbl_restaurante')->select('*')->get();
        return view('index', compact('tipo', 'restaurantes'));
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
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurante $restaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        //
    }

    public function rest($id){
        $datos = DB::table("tbl_restaurante")->select('*')->where('id','=',$id)->get();
        $sec = DB::table("tbl_seccion")->join("tbl_plato", "tbl_seccion.id", "=", "tbl_plato.id_seccion")->select('*')->where('id_resta', '=', $id)->get();
        return view('restaurante', compact('datos', 'sec'));
    }
}