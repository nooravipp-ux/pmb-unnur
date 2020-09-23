@extends('frame.index')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: absolute;
  left: 50%;
  top: 0px;
  z-index: 99999;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row" style="display: inline-block;">
            <div class="tile_count">
                <div class="col-md-3 col-sm-5  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Peserta Ujian</span>
                    <div class="count"><a id="total_peserta_ujian" href="">0</a></div>
                    <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                </div>
                <div class="col-md-3 col-sm-5  tile_stats_count">
                    <span class="count_top"><i class="fa fa-clock-o"></i> Peserta Lulus</span>
                    <div class="count"><a id="peserta_lulus" href="">0</a></div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last
                        Week</span>
                </div>
                <div class="col-md-3 col-sm-5  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Peserta Tidak Lulus</span>
                    <div class="count"><a id="peserta_tidak_lulus" href="">0</a></div>
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
                        <h2>Entry Nilai Hasil Test</h2>
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
                        <div class="row shadow p-4 mb-4 bg-white border rounded mt-lg-2 mb-lg-5">
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama
                                        Mahasiswa</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_test" id="id_test">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Nilai Test</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nilai_test" id="nilai_test"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="button" id="update" class="btn btn-primary btn-sm"
                                            value="Update Nilai">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                <div class="loader"></div>
                                    <table id="datatable-peserta-ujian"
                                        class="table table-striped jambo_table bulk_action" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID PMB</th>
                                                <th>ID Test</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Jalur Masuk</th>
                                                <th>Nilai Ujian</th>
                                                <th>Status Kelulusan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    loadTotalPeserta();
    setInterval(function() {
        loadTotalPeserta();
    }, 10000);
    loadData();
    $('#update').on('click', function() {
        var id_test = $('#id_test').val();
        var nilai_test = $('#nilai_test').val();
    
        $.ajax({
            url: '{{url('/operator/entry-nilai-ujian/update-nilai-peserta-ujian')}}',
            type: 'post',
            data: {
                id_test: id_test,
                nilai_test: nilai_test
            },
            dataType: "json",
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(data) {
                if (data.error) {
                    alert(data.error)
                } else {
                    loadData();
                }

            }
        });
    });

    $('#id_test').select2({
        placeholder: '- Pilih Nama Peserta Ujian -',
        ajax: {
            url: '{{url('/operator/entry-nilai-ujian/get-data-peserta-ujian')}}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(data_peserta) {
                        return {
                            id: data_peserta.id_test,
                            text: data_peserta.id_test + ' - ' + data_peserta.nama
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#datatable-peserta-ujian').on('click', '.btn_confirm_kelulusan', function() {
        var currentRow = $(this).closest('tr');

        var id_prodi = currentRow.find('.id_prodi').val();
        var jenis_pendaftar = currentRow.find('.jenis_pendaftar').val();
        var id_test = currentRow.find('.id_test').text();
        $.ajax({
            url: '{{url('/operator/entry-nilai-ujian/confirmasi-kelulusan')}}',
            type: 'post',
            data: {
                id_prodi: id_prodi,
                jenis_pendaftar: jenis_pendaftar,
                id_test: id_test
            },
            dataType: "json",
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(data) {
                if (data.error) {
                    alert(data.error)
                } else {
                    $('.row-data').remove();
                    loadData();
                    
                }

            }
        });
    });



});

function loadData() {
    $.ajax({
        url: '{{url('/operator/entry-nilai-ujian/load-data-peserta-ujian')}}',
        type: 'get',
        dataType: "json",
        beforeSend: function() {
            $(".row-data").remove();
            $('.loader').show();
        },
        success: function(data) {
            if (data.error) {
                alert(data.error)
            } else {
                console.log(data);
                console.log(data.length);
                if (data.length == 0) {
                    alert("Data Pendaftar Kosong")
                } else {
                    for (var i = 0; i < data.length; i++) {
                        tr = '<tr class="row-data">' +
                            '<td>' + data[i].id_pmb +
                            '<input type="hidden" type="text" class="id_prodi" value="' + data[i].id_prodi +
                            '"></td>' +
                            '<td class="id_test">' + data[i].id_test +
                            '<input type="hidden" type="text" class="jenis_pendaftar" value="' + data[i].jenis_pendaftar + '"></td>' +
                            '<td class="nim">' + data[i].nim + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].jalur_masuk + '</td>' +
                            '<td class="nilai_ujian">' + data[i].nilai_ujian + '</td>' +
                            '<td>' + data[i].kelulusan + '</td>' +
                            '<td><button type="button" class="btn btn-primary btn-sm btn_confirm_kelulusan">Konfirmasi Kelulusan</button></td>' +
                            '</tr>';
                        $('table tbody').append(tr);
                        
                    }
                    $('table tr td.nim').map(function () {
                            
                            if ($(this).text() === null) {
                                // $(this).closest('button').prop('disabled', true);
                                // $(this).css("background-color", "green");
                            }
                            else {
                                $(this).find('.btn_confirm_kelulusan').prop('disabled', false);
                            }
                    });
                    $('.loader').hide();
                }
            }

        }
    });
}

function loadTotalPeserta() {
    $.ajax({
        url: '{{url('/count-total-peserta-ujian')}}',
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
                    $('#total_peserta_ujian').text(data);
                }
            }

        }
    });

    $.ajax({
        url: '{{url('/count-total-peserta-lulus')}}',
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
                    $('#peserta_lulus').text(data);
                }
            }

        }
    });

    $.ajax({
        url: '{{url('/count-total-peserta-tidak-lulus')}}',
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
                    $('#peserta_tidak_lulus').text(data);
                }
            }

        }
    });
}
</script>

@endsection