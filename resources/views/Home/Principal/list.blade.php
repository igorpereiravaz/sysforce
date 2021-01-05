@extends('auth.Layouts.index')

@includeIf('Painel.Layouts.head')

<body>

    <div class="content">
        <section class="content-header">
            <h1>
                Lista de Treinos
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Home.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Treinos</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Treinos</h3>


                        </div>
                        <!-- /.box-header -->
                        <h1>{{$cliente->nome_cliente}}</h1>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome do Treino</th>
                                    <th>Data de Criação</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($treinos as $treino)
                                    @if($treino->updated_at == null )
                                        <tr>
                                            <td>{{ $treino->id }}</td>
                                            <td>{{$treino->nome}}</td>
                                            <td>{{  date('d/m/Y H:i:s', strtotime($treino->data)) }}</td>
                                            <td>
                                                 <a href="{{ route ('Home.Principal.view', $treino->id)}}" class="btn btn-primary fa fa-eye"></a>
                                            </td>
                                        </tr>
                                    @endif
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
                            <a href="{{ route('Home.Principal.Show') }}" type="submit" class="btn btn-danger pull-right">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

