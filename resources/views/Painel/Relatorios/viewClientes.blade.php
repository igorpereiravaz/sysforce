@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Clientes Inadimplentes  {{$datames}}
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Clientes Inadimplentes  {{$datames}}</li>
            </ol>
            <h1>Total: R$ {{$total}},00</h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Cidade</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($matriculasnpagas as $matriculasnpaga)
                                    <tr>
                                        @php
                                        $plano = $matriculasnpaga->plano()->get()->first();
                                        @endphp
                                        @foreach($clientes as $cliente)
                                            @if($cliente->id == $matriculasnpaga->cliente_id)
                                                <td>{{ $cliente->nome_cliente }}</td>
                                                <td>{{ $cliente->telefone_cliente }}</td>
                                                <td>{{ $cliente->endereco_cliente }}</td>
                                                <td>{{ $cliente->cidade_cliente }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $plano->valor_plano }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <input id="datames"
                           name="datames" value="{{$datames}}" hidden>

                </div>
                    <a href="{{route('Painel.Relatorios.clientesPDF', $datames)}}" type="submit" class="btn btn-primary -align-center">Gerar PDF</a>



            </div>
        </section>
    </div>
@endsection
