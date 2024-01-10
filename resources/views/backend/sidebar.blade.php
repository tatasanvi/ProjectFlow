@php
    $name = Auth::user()->name;
    $initials = strtoupper(substr($name, 0, 2));
@endphp



<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{asset('dist/img/LOGO_A.jpg')}}" alt="PROJECTFLOW Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">PROJECTFLOW</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <span class="circle-initials" >{{ $initials }} </span>

      </div>

      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-sidebar">
        <i class="fas fa-search fa-fw"></i>
        </button>
        </div>
        </div>
        </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('home')}}" class="nav-link" :focus>
            <i class="nav-icon fas fa-door-open"></i>              <p>
                Dashboard
              </p>
          </a>
        </li>
        @role('admin')
        <li class="nav-item">
          <a href="{{ route('admins.utilisateurs')}}" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Utilisateurs
            </p>
          </a>
        </li>
        @endrole
        @role('admin|decideur')
        <li class="nav-item">
          <a href="{{ route('roles.index')}}" class="nav-link">
            <i class="nav-icon fab fa-resolving"></i>
            <p>
              Roles
            </p>
          </a>
        </li>
        @endrole
        @role('admin|decideur|chef projet')
        <li class="nav-item">
          <a href="{{ route('type_projets')}}" class="nav-link">
            <i class="nav-icon fab fa-cuttlefish"></i>
            <p>
              Type de projet
            </p>
          </a>
        </li>
        @endrole
        <li class="nav-item">
            <a href="{{ route('projets')}}" class="nav-link">
                <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Projets
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('ressources')}}" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p>
                Ressources
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('regle_gestions')}}" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                Règles de gestion
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('contraintes')}}" class="nav-link">
                <i class="nav-icon fas fa-exclamation-triangle"></i>
                <p>
                Contraintes
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('piece_jointes')}}" class="nav-link">
                <i class="nav-icon fas fa-paperclip"></i>
                <p>
                Pièces jointes
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('taches')}}" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                Taches
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('taches')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                Etats des projets
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('piece_jointes')}}" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                Etats des tâches
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('taches')}}" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                suivi des tâches
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('taches')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                suivi des projet
              </p>
            </a>
        </li>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
