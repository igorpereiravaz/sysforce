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
                @if (isset($errors))
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li>Este Cliente não pode ser excluído!</li>
                            </ul>
                        </div>
                        <br />
                    @endif
                @endif

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Clientes | Adicionar : <a href="{{ route('Painel.Clientes.create') }}" class="btn btn-success fa fa-plus"></a></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th>Ação</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($clientes as $cliente)
                                    <tr>
                                        @php
                                            $status = 'Não Matrículado';
                                        @endphp
                                        <td>{{ $cliente->nome_cliente }}</td>
                                        <td>{{ $cliente->cpf_cliente }}</td>
                                        <td>{{ $cliente->telefone_cliente }}</td>
                                        @foreach($matriculas as $matricula)
                                            @if($cliente->id == $matricula->cliente_id )
                                                @php
                                                $status = 'Matrículado';
                                                @endphp
                                            @endif
                                        @endforeach
                                            <td>{{$status}}</td>



                                         <td>
                                            <a href="{{ route ('Painel.Clientes.edit', $cliente->id) }}" class="btn btn-warning fa fa-edit"></a>
                                            <a href="{{ route ('Painel.Clientes.confirmDestroy', $cliente->id)}}" class="btn btn-danger fa fa-trash"></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th>Ação</th>

                                </tr>
                                </tfoot>
                            </table>
                            <div class="card-footer">
{{--                                {{$clientes->links()}}--}}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
