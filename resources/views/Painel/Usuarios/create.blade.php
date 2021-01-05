@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Cadastro de Usuários
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cadastro de Usuários</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cadastrando usuário</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Usuarios.store') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="name">
                                        <i class="fa fa-info"></i> Nome completo
                                    </label>
                                    <input type="text" class="form-control" id="name"
                                           placeholder="Ex: Matias Fernandes"
                                    name="name" value="{{old('name')}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="email">
                                        <i class="fa fa-globe"></i> Email
                                    </label>
                                    <input type="email" class="form-control" id="email"
                                           placeholder="Ex: Matias@gmail.com"
                                           name="email" value="{{old('email')}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="password">
                                        <i class="fa fa-user-secret"></i>Senha
                                    </label>
                                    <input type="password" class="form-control" id="password"
                                           placeholder="**********"
                                           name="password" value="" required>
                                </div>

                                <div class="form-group">
                                    <label> <i class="fa fa-search"></i>Função de Usuário</label>
                                    <select class="form-control" name="role_id" required>
                                        <option value="">Escolha a função</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id ?? ''}}">{{$role->name ?? ''}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <br />
                                @endif

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    <a href="{{ route('Painel.Usuarios.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
