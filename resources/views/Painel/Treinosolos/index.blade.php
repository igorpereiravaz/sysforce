@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Clientes
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Clientes</li>
            </ol>
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
                                    <th>Nome</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($clientes as $cliente)
                                    <tr>

                                        <td>{{ $cliente->nome_cliente }}</td>

                                         <td>
                                            <a href="{{ route ('Painel.Treinosolos.show', $cliente->id) }}" class="btn btn-primary fa fa-eye"></a>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Código</th>
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
