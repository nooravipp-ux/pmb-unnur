@extends('frame.index')
@section('title', 'PMB | UNNUR')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Pendaftar PMB</h2>
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
                                  
                                </p>
					
                                <table id="datatable-responsive" class="table table-striped jambo_table bulk_action text-center" cellspacing="0" width="100%">
                                  <thead>
                                    <tr>
                                      <th>NIK</th>
                                      <th>Nama Lengkap</th>
                                      <th>Tahun Daftar</th>
                                      <th>Fakultas</th>
                                      <th>Kelas (Pagi/Sore)</th>
                                      <th>Metode Pembayaran</th>
                                      <th>Bukti Pembayaran</th>
                                      <th>Status Pendaftar</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data_pendaftar as $dt)
                                    <tr>
                                      <td>{{$dt->nik}}</td>
                                      <td>{{$dt->nama}}</td>
                                      <td>{{$dt->tahun}}</td>
                                      <td>{{$dt->nama_fakultas}}</td>
                                      <td>{{$dt->nama_kelas}}</td>
                                      <td>{{$dt->metode_pembayaran}}</td>
                                      @if( is_null($dt->bukti_pem) && $dt->metode_pembayaran == "transfer" && $dt->status_pembayaran_registrasi == "BELUM DI KONFIRMASI	")
                                      <td>Bukti Belum Di Upload</td>
                                      @elseif($dt->metode_pembayaran == "cash" && $dt->status_pembayaran_registrasi == "BELUM DI KONFIRMASI	")
                                      <td>Belum Melakukan Transaksi</td>
                                      @elseif($dt->metode_pembayaran == "cash" && $dt->status_pembayaran_registrasi == "SUDAH DI KONFIRMASI")
                                      <td>Sudah Melakukan Transaksi</td>
                                      @elseif($dt->metode_pembayaran == "transfer" && $dt->status_pembayaran_registrasi == "SUDAH DI KONFIRMASI")
                                      <td>Sudah Melakukan Transaksi</td>
                                      @elseif(!empty($dt->bukti_pem) && $dt->metode_pembayaran == "transfer")
                                      <td>Bukti Sudah Di Upload</td>
                                      @else
                                      <td>Belum Melakukan Aktivasi Pembayaran</td>
                                      @endif
                                      <td class="status">{{$dt->status_pembayaran_registrasi}}</td>
                                      <td class="text-center"><a href="{{route('pendaftar.tampil',$dt->id_pendaftar)}}" data-toggle="tooltip" data-placement="top" title="View Detail"><i class="fa fa-eye"></i></a></td>
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
  $(document).ready(function(){
      
    $('table tbody td.status').map(function() {
        if($(this).text() == "SUDAH DI KONFIRMASI"){
            $(this).css("background-color", "green");
        }else{
          $(this).css("background-color", "yellow");
        }
        
    })
  });
  
</script>
@endsection
