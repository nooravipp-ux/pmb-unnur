@extends('frame.index')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row" style="display: inline-block;">
            <div class="tile_count">
                <div class="col-md-3 col-sm-5  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Register</span>
                    <div class="count"><a id="total_register" href="">0</a></div>
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
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Info Registrasi</h2>
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
                                <div class="card-box table-responsive">
                                    

                                    <table id="datatable-responsive"
                                        class="table table-striped jambo_table bulk_action" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>No Pendaftraan</th>
                                                <th>ID PMB</th>
                                                <th>NIK</th>
                                                <th>Nama Lengkap</th>
                                                <th>E-mail</th>
                                                <th>Fakultas</th>
                                                <th>Prodi</th>
                                                <th>Jenjang Prodi</th>
                                                <th>Tahun </th>
                                                <th>Status Registrasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_pendaftar as $data)
                                            <tr>
                                                <td>{{$data->id_pendaftar}}</td>
                                                <td>{{$data->id_pmb}}</td>
                                                <td>{{$data->nik}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->nama_fakultas}}</td>
                                                <td>{{$data->nama_prodi}}</td>
                                                <td>{{$data->jenis_strata}}</td>
                                                <td>{{$data->tahun}}</td>
                                                <td class="status">{{$data->status_pembayaran_registrasi}}</td>
                                                <td class="text-center"><a href="" data-toggle="tooltip"
                                                        data-placement="top" title="View Detail"><i
                                                            class="fa fa-eye"></i></a></td>
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

@section('script')
<script>
$(document).ready(function() {
    loadData()
    setInterval(function() {
        loadData();
    }, 10000); 
    $('table tbody td.status').map(function() {
        if($(this).text() == "SUDAH DI KONFIRMASI"){
            $(this).css("background-color", "green");
        }else{
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
                console.log(data);
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
                console.log(data);
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
                console.log(data);
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
@endsection