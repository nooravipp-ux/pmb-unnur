@extends('frame.index')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jadwal Pendaftaran PMB Pertahun Gelombang dan Jalur Masuk</h2>
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
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{url('/pengaturan/pendaftaran-pmb/simpan-data-pmb')}}">
                        {{csrf_field()}}
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tahun Masuk<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="tahun_masuk" class="form-control " value="<?php echo date("Y"); ?>">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Gelombang<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="gelombang" class="form-control">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Mulai</label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="date" name="start_date" class="form-control">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Selesai<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="date" type="text" name="finish_date" class="form-control ">
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
                    <h2>Data Jadwal Pendaftaran PMB</h2>
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
                                <table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                    <tr>
                                      <th>ID PMB</th>
                                      <th>Tahun Masuk</th>
                                      <th>Gelombang</th>
                                      <th>Mulai</th>
                                      <th>Selesai</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data_pmb as $data)
                                    <tr>
                                        <td>{{$data->id_pmb}}</td>
                                        <td>{{$data->tahun}}</td>
                                        <td>{{$data->gelombang}}</td>
                                        <td>{{$data->start_date}}</td>
                                        <td>{{$data->finish_date}}</td>
                                        <td class="text-center">
                                            <form method="POST" action="{{route('pmb.delete', $data->id_pmb)}}">
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
<script>
    $('.delete-pmb').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

</script>
@endsection
