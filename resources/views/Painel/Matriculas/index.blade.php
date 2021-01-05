@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Matrículados
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Matriculados</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Adicionar :

                                @if($role == 1)
                                    <a href="{{ route('Painel.Matriculas.create') }}" class="btn btn-success fa fa-plus"></a>
                                @else
                                    <a href="{{ route('Painel.Matriculas.create') }}" class="btn btn-success fa fa-plus disabled"></a>
                                @endif
                            </h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nome do Cliente</th>
                                    <th>Data de Início</th>
                                    <th>Tipo de Plano</th>
                                    <th>Valor de Plano</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($matriculas as $matricula)
                                    <tr>

                                        @foreach($clientes as $cliente)
                                            @if($cliente->id == $matricula->cliente_id )
                                                <td>{{$cliente->nome_cliente}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{  date('d/m/Y H:i:s', strtotime($matricula->data))}}</td>
                                        @foreach($planos as $plano)
                                            @if($plano->id == $matricula->plano_id )
                                                <td>{{$plano->nome_plano}}</td>
                                            @endif

                                        @endforeach
                                        @foreach($planos as $plano)
                                            @if($plano->id == $matricula->plano_id )
                                                <td>R${{$plano->valor_plano}}</td>
                                            @endif
                                        @endforeach
                                            @php
                                                $status = 'Ativo';
                                            @endphp
                                            @if($matricula->deleted_at == null )
                                                @php
                                                    $status = 'Ativo';
                                                @endphp
                                            @endif
                                            <td>{{$status}}</td>

                                        <td>
                                            @if($role == 1)
                                                @if($status == 'Ativo')
                                                    <a href="{{ route ('Painel.Matriculas.edit', $matricula->id) }}" class="btn btn-warning fa fa-edit"></a>
                                                    <a href="{{ route ('Painel.Matriculas.confirmDestroy', $matricula->id)}}" class="btn btn-danger fa fa-trash"></a>
                                                    <a href="{{route('Painel.Matriculas.finish', $matricula->id)}}" class="btn btn-info">Encerrar</a>

                                                @elseif($status == 'Encerrado')
                                                    <a href="{{ route ('Painel.Matriculas.edit', $matricula->id) }}" class="btn btn-warning fa fa-edit"></a>
                                                    <a href="{{ route ('Painel.Matriculas.confirmDestroy', $matricula->id)}}" class="btn btn-danger fa fa-trash"></a>
                                                @endif


                                            @else
                                                <a href="{{ route ('Painel.Matriculas.edit', $matricula->id) }}" class="btn btn-warning fa fa-edit disabled"></a>
                                                <a href="{{ route ('Painel.Matriculas.confirmDestroy', $matricula->id)}}" class="btn btn-danger fa fa-trash disabled"></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome do Cliente</th>
                                    <th>Data de Início</th>
                                    <th>Tipo de Plano</th>
                                    <th>Valor de Plano</th>
                                    <th>Status</th>
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
