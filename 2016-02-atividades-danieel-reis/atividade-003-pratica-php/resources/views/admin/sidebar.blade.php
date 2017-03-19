<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @if(Auth::check()) {
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
              <div class="pull-left image">
                  <img src="{{ asset("/bower_components/admin-lte/dist/img/user.jpg") }}" class="img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
                  <p>{{ Auth::user()->name }}</p>

                  <!-- Status -->
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>
        }
        @endif

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @if(Auth::check()) {
              <?php $id = Auth::user()->id ?>
                <!-- <li class="active"><a href="/users/{{ $id }}"><span>Perfil</span></a></li> -->
                <li class="active"><a href="/alunos/"><span>Alunos</span></a></li>
                <li class="active"><a href="/turmas/"><span>Turmas</span></a></li>
                <li class="active"><a href="/disciplinas/"><span>Disciplinas</span></a></li>
                <li class="active"><a href="/cidades/"><span>Cidades</span></a></li>
                <li class="active"><a href="/estados/"><span>Estados</span></a></li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
