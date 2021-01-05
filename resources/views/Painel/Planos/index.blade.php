@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Planos
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Planos</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                @if (isset($errors))
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li>Este Plano não pode ser excluído!</li>
                            </ul>
                        </div>
                        <br />
                    @endif
                @endif

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Planos | Adicionar :
                                @if($role == 1)
                                <a href="{{ route('Painel.Planos.create') }}" class="btn btn-success fa fa-plus"></a>
                                @else
                                <a href="{{ route('Painel.Planos.create') }}" class="btn btn-success fa fa-plus disabled"></a>
                            @endif
                            </h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover dataTable">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade de Treinos Semanais</th>
                                    <th>Valor</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($planos as $plano)
                                    <tr>
                                        <td>{{ $plano->nome_plano }}</td>
                                        <td>{{ $plano->qtdtreino_plano }}</td>
                                        <td>R${{$valor = $plano->valor_plano = str_replace('.', ',',$plano->valor_plano)}}</td>
                                        <td>
                                            @if($role == 1)
                                                <a href="{{ route ('Painel.Planos.edit', $plano->id) }}" class="btn btn-warning fa fa-edit"></a>
                                                <a href="{{ route ('Painel.Planos.confirmDestroy', $plano->id)}}" class="btn btn-danger fa fa-trash"></a>
                                            @else
                                                <a href="{{ route ('Painel.Planos.edit', $plano->id) }}" class="btn btn-warning fa fa-edit disabled"></a>
                                                <a href="{{ route ('Painel.Planos.confirmDestroy', $plano->id)}}" class="btn btn-danger fa fa-trash disabled"></a>
                                            @endif

                                        </td>
                                    </tr>
                                 @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade de Treinos Semanais</th>
                                    <th>Valor</th>
                                    <th>Ação</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
            <script>
                // $(document).ready(function() {
                //     alert(window.location.pathname);
                $('#example1').DataTable( {
                    "ajax": "teste.php"
                } );
                // } );
            </script>
        </section>
    </div>



@endsection
