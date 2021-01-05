@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Exercícios
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Exercícios</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                @if (isset($errors))
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li>Exercício está vinculado a um ou mais Treinos</li>
                            </ul>
                        </div>
                        <br />
                    @endif
                @endif

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Exercícios | Adicionar : <a href="{{ route('Painel.Exercicios.create') }}" class="btn btn-success fa fa-plus"></a></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($exercicios as $exercicio)
                                    <tr>

                                        <td>{{ $exercicio->nome_exercicio }}</td>
                                         <td>
                                            <a href="{{ route ('Painel.Exercicios.edit', $exercicio->id) }}" class="btn btn-warning fa fa-edit"></a>
                                            <a href="{{ route ('Painel.Exercicios.destroy', $exercicio->id)}}" class="btn btn-danger fa fa-trash"></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
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
