@extends('frame.index')
@section('title_data','active')
@section('tchild_data','current-page')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>List <small>Users</small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-1 col-sm-1 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">

                        <button class="btn btn-secondary" type="button">Go!</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Table <small>Fakultas</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tr>
                                                <th>NO</th>
                                                <th>ID Prodi</th>
                                                <th>ID Fakultas</th>
                                                <th>Nama Prodi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prodi as $prodi)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$prodi->id_prodi}}</td>
                                                    <td>{{$prodi->id_fakultas}}</td>
                                                    <td>{{$prodi->nama_prodi}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
