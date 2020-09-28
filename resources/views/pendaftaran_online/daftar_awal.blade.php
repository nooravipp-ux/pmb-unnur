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
    <style>
        body{
            min-height: 100vh;
            /* background: linear-gradient(to bottom, rgb(0 123 255 / 21%), #007bffde); */
            background-size: cover;
        }
        .bg {
        background-image: url("{{ asset('img/ty.jpg') }}"), linear-gradient(to bottom, rgb(0 123 255 / 21%), #007bffde);
        min-height: 100vh;
        /* Full height */
        height: 100%;
        width: 100%;
        background-position: center;
        background-size: cover;
        }
        .gradient{
            min-height: 100vh;
            background: linear-gradient(to bottom, rgb(0 123 255 / 21%), #007bffde);
        }
    </style>
</head>
<body>
<div class="bg">
    <div class="gradient">
        <div id="app">
        <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-info mb-3">
                        <div class="card-header text-white bg-info text-center">FORM REGISTRASI</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('simpan.calonmhs') }}">
                                @csrf
                                <p><b>| Data Pribadi</b></p>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input id="nama" type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required  autofocus placeholder="Nama Lengkap">

                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik"  autofocus placeholder="NIK">

                                        @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}"  required  autofocus placeholder="No Telephone">

                                        @error('telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <p><b>| Akun PMB</b></p>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Alamat E-Mail">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        &nbsp;
                                        <input type="checkbox" onclick="showPW()"> Show Password
                                    </div>
                                    <div class="form-group col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <p><b>| Fakultas</b></p>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <select name="fakultas" id="fakultas" class="form-control col-md-12">
                                                <option value=""selected disabled>Pilih Fakultas</option>
                                                @foreach($list_fakultas as $value)
                                                <option value="{{$value->id_fakultas}}">{{$value->nama_fakultas}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                            <select name="prodi" id="prodi" class="form-control col-md-12">
                                                <option value=""selected disabled>Pilih Jurusan / Program Studi</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <select name="jenjangp" id="jenjangp" class="form-control col-md-12">
                                            <option value=""selected disabled>Pilih Jenjang Pendidikan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="kelas" id="kelas" class="form-control col-md-12">
                                            <option value=""selected disabled>Pilih Kelas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input id="tahun" type="text" class="form-control" name="tahun" value="" readonly>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <input id="biaya_regis" type="text" class="form-control" name="biaya_regis" value="" readonly placeholder="Biaya Registrasi">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success btn-md">
                                    Daftar
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-primary btn-md">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

function showPW() {
        var x = document.getElementById("password");
        var y = document.getElementById("password-confirm");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }

$( document ).ready(function() {
    var d = new Date();
    var n = d.getFullYear();
    // var d = new Date();
    // var strDate = d.getFullYear().toString() + "-" + ( '0' + (d.getMonth()+1) ).slice(-2).toString() + "-" + ( '0' + d.getDate() ).slice(-2).toString();
    $('#tahun').val(n);

    $('#fakultas').change(function(e){
            console.log(e);
            var id_fakultas = $(this).val();
            console.log(id_fakultas);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
				type : "GET",
				url:'{{route('get.prodi')}}',
				data:{'id_fakultas':id_fakultas},
				success:function(data){
                    console.log(data);
                    $('#prodi').empty();
                        $('#prodi').append('<option value=""selected disabled>Pilih Jurusan / Program Studi</option>');

                        $('#jenjangp').empty();
                        $('#jenjangp').append('<option value=""selected disabled>Pilih Jenjang Pendidikan</option>');

                        $('#kelas').empty();
                        $('#kelas').append('<option value=""selected disabled>Pilih Kelas</option>');
                        $('#biaya_regis').val("");
                        $('#id_pmb').val("");
                    for(var i = 0; i < data.length; i++) {
                        var opt = '<option value="'+ data[i].id_prodi +'">'+ data[i].nama_prodi +'</option>';
                        $('#prodi').append(opt);
                    }

				}
			});

			});

            $('#prodi').on('change', function(e){
            console.log(e);
            var id_prodi = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                    type : "GET",
                    url:'{{route('get.strata')}}',
                    data:{'id_prodi':id_prodi},
                    success:function(data){
                        console.log(data);
                        $('#jenjangp').empty();
                        $('#jenjangp').append('<option value=""selected disabled>Pilih Jenjang Pendidikan</option>');
                        $('#kelas').empty();
                        $('#kelas').append('<option value=""selected disabled>Pilih Kelas</option>');
                        $('#biaya_regis').val("");
                        $('#id_pmb').val("");
                        for(var i = 0; i < data.length; i++) {
                            var opt = '<option value="'+ data[i].id_strata +'">'+ data[i].jenis_strata +'</option>';
                            $('#jenjangp').append(opt);
                        }

                    }
                });
            });

            $('#jenjangp').on('change', function(e){
            console.log(e);
            var id_strata = $(this).val();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                    type : "GET",
                    url:'{{route('get.kelas')}}',
                    data:{'id_strata':id_strata},
                    success:function(data){
                        console.log(data);
                        $('#kelas').empty();
                        $('#kelas').append('<option value=""selected disabled>Pilih Kelas</option>');
                        $('#biaya_regis').val("");
                        $('#id_pmb').val("");
                        for(var i = 0; i < data.length; i++) {
                            var opt = '<option value="'+ data[i].id_kelas +'">'+ data[i].nama_kelas +'</option>';
                            $('#kelas').append(opt);
                        }

                    }
                });
        });

        $('#kelas').on('change', function(e){
            var id_fakultas = $('#fakultas').val();
            var id_strata = $('#jenjangp').val();
            var id_kelas = $('#kelas').val();

            $.ajax({
            method : "GET",
            url:'{{route('get.biaya')}}',
            data:{'id_fakultas':id_fakultas,'id_strata':id_strata,'id_kelas':id_kelas},
            success:function(data){
                console.log("biaya");
                console.log(data.biaya_registrasi);

                $('#biaya_regis').val(data.biaya_registrasi);
                //$('#id_pmb').val(data.id_pmb);

            }
            });

        });

});


</script>

</body>
</html>
