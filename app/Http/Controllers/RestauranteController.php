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


class RestauranteController extends Controller
{
    /*Mostrar*/
    public function mostrarRestaurantes(){
        $listaRestaurantes = DB::table("tbl_tipo")->join('tbl_restaurante', 'tbl_tipo.id', '=', 'tbl_restaurante.id_tipo')->select('*')->get();
        return view('mostrarRestaurante', compact('listaRestaurantes'));
    }

    public function mostrarDirecciones($id){

    }

    public function mostrarSecciones($id){

    }

    public function mostrarPlatos($id){

    }
    /*Crear*/
    public function crearRestaurante(){
        $listaTipo = DB::table("tbl_tipo")->select('*')->get();
        return view('crearRestaurante',compact('listaTipo'));
    }

    public function crearRestaurantePost(CrearRestaurante $request){
        $datos = $request->except('_token');
        return $datos;
        $request->validate([
            'nombre_resta'=>'required|string|max:30',
            'desc_resta'=>'required|string|max:250',
            'horario_ini_resta'=>'required',
            'horario_fi_resta'=>'required',
            'id_rol'=>'required'
        ]);

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

    public function tipo_rest(){
        
    }
}
