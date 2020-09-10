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
    <link rel="stylesheet" href="{{asset('template/build/css/register.css')}}">
</head>

<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="text-center" style="margin-top: 50px" class="col-md-4">
            <h1 style="color: white; text-shadow: 2px 2px 4px #000000;"><b>FORM PENDAFTARAN MAHASISWA BARU</b></h1>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="container">
        <form id="pmb" action="{{ route('simpan.calonmhs') }}" method="POST">
            {{ csrf_field() }}
            <h3>Pendaftaran Calon Mahasiswa</h3>
            <div class="row">
                <div class="col-md-4">
                    <h5 for="nik">NIK</h5>
                    <input id="nik" type="number" tabindex="1" class="form-control @error('nik') is-invalid @enderror"
                        name="nik" value="" required autocomplete="nik" placeholder="Input NIK" autofocus>

                    @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <h5 for="nama">Nama Lengkap</h5>
                    <input id="nama" type="text" tabindex="2" class="form-control  @error('nama') is-invalid @enderror"
                        name="nama" value="" required placeholder="Nama Lengkap" autofocus>

                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <h5 for="re-password">Masukan No Telepon</h5>
                    <input id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" name="telp"
                        value="" required tabindex="3" autofocus placeholder="Nomer Telepon">

                    @error('telp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5 for="email">Input Email</h5>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" tabindex="4" required autocomplete="email"
                        placeholder="Masukan Email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <h5 for="password">Masukan Password</h5>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" value="" required tabindex="5" placeholder="Input Password"
                        autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <h5 for="re-password">Re-type Password</h5>
                    <input id="password-confirm" type="password" class="form-control" tabindex="6"
                        name="password_confirmation" placeholder="re-type password" required
                        autocomplete="new-password">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5 for="tahun">Tahun Masuk</h5>
                    <input id="tahun" tabindex="7" type="text" class="form-control" name="tahun" value="" readonly>
                </div>
                <div class="col-md-3">
                    <h5 for="fakultas">Pilih Fakultas</h5>
                    <select name="fakultas" id="fakultas" tabindex="8" class="form-control col-md-12">
                        <option value=""selected disabled>Pilih Fakultas</option>
                        @foreach($list_fakultas as $value)
                        <option value="{{$value->id_fakultas}}">{{$value->nama_fakultas}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <h5 for="prodi">Pilih Prodi</h5>
                    <select name="prodi" id="prodi" tabindex="9" class="form-control col-md-12">
                        <option value=""selected disabled>Pilih Jurusan / Program Studi</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <h5 for="prodi">Jenjang Pendidikan</h5>
                    <select name="jenjangp" id="jenjangp" tabindex="11" class="form-control col-md-12">
                        <option value=""selected disabled>Pilih Jenjang Pendidikan</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <h5 for="kelas">Kelas</h5>
                    <select name="kelas" id="kelas" tabindex="10" class="form-control col-md-12">
                        <option value=""selected disabled>Pilih Kelas</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <h5 for="prodi">Biaya Registrasi</h5>
                    <input id="biaya_regis" type="text" tabindex="12" class="form-control col-md-12" name="biaya_regis" value="" readonly>
                </div>
                <div class="col-md-3"></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <button name="submit" id="pmb-submit" type="submit" class="btn btn-primary">
                        Daftar Calon Mahasiswa
                    </button>
                </div>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
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

                            $('#kelas').empty();
                            $('#kelas').append('<option value=""selected disabled>Pilih Kelas</option>');

                            $('#jenjangp').empty();
                            $('#jenjangp').append('<option value=""selected disabled>Pilih Jenjang Pendidikan</option>');

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
                            $('#kelas').empty();
                            $('#kelas').append('<option value=""selected disabled>Pilih Kelas</option>');
                            $('#jenjangp').empty();
                            $('#jenjangp').append('<option value=""selected disabled>Pilih Jenjang Pendidikan</option>');
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
