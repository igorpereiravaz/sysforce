@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Avaliações
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Avaliações</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Avaliações | Nova Avaliação : <a href="{{ route ('Painel.Avaliacoes.new', $cliente->id)}}" class="btn btn-success fa fa-plus"></a></h3>


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
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($avaliacoes as $avaliacao)
                                    <tr>

                                        <td>{{ $avaliacao->id }}</td>
                                        <td>{{  date('d/m/Y H:i:s', strtotime($avaliacao->data)) }}</td>
                                        <td>{{$avaliacao->peso}}</td>
                                        <td>{{$avaliacao->imc}}</td>

                                         <td>
                                             <a href="{{ route ('Painel.Avaliacoes.destroy', $avaliacao->id)}}" class="btn btn-danger fa fa-trash"></a>
                                             <a href="{{ route ('Painel.Avaliacoes.view', $avaliacao->id)}}" class="btn btn-primary fa fa-eye"></a>
                                             <a href="{{ route ('Painel.Avaliacoes.edit', $avaliacao->id) }}" class="btn btn-warning fa fa-edit"></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Data de Avaliação</th>
                                    <th>Peso</th>
                                    <th>IMC</th>
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
