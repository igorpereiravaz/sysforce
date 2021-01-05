<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('Painel.Principal.Show') }}" class="logo">
        <span class="logo-mini"><b>S</b>FC</span>

        <span class="logo-lg">SysForce</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('AdminLTE/img/Avatar/img.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('AdminLTE/img/Avatar/img.png') }}" class="img-circle" alt="User Image">

                            <p>
                                {{ auth()->user()->name }}
                                <small>Membro {{ auth()->user()->created_at->diffForHumans() }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">


                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-danger btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair-S</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
