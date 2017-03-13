<?php

namespace App\Http\Controllers;

use App\Mercadoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MercadoriaController extends Controller
{
    public function index(){
        return view('home');
    }
    public function form(){
        return view('mercadoria.formulario');
    }
    public function lista(){
        $mercadoria = Mercadoria::get();
        return view('mercadoria.lista', ['mercadoria' => $mercadoria]);
    }
    public function salvar(Request $request){
        $mercadoria = new Mercadoria();

        $mercadoria->create($request->all());

        \Session::flash('msg_sucesso','Mercadoria cadastrada com sucesso');

        return Redirect::to('mercadoria/novo');
    }

    public function editar($cod){

        $mercadoria = Mercadoria::findOrFail($cod);

        return view('mercadoria.formulario',['mercadoria' => $mercadoria]);

    }

    public function atualizar($cod, Request $request){

        $mercadoria = Mercadoria::findOrFail($cod);
        $mercadoria->update($request->all());

        \Session::flash('msg_sucesso','Mercadoria alterada com sucesso');

        return Redirect::to('mercadoria/lista');
    }

    public function deletar($cod, Request $request){

        $mercadoria = Mercadoria::findOrFail($cod);
        $mercadoria->delete();

        \Session::flash('msg_sucesso','Mercadoria deletada com sucesso');

        return Redirect::to('mercadoria/lista');
    }
}
