@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Mercadorias
                        <a class="pull-right" href="{{url ('/mercadoria/novo')}}" > Novo</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('msg_sucesso'))
                            <div class="alert alert-success">{{ Session::get('msg_sucesso') }}</div>
                        @endif
                        <table class="table">
                            <th>#</th>
                            <th>Mercadoria</th>
                            <th>Tipo</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Tipo de Negócio</th>
                            <th>Ações</th>
                            <tbody>
                            @foreach( $mercadoria as $mercadorias )

                                <tr>

                                    <td>{{ $mercadorias->cd_mercadoria }}</td>
                                    <td>{{ $mercadorias->nm_mercadoria }}</td>
                                    <td>{{ $mercadorias->tp_mercadoria }}</td>
                                    <td>{{ $mercadorias->preco }}</td>
                                    <td>{{ $mercadorias->quantidade }}</td>
                                    <td>
                                        @if($mercadorias->cd_negocio == 1)
                                            Compra
                                        @elseif($mercadorias->cd_negocio == 2)
                                            Venda
                                        @else
                                            Em Aberto
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ $mercadorias->cd_mercadoria }}/editar" class="btn btn-default btn-sm">Editar</a>
                                        <a href="{{ $mercadorias->cd_mercadoria }}/registrar" class="btn btn-default btn-sm">Compra / Venda</a>
                                        {{ Form::open(['method' => 'DELETE', 'url' => 'mercadoria/'.$mercadorias->cd_mercadoria, 'style' => 'display:inline']) }}
                                            <button type="submit" class="btn btn-default btn-sm">Excluir</button>
                                        {{ Form::close() }}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection