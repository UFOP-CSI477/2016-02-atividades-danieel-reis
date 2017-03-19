<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">PetShop</a>

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
                    <li class="dropdown messages-menu">
                      <!-- Menu toggle button -->
                      <ul class="dropdown-menu">
                          <li class="header">You have 4 messages</li>
                          <li>
                              <!-- inner menu: contains the messages -->
                              <ul class="menu">
                                  <li><!-- start message -->
                                      <a href="#">
                                          <div class="pull-left">
                                              <!-- User Image -->
                                              <img src="{{ asset("/bower_components/admin-lte/dist/img/user.jpg") }}" class="img-circle" alt="User Image"/>
                                          </div>
                                          <!-- Message title and timestamp -->
                                          <h4>
                                              Support Team
                                              <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                          </h4>
                                          <!-- The message -->
                                          <p>Why not buy a new awesome theme?</p>
                                      </a>
                                  </li><!-- end message -->
                              </ul><!-- /.menu -->
                          </li>
                          <li class="footer"><a href="#">See All Messages</a></li>
                      </ul>
                    </li><!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="/carrinho" class="dropdown-toggle">
                            <i class="fa fa-cart-plus"></i>
                            <?php
                                $carrinho = Session::pull('compra');
                                $qtd = count($carrinho);

                                if(isset($carrinho)) {
                                    $j = 1;
                                    foreach ($carrinho as &$compras) {
                                        $i = 1;
                                        foreach ($compras as &$c) {
                                            if($i == 1) $id_user = $c;
                                            else if($i == 2) $id_produto = $c;
                                            else if($i == 3) $imagem = $c;
                                            else if($i == 4) $preco = $c;
                                            else if($i == 5) $quantidade = $c;
                                            $i++;
                                        }
                                        $j++;
                                        Session::push('compra', [
                                            'id_user' => $id_user,
                                            'id_produto' => $id_produto,
                                            'imagem' => $imagem,
                                            'preco' => $preco,
                                            'quantidade' => $quantidade
                                        ]);
                                    }
                                }
                            ?>
                            <span class="label label-warning">{{ $qtd }}</span>
                        </a>
                    </li>
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
