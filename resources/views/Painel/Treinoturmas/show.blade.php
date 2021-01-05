@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Treinos
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Treinos</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Treinos | Nova Treino : <a href="{{ route ('Painel.Treinoturmas.create', $turma->id)}}" class="btn btn-success fa fa-plus"></a></h3>


                        </div>
                        <!-- /.box-header -->
                        <h1>{{$turma->nome_turma}}</h1>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome do Treino</th>
                                    <th>Data de Criação</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($treinos as $treino)
                                    @php
                                        $status = 'Ativo';
                                    @endphp
                                    <tr>
                                        <td>{{ $treino->id }}</td>
                                        <td>{{$treino->nome}}</td>
                                        <td>{{  date('d/m/Y H:i:s', strtotime($treino->data)) }}</td>

                                        @if($treino->updated_at != null )
                                            @php
                                                $status = 'Encerrado';
                                            @endphp
                                        @endif
                                        <td>{{$status}}</td>
                                         <td>
                                             @if($status == 'Ativo')
                                                 <a href="{{ route ('Painel.Treinoturmas.destroy', $treino->id)}}" class="btn btn-danger fa fa-trash"></a>
                                                 <a href="{{ route ('Painel.Treinoturmas.view', $treino->id)}}" class="btn btn-primary fa fa-eye"></a>
                                                 <a href="{{route('Painel.Treinoturmas.finish', $treino->id)}}" class="btn btn-info">Encerrar</a>
                                             @endif
                                                 @if($status == 'Encerrado')
                                                     <a href="{{ route ('Painel.Treinoturmas.destroy', $treino->id)}}" class="btn btn-danger fa fa-trash"></a>
                                                     <a href="{{ route ('Painel.Treinoturmas.view', $treino->id)}}" class="btn btn-primary fa fa-eye"></a>
                                                 @endif

                                        </td>


                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome do Treino</th>
                                    <th>Data de Criação</th>
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
