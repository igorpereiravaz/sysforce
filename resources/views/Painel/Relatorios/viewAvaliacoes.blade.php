@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Histórico de Avaliações
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Histórico de Avaliações</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">

                        </div>
                        <!-- /.box-header -->
                        <h1>{{$cliente->nome_cliente}}</h1>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Data de Avaliação</th>
                                    <th>Peso</th>
                                    <th>IMC</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($avaliacoes as $avaliacao)
                                    <tr>

                                        <td>{{ $avaliacao->id }}</td>
                                        <td>{{  date('d/m/Y H:i:s', strtotime($avaliacao->data)) }}</td>
                                        <td>{{$avaliacao->peso}}</td>
                                        <td>{{$avaliacao->imc}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Data de Avaliação</th>
                                    <th>Peso</th>
                                    <th>IMC</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <a href="{{route('Painel.Relatorios.avaliacoesPDF', $cliente->id)}}" type="submit" class="btn btn-primary -align-center">Gerar PDF</a>

                </div>

            </div>
        </section>
    </div>
@endsection
