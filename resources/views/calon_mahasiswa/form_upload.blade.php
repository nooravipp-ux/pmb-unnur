@extends('frame.index')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Pembayaran Registrasi </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
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
                   
                    <form action="{{ route('upload.bukti') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <span class="section"><h5>Data Calon Mahasiswa</h5></span>
                      <div class="form-group row mb-0" id="d_nama">
                        <input type="hidden" name="hidden_email" id="hidden_email" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="id_pendaftar" id="id_pendaftar" value="">
                        <label for="" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                        <label for="nama" id="nama" class="col-md-4 col-form-label text-md-left"></label>
                    </div>

                    <div class="form-group row mb-0" id="d_email" >
                        <label for="" class="col-md-4 col-form-label text-md-right">Alamat Email</label>
                        <label for="email" id="email" class="col-md-4 col-form-label text-md-left"></label>
                    </div>

                    <div class="form-group row mb-0" id="d_tahun" >
                        <label for="" class="col-md-4 col-form-label text-md-right">Tahun Pendaftaran</label>
                        <label for="tahun" id="tahun" class="col-md-4 col-form-label text-md-left"></label>
                    </div>

                    <div class="form-group row mb-0" id="d_gelombang" >
                        <label for="" class="col-md-4 col-form-label text-md-right">Gelombang</label>
                        <label for="gelombang" id="gelombang" class="col-md-4 col-form-label text-md-left"></label>
                    </div>

                    <div class="form-group row mb-0" id="d_fakultas" >
                        <label for="" class="col-md-4 col-form-label text-md-right">Fakultas</label>
                        <label for="fakultas" id="fakultas" class="col-md-4 col-form-label text-md-left"></label>
                    </div>

                    <div class="form-group row mb-0" id="d_prodi" >
                        <label for="" class="col-md-4 col-form-label text-md-right">Program Studi</label>
                        <label for="prodi" id="prodi" class="col-md-4 col-form-label text-md-left"></label>
                    </div>

                    <div class="form-group row mb-0" id="d_jenjangp" >
                        <label for="" class="col-md-4 col-form-label text-md-right">Jenjang Pendidikan</label>
                        <label for="jenjangp" id="jenjangp" class="col-md-4 col-form-label text-md-left"></label>
                    </div>

                    <div class="form-group row mb-0" id="d_kelas" >
                        <label for="" class="col-md-4 col-form-label text-md-right">Kelas</label>
                        <label for="kelas" id="kelas" class="col-md-4 col-form-label text-md-left"></label>
                    </div>

                    <div class="form-group row mb-0" id="d_biaya" >
                        <label for=""  class="col-md-4 col-form-label text-md-right">Biaya Registrasi</label>
                        <label for="biaya" id="biaya" class="col-md-4 col-form-label text-md-left"></label>
                    </div>
                    
                    <div class="form-group row" id="d_metode" >
                        <label for="metode" class="col-md-4 col-form-label text-md-right">Metode Pembayaran</label>
                        <div class="col-md-6">
                            <select name="metode" id="metode" class="form-control col-md-12">
                                <option value=""selected disabled>Pilih Metode Pembayaran</option>
                                <option value="">Cash</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="d_file" >
                        <label for="metode" class="col-md-4 col-form-label text-md-right">Upload Bukti Pembayaran</label>
                        <div class="col-md-6">
                            <input type="file" name="file" id="file" class="form-control-file error">
                            <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>

                    <span class="section"></span>

                    <div class="form-group row mb-0" id="btn-submit" >
                        <div class="col-md-8 offset-md-4">
                            <button id="btn-submit" type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('script')
<script src="{{ asset('template/vendors/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$( document ).ready(function() {
  //{{ Auth::user()->name }}
  var email = $('#hidden_email').val();
            console.log(email);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });  

            $.ajax({
            method : "GET",
            url:'{{route('get.datacalonmhs')}}',
            data:{'email':email},
            success:function(data){
                console.log(data.nama);

                $("#nama").text(": " +data.nama);
                $("#email").text(": " +data.email);
                $("#tahun").text(": " +data.tahun);
                $("#gelombang").text(": " +data.gelombang);
                $("#fakultas").text(": " +data.nama_fakultas);
                $("#prodi").text(": " +data.nama_prodi);
                $("#jenjangp").text(": " +data.jenis_strata);
                $("#kelas").text(": " +data.nama_kelas);
                $("#biaya").text(": " +data.biaya_registrasi);
                $("#id_pendaftar").val(data.id_pendaftar);
            }
            });
});
</script>
@endsection