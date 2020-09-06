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
                <div class="card-header">Pendaftaran Calon Mahasiswa</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('simpan.calonmhs') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telp" class="col-md-4 col-form-label text-md-right">No Handphone</label>
                            <div class="col-md-6">
                                <input id="telp" type="text" class="form-control" name="telp" value="" maxlength="13" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun" class="col-md-4 col-form-label text-md-right">Tahun Masuk</label>
                            <div class="col-md-6">
                                <input id="tahun" type="text" class="form-control" name="tahun" value="" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Fakultas</label>
                            <div class="col-md-6">
                                <select name="fakultas" id="fakultas" class="form-control col-md-12">
                                    <option value=""selected disabled>Pilih Fakultas</option>
                                    @foreach($list_fakultas as $value)
                                    <option value="{{$value->id_fakultas}}">{{$value->nama_fakultas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prodi" class="col-md-4 col-form-label text-md-right">Prodi</label>
                            <div class="col-md-6">
                                <select name="prodi" id="prodi" class="form-control col-md-12">
                                    <option value=""selected disabled>Pilih Jurusan / Program Studi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenjangp" class="col-md-4 col-form-label text-md-right">Jenjang Pendidikan</label>
                            <div class="col-md-6">
                                <select name="jenjangp" id="jenjangp" class="form-control col-md-12">
                                    <option value=""selected disabled>Pilih Jenjang Pendidikan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kelas" class="col-md-4 col-form-label text-md-right">Kelas</label>
                            <div class="col-md-6">
                                <select name="kelas" id="kelas" class="form-control col-md-12">
                                    <option value=""selected disabled>Pilih Kelas</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="biaya_regis" class="col-md-4 col-form-label text-md-right">Biaya Registrasi</label>
                            <div class="col-md-6">
                                <input id="biaya_regis" type="text" class="form-control" name="biaya_regis" value="" readonly>
                                <input id="id_pmb" type="hidden" class="form-control" name="id_pmb" value="">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
                $('#id_pmb').val(data.id_pmb);

            }
            });

           
        });

});


</script>

</body>
</html>

