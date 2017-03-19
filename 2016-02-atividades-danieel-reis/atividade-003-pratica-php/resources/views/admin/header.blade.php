<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">Sistema Acadêmico</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                @if(Auth::check())
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ asset("/bower_components/admin-lte/dist/img/user.jpg") }}" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ asset("/bower_components/admin-lte/dist/img/user.jpg") }}" class="img-circle" alt="User Image" />
                                <p>{{ Auth::user()->nome }} - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li> -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/users/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                </div>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown messages-menu">
                      <!-- Menu toggle button -->
                      <li><a href="{{ url('/login') }}"><img src="{{ asset("/img/login.png") }}" alt="Login" height="20" width="20"/></a></li>
                    </li><!-- /.messages-menu -->
                @endif

            </ul>
        </div>
    </nav>
</header>
