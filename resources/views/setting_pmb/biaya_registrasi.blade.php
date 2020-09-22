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
                    <h2>Biaya Registrasi PMB</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                      <br />
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{url('/pengaturan/pendaftaran-pmb/simpan-biaya-registrasi')}}">
                        {{csrf_field()}}
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">ID PMB<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                                <select name="id_pmb" id="id_pmb" class="form-control "></select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Fakultas<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <select name="id_fakultas" id="id_fakultas" class="form-control "></select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jenjang Prodi</label>
                          <div class="col-md-6 col-sm-6 ">
                                <select name="jenjang_prodi" class="form-control" id="id_jenjang_prodi">

                                </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kelas<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                                <select name="kelas" class="form-control " id="id_kelas">

                                </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Biaya Regitrasi (Rp)<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" type="text" name="biaya_registrasi" class="form-control ">
                          </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                          <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">simpan</button>
                          </div>
                        </div>

                      </form>
					</div>
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Biaya Registrasi PMB</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                      <br />
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-responsive" class="table table-striped jambo_table bulk_action text-center" cellspacing="0" width="100%">
                                  <thead>
                                    <tr>
                                      <th>ID PMB</th>
                                      <th>Fakultas</th>
                                      <th>Prodi</th>
                                      <th>Jenjang Prodi</th>
                                      <th>Kelas</th>
                                      <th>Biaya Registrasi</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data_biaya_registrasi as $data)
                                    <tr>
                                        <td>{{$data->id_pmb}}</td>
                                        <td>{{$data->nama_fakultas}}</td>
                                        <td>{{$data->nama_prodi}}</td>
                                        <td>{{$data->jenis_strata}}</td>
                                        <td>{{$data->nama_kelas}}</td>
                                        <td>{{$data->biaya_registrasi}}</td>
                                        <td class="text-center"><a href="" class="btn btn-primary btn-sm fa fa-edit"></a>
                                            <form method="POST" action="{{route('biaya.delete', $data->id_pmb_biaya_registrasi)}}">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Hapus Data" class="btn btn-danger btn-sm delete-pmb"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </form>
                                        </td>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_pmb').select2({
    		placeholder: '- Pilih ID PMB -',
            ajax: {
                url:  '{{url('/get-data-gelombnag-opened')}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (pmb) {
                            return {
                                id: pmb.id_pmb,
                                text: pmb.id_pmb+ ' - ' + pmb.gelombang
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('#id_fakultas').select2({
    		placeholder: '- Pilih Fakultas -',
            ajax: {
                url:  '{{url('/fakultas/get-data-fakultas')}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (fakultas) {
                            return {
                                id: fakultas.id_fakultas,
                                text: fakultas.id_fakultas+' - '+fakultas.nama_fakultas
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('#id_jenjang_prodi').select2({
    		placeholder: '- Pilih Jenjang Podi -',
            ajax: {
                url:  '{{url('/prodi/get_data_jenjang_prodi')}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (jenjang_prodi) {
                            return {
                                id: jenjang_prodi.id_strata,
                                text: jenjang_prodi.jenis_strata
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('#id_kelas').select2({
    		placeholder: '- Pilih Kelas -',
            ajax: {
                url:  '{{url('/kelas/get-data-kelas')}}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (kelas) {
                            return {
                                id: kelas.id_kelas,
                                text: kelas.id_kelas+' - '+kelas.nama_kelas
                            }
                        })
                    };
                },
                cache: true
            }
        });
    });
    $('.delete-pmb').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

</script>
@endsection
