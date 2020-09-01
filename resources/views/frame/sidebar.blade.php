<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        @can('manage-users')
        <li class="@yield('title_admin')"><a><i class="fa fa-home"></i> Administrator <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li class="@yield('tchild_admin')"><a href="{{ route('users.index') }}">Users</a></li>
          </ul>
        </li>
        @endcan
        @can('manage-keuangan')
        <li class="@yield('title_admin')"><a><i class="fa fa-home"></i> Menu Keuangan <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li class="@yield('tchild_admin')"><a href="#">Biaya Registrasi</a></li>
          </ul>
        </li>
        @endcan
        @can('manage-prodi')
        <li class="@yield('title_admin')"><a><i class="fa fa-home"></i> Menu Prodi <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li class="@yield('tchild_admin')"><a href="#">Aktivasi Akun PMB</a></li>
          </ul>
        </li>
        @endcan
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->