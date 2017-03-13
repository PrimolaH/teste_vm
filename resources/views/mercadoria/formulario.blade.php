@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(Request::is('*/editar'))
                            Editar Mercadoria
                            <a class="pull-right" href="{{url ('/mercadoria/lista')}}" > Listagem de Mercadorias</a>
                        @else
                            Cadastrar Mercadoria
                            <a class="pull-right" href="{{url ('/mercadoria/lista')}}" > Listagem de Mercadorias</a>
                        @endif
                    </div>

                    <div class="panel-body">
                        @if(Session::has('msg_sucesso'))
                            <div class="alert alert-success">{{ Session::get('msg_sucesso') }}</div>
                        @endif
                        @if(Request::is('*/editar'))
                            {{ Form::model( $mercadoria, ['method' => 'PATCH','url' => 'mercadoria/'.$mercadoria->cd_mercadoria] ) }}
                        @elseif(Request::is('*/registrar'))
                            {{ Form::model( $mercadoria, ['method' => 'PATCH','url' => 'mercadoria/'.$mercadoria->cd_mercadoria] ) }}
                        @else
                            {{Form::open(['url' => 'mercadoria/salvar'])}}
                        @endif
                        <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 15px">

                                    {{Form::label('nm_estado','Nome da Mercadoria')}}
                                    {{Form::input('text', 'nm_mercadoria',null,['class' => 'form-control col-md-7 col-xs-12', 'auto-focus', 'placeholder' => 'Nome'])}}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 15px">
                                    {{Form::label('tp_merc','Tipo da Mercadoria')}}
                                    {{Form::input('text','tp_mercadoria',null,['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Tipo de Mercadoria'])}}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 15px">
                                    {{Form::label('qtd','Quantidade')}}
                                    {{Form::input('text','quantidade',null,['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Quantidade'])}}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 15px">
                                    {{Form::label('qtd','Preço')}}
                                    {{Form::input('text','preco',null,['class' => 'form-control col-md-7 col-xs-12', 'placeholder' => 'Preço'])}}
                                </div>
                                @if(Request::is('*/registrar'))
                                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 15px">
                                        {{Form::label('qtd','Tipo de Negocio')}}
                                        {{Form::select('cd_negocio', ['1' => 'Compra', '2' => 'Venda'], null, ['placeholder' => 'Tipo de Negocio','class' => 'form-control col-md-7 col-xs-12'])}}
                                    </div>
                                @else
                                    {{Form::hidden('cd_negocio','0')}}
                                @endif

                                <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 15px">
                                    {{Form::submit('Salvar',['class' => 'btn btn-primary'])}}
                                    {{Form::reset('Limpar',['class' => 'btn btn-danger'])}}
                                </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection