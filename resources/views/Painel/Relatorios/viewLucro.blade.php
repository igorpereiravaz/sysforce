@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lucro Mensal
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lucro Mensal</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                    <h1>Lucro Mensal de : R${{$lucro}},00</h1>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                    <th>Mês Referência</th>
                                    <th>Data de Pagamento</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($pagamentos as $pagamento)
                                        @foreach($matriculaspagos as $matriculaspago)
                                            @if($pagamento->matricula_id == $matriculaspago->id)
                                                @php
                                                    $clientepago = $matriculaspago->cliente()->get()->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $clientepago->nome_cliente }}</td>
                                                    <td>R${{ str_replace(".",",",$pagamento->valor) }}</td>
                                                    <td>{{ $pagamento->datames }}</td>
                                                    <td>{{date('d/m/Y H:i:s', strtotime($pagamento->datapagamento)) }}</td>
                                                </tr>
                                            @endif
                                         @endforeach
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                    <th>Mês Referência</th>
                                    <th>Data de Pagamento</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>

                <input id="datames"
                       name="datames" value="{{$datames}}" hidden>
                @if($lucro > 0)
                    <a href="{{route('Painel.Relatorios.lucroPDF', $datames)}}" type="submit" class="btn btn-primary -align-center">Gerar PDF</a>

                @endif


            </div>
        </section>
    </div>
@endsection
