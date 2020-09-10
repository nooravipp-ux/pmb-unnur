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
                    <h2>Info Registrasi</h2>
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
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30">
                                  Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                                </p>
					
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                  <thead>
                                    <tr>
                                      <th>No Pendaftraan</th>
                                      <th>ID PMB</th>
                                      <th>NIK</th>
                                      <th>Nama Lengkap</th>
                                      <th>E-mail</th>
                                      <th>Fakultas</th>
                                      <th>Prodi</th>
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
                                      <td>{{$data->tahun}}</td>
                                      <td>{{$data->status_pembayaran_registrasi}}</td>
                                      <td class="text-center"><a href="" data-toggle="tooltip" data-placement="top" title="View Detail"><i class="fa fa-eye"></i></a></td>
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