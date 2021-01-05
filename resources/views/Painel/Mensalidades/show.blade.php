@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Pagamentos
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Pagamentos</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li>Cliente Não Matrículado</li>
                            </ul>
                        </div>
                        <br />
                    @endif


                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Pagamentos | Novo Pagamento :

                                @if($role == 1)
                                    <a href="{{ route ('Painel.Mensalidades.payment', $cliente->id)}}" class="btn btn-success fa fa-plus"></a>
                                @else
                                    <a href="{{ route ('Painel.Mensalidades.payment', $cliente->id)}}" class="btn btn-success fa fa-plus disabled"></a>
                            @endif
                            </h3>

                        </div>
                        <!-- /.box-header -->
                        <h1>{{$cliente->nome_cliente}}</h1>
                        <div class="box-body">
                            <h2>Pagamentos</h2>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Valor</th>
                                    <th>Mês Referência</th>
                                    <th>Data de Pagamento</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if (is_array($mensalidades) || is_object($mensalidades))
                                    @foreach($mensalidades as $mensalidade)
                                        <tr>
                                            <td>{{$mensalidade->id }}</td>
                                            <td>{{"R$".$mensalidade->valor }}</td>
                                            <td>{{$mensalidade->datames}}</td>
                                            <td>{{  date('d/m/Y H:i:s', strtotime($mensalidade->datapagamento)) }}</td>
                                            <td>
                                                @if($role == 1)
                                                    <a href="{{ route ('Painel.Mensalidades.destroy', $mensalidade->id)}}" class="btn btn-danger fa fa-trash"></a>
                                                @else
                                                    <a href="{{ route ('Painel.Mensalidades.destroy', $mensalidade->id)}}" class="btn btn-danger fa fa-trash disabled"></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                @if (is_array($mensalidadesfim) || is_object($mensalidadesfim))
                                    @foreach($mensalidadesfim as $finalizada)
                                        <tr><td>{{$finalizada->id }}</td>
                                            <td>{{"R$".$finalizada->valor }}</td>
                                            <td>{{$finalizada->datames}}</td>
                                            <td>{{  date('d/m/Y H:i:s', strtotime($finalizada->datapagamento)) }}</td>
                                            <td>
                                                @if($role == 1)
                                                    <a href="{{ route ('Painel.Mensalidades.destroy', $finalizada->id)}}" class="btn btn-danger fa fa-trash"></a>
                                                @else
                                                    <a href="{{ route ('Painel.Mensalidades.destroy', $finalizada->id)}}" class="btn btn-danger fa fa-trash disabled"></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Valor</th>
                                    <th>Mês Referência</th>
                                    <th>Data de Pagamento</th>
                                    <th>Ação</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
