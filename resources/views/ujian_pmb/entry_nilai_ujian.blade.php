@extends('frame.index')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
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
                                        <input type="number" class="form-control" name="nilai_test" id="nilai_test">
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
                                    <table id="datatable-peserta-ujian" class="table table-striped jambo_table bulk_action"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID PMB</th>
                                                <th>ID Test</th>
                                                <th>Nama</th>
                                                <th>Jalur Masuk</th>
                                                <th>Nilai Ujian</th>
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
    loadData();
    $('#update').on('click', function() {
        var id_test = $('#id_test').val();
        var nilai_test = $('#nilai_test').val();
        
        $.ajax({
            url: '{{url('/operator/entry-nilai-ujian/update-nilai-peserta-ujian')}}',
            type: 'post',
            data: {id_test:id_test, 
                nilai_test:nilai_test
                },
            dataType: "json",
            beforeSend: function() {
                
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



});

function loadData() {
    $.ajax({
        url: '{{url('/operator/entry-nilai-ujian/load-data-peserta-ujian')}}',
        type: 'get',
        dataType: "json",
        beforeSend: function() {
            $(".row-data").remove();
        },
        success: function(data) {
            if (data.error) {
                alert(data.error)
            } else {
                console.log(data);
                console.log(data.length);
                if (data.length == 0) {
                    alert("DATA KOSONG ATAU DATA SUDAH DIKIRIM KE CABANG TUJUAN")
                } else {
                    for (var i = 0; i < data.length; i++) {
                        tr = '<tr class="row-data">' +
                            '<td>' + data[i].id_pmb + '</td>' +
                            '<td>' + data[i].id_test + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].jalur_masuk + '</td>' +
                            '<td>' + data[i].nilai_ujian + '</td>' +
                            '<td></td>' +
                            '</tr>';
                        $('table tbody').append(tr);
                    }
                }
            }

        }
    });
}
</script>

@endsection