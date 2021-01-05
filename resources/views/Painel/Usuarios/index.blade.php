@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Usuários
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Usuários</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Usuários | Adicionar : <a href="{{ route('Painel.Usuarios.create') }}" class="btn btn-success fa fa-plus"></a></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Cadastro</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route ('Painel.Usuarios.edit', $usuario->id) }}" class="btn btn-warning fa fa-edit"></a>
                                            <a href="{{ route ('Painel.Usuarios.destroy', $usuario->id)}}" class="btn btn-danger fa fa-trash"></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Cadastro</th>
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
