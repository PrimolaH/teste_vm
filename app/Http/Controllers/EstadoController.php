<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;
use Session;

class EstadoController extends Controller
{
    public function index(){
        $estado = Estado::get();
        return view('cadastrar.estado', ['estado' => $estado]);
    }
    public function novo(){
        return view('cadastrar.novo');
    }
    public function salvar(Request $request){
        $estado  = new Estado();
        $estado = $estado->create($request->all());
        Session::flash('msg_sucesso','Estado cadastrado com sucesso');
        return \Redirect::to('estado/novo');
    }
    public function editar($id){
        $estado = Estado::findOrFail($id);
        return view('cadastrar.novo', ['estado' => $estado]);
    }
    public function atualizar(Request $request, $id){
        $estado = Estado::findOrFail($id);

        $estado->update($request->all());
        Session::flash('msg_sucesso','Estado atualizado com sucesso');
        return \Redirect::to('estado/'.$estado->id.'/editar');
    }
    public function deletar($id){
        $estado = Estado::findOrFail($id);

        $estado->delete();
        Session::flash('msg_sucesso','Estado deletado com sucesso');
        return \Redirect::to('estado/listar');
    }


}
