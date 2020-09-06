<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Aktivasi Calon Mahasiswa</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="id_pendaftar" class="col-md-4 col-form-label text-md-right">ID Pendaftar</label>
                            <div class="col-md-6">
                                <input id="id_pendaftar" type="text" class="form-control" name="id_pendaftar" value="" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="button" name="btn-cari" id="btn-cari" value="Cari..." class="btn btn-primary">
                            </div>
                        </div>
                        <br>

                        <div class="form-group row mb-0" id="d_nama">
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
                                <input type="file" name="bukti" id="bukti" class="form-control-file">
                            </div>
                        </div>

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
</main>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
   //$('#biaya').text(": " +"awodkoawkdowa");
   $("#d_nama").hide();
   $("#d_email").hide();
   $("#d_tahun").hide();
   $("#d_gelombang").hide();
   $("#d_fakultas").hide();
   $("#d_prodi").hide();
   $("#d_jenjangp").hide();
   $("#d_kelas").hide();
   $("#d_biaya").hide();
   $("#d_metode").hide();
   $("#d_file").hide();
   $("#btn-submit").hide();

    $("#btn-cari").click(function() {
        //$("#nama").text(": " +"awodkoawkdowa");

            var id_pendaftar = $('#id_pendaftar').val();
            console.log(id_pendaftar);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });  

            $.ajax({
            method : "GET",
            url:'{{route('get.datacalonmhs')}}',
            data:{'id_pendaftar':id_pendaftar},
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
            }
            });
    
        $("#d_nama").show();
        $("#d_email").show();
        $("#d_tahun").show();
        $("#d_gelombang").show();
        $("#d_fakultas").show();
        $("#d_prodi").show();
        $("#d_jenjangp").show();
        $("#d_kelas").show();
        $("#d_biaya").show();
        $("#d_metode").show();
        $("#d_file").show();
        $("#btn-submit").show();
        
    });

});
</script>

</body>
</html>

