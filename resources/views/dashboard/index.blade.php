@extends('frame.index')
@section('title','Portal PMB Sistem Informasi Akademik')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    @if($user->name == "calon-mhs")
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">SELAMAT DATANG CALON MAHASISWA</h5>
          <p class="card-text">Silahkan Lengkapi Data Yang sudah disediakan di menu dashboard.</p>
          <p>Berikut prosedur untuk melengkapi data :</p>
          <p>1.Formulir</p>
          <p>2.Pembayaran Registrasi</p>
          <p>3.Biodata</p>
          <p>4.Upload Document Kelengkapan</p>
        </div>
      </div>
    @else
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-3 col-sm-5  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Register</span>
                <div class="count"><a id="total_register" href="{{url('/operator/pendaftaran/info-registrasi')}}">0</a>
                </div>
                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-3 col-sm-5  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Register Hari Ini</span>
                <div class="count"><a id="today_register" href="">0</a></div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last
                    Week</span>
            </div>
            <div class="col-md-3 col-sm-5  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Bayar</span>
                <div class="count"><a id="status_register" href="">0</a></div>
                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last
                    Week</span>
            </div>
            <div class="col-md-3 col-sm-5  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Aktivasi</span>
                <div class="count green">0</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                    Week</span>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Statistik PMB </h3>
                    </div>
                    <div class="col-md-6">
                        <div id="reportrange" class="pull-right"
                            style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 ">
                    <div id="cha" class="dem">
                        <canvas id="statistik_pmb"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <canvas id="statistik_pmb_pergelombang"></canvas>
                    </div>
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <br />

    <div class="row">


        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>App Versions</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>App Usage across versions</h4>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>0.1.5.2</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>123k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>0.1.5.3</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>53k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>0.1.5.4</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>23k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>0.1.5.5</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>3k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>0.1.5.6</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>1k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                    <h2>Device Usage</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        <tr>
                            <th style="width:37%;">
                                <p>Top 5</p>
                            </th>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 ">
                                    <p class="">Device</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 ">
                                    <p class="">Progress</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas class="canvasDoughnut" height="140" width="140"
                                    style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>IOS </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Android </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Blackberry </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square aero"></i>Symbian </p>
                                        </td>
                                        <td>15%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square red"></i>Others </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Quick Settings</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="quick-list">
                            <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                            </li>
                            <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                            </li>
                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                            </li>
                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                            </li>
                            <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                            </li>
                        </ul>

                        <div class="sidebar-widget">
                            <h4>Profile Completion</h4>
                            <canvas width="150" height="80" id="chart_gauge_01" class=""
                                style="width: 160px; height: 100px;"></canvas>
                            <div class="goal-wrapper">
                                <span id="gauge-text" class="gauge-value pull-left">0</span>
                                <span class="gauge-value pull-left">%</span>
                                <span id="goal-text" class="goal-value pull-right">100%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Recent Activities <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers.
                                            They were where you met the producers that could fund your project, and if
                                            the buyers liked your flick, they’d pay to Fast-forward and…
                                            <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers.
                                            They were where you met the producers that could fund your project, and if
                                            the buyers liked your flick, they’d pay to Fast-forward and…
                                            <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers.
                                            They were where you met the producers that could fund your project, and if
                                            the buyers liked your flick, they’d pay to Fast-forward and…
                                            <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers.
                                            They were where you met the producers that could fund your project, and if
                                            the buyers liked your flick, they’d pay to Fast-forward and…
                                            <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-8 col-sm-8 ">



            <div class="row">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Visitors location <small>geo-presentation</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">
                                <div class="col-md-4 hidden-small">
                                    <h2 class="line_30">125.7k Views from 60 countries</h2>

                                    <table class="countries_list">
                                        <tbody>
                                            <tr>
                                                <td>United States</td>
                                                <td class="fs15 fw700 text-right">33%</td>
                                            </tr>
                                            <tr>
                                                <td>France</td>
                                                <td class="fs15 fw700 text-right">27%</td>
                                            </tr>
                                            <tr>
                                                <td>Germany</td>
                                                <td class="fs15 fw700 text-right">16%</td>
                                            </tr>
                                            <tr>
                                                <td>Spain</td>
                                                <td class="fs15 fw700 text-right">11%</td>
                                            </tr>
                                            <tr>
                                                <td>Britain</td>
                                                <td class="fs15 fw700 text-right">10%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">


                <!-- Start to do list -->
                <div class="col-md-6 col-sm-6 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>To Do List <small>Sample tasks</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="">
                                <ul class="to_do">
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Schedule meeting with new client
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End to do list -->

                <!-- start of weather widget -->
                <div class="col-md-6 col-sm-6 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daily active users <small>Sessions</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="temperature"><b>Monday</b>, 07:30 AM
                                        <span>F</span>
                                        <span><b>C</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="weather-icon">
                                        <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="weather-text">
                                        <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="weather-text pull-right">
                                    <h3 class="degrees">23</h3>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="row weather-days">
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Mon</h2>
                                        <h3 class="degrees">25</h3>
                                        <canvas id="clear-day" width="32" height="32"></canvas>
                                        <h5>15 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Tue</h2>
                                        <h3 class="degrees">25</h3>
                                        <canvas height="32" width="32" id="rain"></canvas>
                                        <h5>12 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Wed</h2>
                                        <h3 class="degrees">27</h3>
                                        <canvas height="32" width="32" id="snow"></canvas>
                                        <h5>14 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Thu</h2>
                                        <h3 class="degrees">28</h3>
                                        <canvas height="32" width="32" id="sleet"></canvas>
                                        <h5>15 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Fri</h2>
                                        <h3 class="degrees">28</h3>
                                        <canvas height="32" width="32" id="wind"></canvas>
                                        <h5>11 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Sat</h2>
                                        <h3 class="degrees">26</h3>
                                        <canvas height="32" width="32" id="cloudy"></canvas>
                                        <h5>10 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end of weather widget -->
            </div>
        </div>
    </div>
    @endif
</div>
<!-- /page content -->
@endsection

@section('script')
<script>
$(document).ready(function() {
    loadData()
    setInterval(function() {
        loadData();
    }, 10000);
    $('table tbody td.status').map(function() {
        if ($(this).text() == "SUDAH DI KONFIRMASI") {
            $(this).css("background-color", "green");
        } else {
            $(this).css("background-color", "yellow");
        }
    });
});

function loadData() {
    $.ajax({
        url: '{{url('/count-total-register')}}',
        type: 'get',
        dataType: "json",
        beforeSend: function() {

        },
        success: function(data) {
            if (data.error) {
                alert(data.error)
            } else {
                // console.log(data);
                if (data.length == 0) {
                    alert("Belum ada pendaftar !!!")
                } else {
                    $('#total_register').text(data);
                }
            }

        }
    });

    $.ajax({
        url: '{{url('/count-today-register')}}',
        type: 'get',
        dataType: "json",
        beforeSend: function() {

        },
        success: function(data) {
            if (data.error) {
                alert(data.error)
            } else {
                // console.log(data);
                if (data.length == 0) {
                    alert("Belum ada pendaftar !!!")
                } else {
                    $('#today_register').text(data);
                }
            }

        }
    });

    $.ajax({
        url: '{{url('/count-register-confirmed')}}',
        type: 'get',
        dataType: "json",
        beforeSend: function() {

        },
        success: function(data) {
            if (data.error) {
                alert(data.error)
            } else {
                // console.log(data);
                if (data.length == 0) {
                    alert("Belum ada pendaftar !!!")
                } else {
                    $('#status_register').text(data);
                }
            }

        }
    });
}
</script>
<script>
// create initial empty chart
var chart_per_gelombang = document.getElementById("statistik_pmb_pergelombang");
var myChart2 = new Chart(chart_per_gelombang, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            data: [],
            borderWidth: 1,
            borderColor: '#00c0ef',
            label: 'Total Pendaftar',
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: "Statistik Pendaftaran Pergelombang",
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    max: 50,
                    min: 1,
                    stepSize: 5
                }
            }]
        }
    }
});


var ctx_live = document.getElementById("statistik_pmb");
var myChart = new Chart(ctx_live, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            data: [],
            borderWidth: 1,
            borderColor: '#00c0ef',
            label: 'Total Pendaftar',
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: "Statistik Pendaftaran Pertahun",
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    max: 50,
                    min: 1,
                    stepSize: 5
                }
            }]
        }
    }
});

getData();
getDataPerGelombang();
// logic to get new data
function getData() {
    $.ajax({
        url: '{{url('/get-data-pendaftar-per-tahun')}}',
        success: function(data) {
            console.log(data.length);
            for(var i = 0; i < data.length; i++){
                myChart.data.labels.push(data[i].tahun);
                myChart.data.datasets.forEach((dataset) => {
                    dataset.data.push(data[i].total_pendaftar);
                });
            }
            // re-render the chart
            myChart.update();
        }
    });
};

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

function getDataPerGelombang() {
    $.ajax({
        url: '{{url('/get-data-pendaftar-per-gelombang')}}',
        success: function(data) {
            console.log(data.length);
            for(var i = 0; i < data.length; i++){
                myChart2.data.labels.push(data[i].gelombang);
                myChart2.data.datasets.forEach((dataset) => {
                    dataset.data.push(data[i].jumlah_pendaftar);
                });
            }
            // re-render the chart
            myChart2.update();
        }
    });
};

function addDataPergelombang(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

// get new data every 3 seconds
// setInterval(getData, 3000);
</script>
@endsection