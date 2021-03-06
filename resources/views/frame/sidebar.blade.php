<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            @can('manage-users')
            <li class="@yield('title_admin')"><a><i class="fa fa-home"></i> Administrator <span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="@yield('tchild_admin')"><a href="{{ route('users.index') }}"><i
                                class="fa fa-user"></i>Users</a></li>

                    {{-- pmb modul --}}
                    <li class="@yield('title_pmb')"><a><i class="fa fa-gear"></i> Pengaturan PMB <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="@yield('tchild_pmb')"><a href="{{url('/pengaturan/pendaftaran-pmb')}}">Setting
                                    Jadwal PMB</a></li>
                        </ul>
                    </li>
                    {{-- end pmb modul --}}

                    <li class="@yield('title_data')"><a><i class="fa fa-database"></i> Master Data <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="@yield('tchild_data')"><a href="{{route('fakultas.fakultas')}}">Data Fakultas</a>
                            </li>
                            <li class="@yield('tchild_data')"><a href="{{ route('prodi.prodi') }}">Data Prodi</a></li>
                            <li class="@yield('tchild_data')"><a href="{{ route('strata.strata') }}">Jenjang
                                    Pendidikan</a></li>
                            <li class="@yield('tchild_data')"><a href="{{ route('kelas.kelas') }}">Kelas</a></li>
                        </ul>
                    </li>

                    <li class="@yield('title_admin')"><a><i class="fa fa-wrench"></i>Konfigurasi<span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="@yield('tchild_admin')"><a href="{{route('set.email')}}">Konfigurasi Pengumuman</a>
                            </li>
                        </ul>
                    </li>
            </li>
            @endcan
            @can('manage-keuangan')
            <li class="@yield('title_admin')"><a href="{{url('operator/pendaftaran/aktivasi-mhs')}}"><i
                        class="fa fa-money"></i> Aktivasi Pembayaran</a></li>
            <li class="@yield('title_admin')"><a href="{{url('/pengaturan/pendaftaran-pmb/biaya-registrasi')}}"><i
                        class="fa fa-gear"></i>Pengaturan Biaya Registrasi</a></li>
            @endcan
            @can('manage-prodi')
            <li class="@yield('title_admin')"><a><i class="fa fa-dashboard"></i>Dashboard dan Lap PMB<span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="@yield('tchild_admin')"><a href="{{url('/dash')}}">Dashboard </a></li>
                    <li class="@yield('tchild_admin')"><a href="{{url('/operator/laporan-kelulusan-ujian')}}">Laporan Kelulusan Ujian Online</a></li>
                </ul>
            </li>
            <li class="@yield('title_admin')"><a><i class="fa fa-file-text"></i>Pendaftaran Online<span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">

                    <li class="@yield('tchild_admin')"><a href="{{url('operator/pendaftaran/info-registrasi')}}">Info
                            Registrasi</a></li>
                </ul>
            </li>
            <li class="@yield('title_admin')"><a><i class="fa fa-file-text"></i>Nilai Ujian<span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="@yield('tchild_admin')"><a href="{{url('/operator/entry-nilai-ujian')}}">Entry Nilai
                            Ujian</a></li>
                </ul>
            </li>
            <li class="@yield('title_admin')"><a><i class="fa fa-cogs"></i>Pengaturan<span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="@yield('tchild_admin')"><a href="{{url('/operator/jadwal-ujian')}}">Jadwal Ujian</a></li>
                </ul>
            </li>
            @endcan
            @can('manage-calon-mhs')
            <li class="@yield('title_admin')"><a a href="{{url('/calon-mahasiswa/formulir')}}"><i
                        class="fa fa-file-text"></i> Formulir</a></li>
            <li class="@yield('title_admin')"><a href="{{url('/calon-mahasiswa/form-upload')}}"><i
                        class="fa fa-credit-card"></i> Pembayaran Registrasi</a></li>
            <li class="@yield('title_admin')"><a href="{{url('/calon-mahasiswa/form-biodata')}}"><i
                        class="fa fa-book"></i> Biodata</a></li>
            <li class="@yield('title_admin')"><a href="{{url('/calon-mahasiswa/form-document')}}"><i
                        class="fa fa-cloud-upload"></i> Upload Document</a></li>
            <li class="@yield('title_admin')"><a href="{{url('pengaturan/pengumuman')}}"><i
                        class="fa fa-gear"></i> Pengumuman</a></li>
            
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