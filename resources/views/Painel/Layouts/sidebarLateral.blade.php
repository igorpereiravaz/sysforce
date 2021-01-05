<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('AdminLTE/img/Avatar/img.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU LATERAL</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>Cadastros</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('Painel.Principal.Show')}}"><i class="fa fa-home"></i>Página Principal</a></li>
                    <li class="active"><a href="{{route('Painel.Usuarios.index')}}"><i class="fa fa-users"></i>Usuários</a></li>
                    <li class="active"><a href="{{route('Painel.Planos.index')}}"><i class="fa fa-tags"></i>Planos</a></li>
                    <li class="active"><a href="{{route('Painel.Exercicios.index')}}"><i class="fa fa-book"></i>Exercícios</a></li>
                    <li class="active"><a href="{{route('Painel.Turmas.index')}}"><i class="fa fa-database"></i>Turmas</a></li>
                    <li class="active"><a href="{{route('Painel.Clientes.index')}}"><i class="fa fa-user"></i>Clientes</a></li>
                </ul>

                <a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>Matriculas</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('Painel.Matriculas.index')}}"><i class="fa fa-home"></i>Lista de Matriculados</a></li>

                </ul>

                <a href="#">
                    <i class="fa fa-book"></i> <span>Mensalidades</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('Painel.Mensalidades.index')}}"><i class="fa fa-money"></i>Pagamentos</a></li>
                </ul>

                <a href="#">
                    <i class="fa fa-book"></i> <span>Treinamentos</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('Painel.Treinoturmas.index')}}"><i class="fa fa-money"></i>Treinamento Turma</a></li>
                    <li class="active"><a href="{{route('Painel.Treinosolos.index')}}"><i class="fa fa-book"></i>Individual</a></li>
                </ul>


                <a href="#">
                    <i class="fa fa-book"></i> <span>Avaliação</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('Painel.Avaliacoes.index')}}"><i class="fa fa-edit"></i>Avaliaçoes</a></li>
                </ul>


                <a href="#">
                    <i class="fa fa-book"></i> <span>Relatórios</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('Painel.Relatorios.choseLucro')}}"><i class="fa fa-money"></i>Lucro Mensal</a></li>
                    <li class="active"><a href="{{route('Painel.Relatorios.choseClientes')}}"><i class="fa fa-money"></i>Inadimplentes</a></li>
                    <li class="active"><a href="{{route('Painel.Relatorios.avaliacoes')}}"><i class="fa fa-book"></i>Histórico de Avaliações</a></li>
                </ul>

        </ul>
    </section>
</aside>
