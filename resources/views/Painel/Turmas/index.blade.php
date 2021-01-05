@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Turmas
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Turmas</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                @if (isset($errors))
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li>Esta Turma não pode ser excluída!</li>
                            </ul>
                        </div>
                        <br />
                    @endif
                @endif

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Turmas | Adicionar : <a href="{{ route('Painel.Turmas.create') }}" class="btn btn-success fa fa-plus"></a></h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Dias de Treino</th>
                                    <th>Horário</th>
                                    <th>Quantidade de Clientes</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($turmas as $turma)
                                    <tr>

                                        <td>{{ $turma->nome_turma }}</td>
                                        <td>{{ $turma->dias }}</td>
                                        <td>{{ $turma->horario }}</td>
                                        @if(isset($matriculas))
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach($matriculas as $matricula)
                                                @if($matricula->turma_id == $turma->id)
                                                    @php
                                                        $total = $total + 1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <td>{{ $total }}

                                        </td>
                                         <td>
                                            <a href="{{ route ('Painel.Turmas.edit', $turma->id) }}" class="btn btn-warning fa fa-edit"></a>
                                            <a href="{{ route ('Painel.Turmas.confirmDestroy', $turma->id)}}" class="btn btn-danger fa fa-trash"></a>
                                             @if($role == 1)
                                                 <a href="{{route('Painel.Matriculas.createturma', $turma->id)}}" class="btn btn-info">Matricular</a>
                                             @else
                                                 <a href="{{route('Painel.Matriculas.createturma', $turma->id)}}" class="btn btn-info disabled">Matricular</a>
                                             @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Dias de Treino</th>
                                    <th>Horário</th>
                                    <th>Quantidade de Clientes</th>
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
