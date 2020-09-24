@extends('frame.index')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <strong>
                            <h2>FORM | BIODATA, NO PENDAFTARAN : {{$data_pendaftar->id_pendaftar}}</h2>
                        </strong>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- Smart Wizard -->
                        @if($status_pembayaran == false)
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span style="background-color: lightblue;">
                                    <h2>Silahkan lakukan pembayaran terlebih dahulu</h2>
                                </span>
                            </div>
                        </div>
                        @else
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Step 1<br />
                                            <small>Data Diri</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Step 2<br />
                                            <small>Data Orang Tua/Wali (Ayah)</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Step 3<br />
                                            <small>Data Orang Tua/Wali (Ibu)</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            Step 4<br />
                                            <small>Selesai</small>
                                        </span>
                                    </a>
                                </li>
                            </ul>

                            <form id="form-biodata" class="form-horizontal form-label-left" method="POST"
                                action="{{url('/calon-mahasiswa/form-biodata/simpan-data-biodata')}}">
                                @csrf
                                <div id="step-1">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nama Lengkap <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="nama" class="form-control "
                                                value="{{$data_pendaftar->nama}}">
                                            <input type="hidden" name="id_pendaftar" class="form-control "
                                                value="{{$data_pendaftar->id_pendaftar}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="nik" class="form-control"
                                                value="{{$data_pendaftar->nik}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tempat Lahir <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input class="form-control" type="text" name="tempat_lahir"
                                                value="{{$data_pendaftar->tempat_lahir}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input class="date-picker form-control" type="date" name="tgl_lahir"
                                                value="{{$data_pendaftar->tgl_lahir}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis
                                            Kelamin</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <div class="form-check form-check-inline">
                                                @if($data_pendaftar->jenis_kelamin == "laki-laki")
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="inlineRadio1" value="laki-laki" checked>
                                                <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                                                @else
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="inlineRadio1" value="laki-laki">
                                                <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                                                @endif
                                            </div>
                                            <div class="form-check form-check-inline">
                                                @if($data_pendaftar->jenis_kelamin == "perempuan")
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="inlineRadio2" value="perempuan" checked>
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                @else
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="inlineRadio2" value="perempuan">
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Agama<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="agama" class="form-control " id="agama">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Jalan<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="last-name" name="jalan" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">RT<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="last-name" name="rt" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">RW<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="rw" class="form-control " value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Provinsi<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="prov" class="form-control " id="prov">
                                                <option value="" selected disabled>- Pilih Provinsi -</option>
                                                @foreach($data_provinsi as $value)
                                                <option value="{{$value->id_prov}}">{{$value->provinsi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Kota<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select id="kota" name="kota" class="form-control" >
                                                <option value="" selected disabled>- Pilih Kota -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Kecamatan<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="kecamatan" class="form-control " id="kecamatan">
                                                <option value="" selected disabled>- Pilih Kecamatan -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Kelurahan / Desa<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="ds_kel" class="form-control " value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kode
                                            Pos<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="kode_pos" class="form-control "
                                                value="{{$data_pendaftar->kode_pos}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Jenis Tinggal<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="jns_tinggal" class="form-control " id="jns_tinggal"></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Alat Transportasi<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="id_alat_transportasi" class="form-control " id="id_alat_transportasi"></select>
                                        </div>
                                    </div>                
                                    <div class="form-group row">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No
                                            Telepon</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input class="form-control col" type="text" name="no_telepon"
                                                value="{{$data_pendaftar->no_telepon}}">
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK
                                            Ayah
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" class="form-control" name="nik_ayah"
                                                value="{{$data_pendaftar->nik_ayah}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nama Ayah
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="nama_ayah" class="form-control  "
                                                value="{{$data_pendaftar->nama_ayah}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir Ayah
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input class="date-picker form-control" name="tgl_lahir_ayah" type="date"
                                                value="{{$data_pendaftar->tgl_lahir_ayah}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Ayah
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="pendidikan_ayah" class="form-control latar_pendidikan"></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Pekerjaan Ayah
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="pekerjaan_ayah" class="form-control pekerjaan"></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Penghasilan Ayah
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="penghasilan_ayah" class="form-control penghasilan"></select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div id="step-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK
                                            Ibu <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="nik_ibu" class="form-control  "
                                                value="{{$data_pendaftar->nik_ibu}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Nama Ibu <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="nama_ibu" class="form-control  "
                                                value="{{$data_pendaftar->nama_ibu}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir Ibu
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input class="date-picker form-control" name="tgl_lahir_ibu" type="date"
                                                value="{{$data_pendaftar->tgl_lahir_ibu}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Ibu <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="pendidikan_ibu" class="form-control latar_pendidikan"></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Pekerjaan Ibu <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="pekerjaan_ibu" class="form-control pekerjaan"></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Penghasilan Ibu <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select name="penghasilan_ibu" class="form-control penghasilan"></select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div id="step-4" class="text-center">
                                    <button type="submit" form="form-biodata" class="btn btn-primary">Update</button>

                                </div>
                            </form>
                            @endif
                        </div>
                        <!-- End SmartWizard Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('#prov').change(function(e){
            console.log(e);
            console.log('PROVINSI');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });  
            
        $.ajax({
				type : "GET",
				url:'{{route('get.kota')}}',
				data:{'id_prov':$(this).val()},
				success:function(data){
                    console.log(data);
                        $('#kota').empty();
                        $('#kota').append('<option value=""selected disabled>- Pilih Kota -</option>');

                        $('#kecamatan').empty();
                        $('#kecamatan').append('<option value=""selected disabled>- Pilih Kecamatan -</option>');

                     $.each(data, function (id_kota, kota) {
                            $('#kota').append(new Option(id_kota, kota))
                        })                                        
				}
			});

			});

            $('#kota').change(function(e){
            console.log(e);
          
            
            $.ajax({
                    type : "GET",
                    url:'{{route('get.kecamatan')}}',
                    data:{'id_kota':$(this).val()},
                    success:function(data){
                        console.log(data);
                            $('#kecamatan').empty();
                            $('#kecamatan').append('<option value=""selected disabled>- Pilih Kecamatan -</option>');

                        $.each(data, function (id_kec, kecamatan) {
                                $('#kecamatan').append(new Option(id_kec, kecamatan))
                            })                                        
                    }
                });
                });       
    });
</script>
<script>
$(document).ready(function(){



    $('#agama').select2({
        placeholder: '- Pilih Agama -',
        ajax: {
            url: '{{url('/calon-mahasiswa/get-data-agama')}}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(agama) {
                        return {
                            id: agama.id_agama,
                            text: agama.nm_agama
                        }
                    })
                };
            },
            cache: true
        }
    });
    $('#id_alat_transportasi').select2({
        placeholder: '- Pilih Alat Transportasi -',
        ajax: {
            url: '{{url('/calon-mahasiswa/get-data-alat-transportasi')}}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(transport) {
                        return {
                            id: transport.id_alat_transport,
                            text: transport.nm_alat_transport
                        }
                    })
                };
            },
            cache: true
        }
    });

    // $('#kecamatan').select2({
    //     placeholder: '- Pilih Kode Wilayah -',
    //     ajax: {
    //         url: '{{url('/calon-mahasiswa/get-data-wilayah')}}',
    //         dataType: 'json',
    //         delay: 250,
    //         processResults: function(data) {
    //             return {
    //                 results: $.map(data, function(kd_wilayah) {
    //                     return {
    //                         id: kd_wilayah.id_kec,
    //                         text: kd_wilayah.kecamatan
    //                     }
    //                 })
    //             };
    //         },
    //         cache: true
    //     }
    // });

    $('.latar_pendidikan').select2({
        placeholder: '- Latar Belakang Pendidikan -',
        ajax: {
            url: '{{url('/calon-mahasiswa/get-data-jenjang-pendidikan')}}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(jenj_pend) {
                        return {
                            id: jenj_pend.id_jenj_didik,
                            text: jenj_pend.nm_jenj_didik
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('.pekerjaan').select2({
        placeholder: '- Pekerjaan -',
        ajax: {
            url: '{{url('/calon-mahasiswa/get-data-pekerjaan')}}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(pekerjaan) {
                        return {
                            id: pekerjaan.id_pekerjaan,
                            text: pekerjaan.nm_pekerjaan
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('.penghasilan').select2({
        placeholder: '- Penghasilan Per Bulan -',
        ajax: {
            url: '{{url('/calon-mahasiswa/get-data-penghasilan')}}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(penghasilan) {
                        return {
                            id: penghasilan.id_penghasilan,
                            text: penghasilan.nm_penghasilan
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#jns_tinggal').select2({
        placeholder: '- Pilih Jenis Tinggal -',
        ajax: {
            url: '{{url('/calon-mahasiswa/get-data-jenis_tinggal')}}',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(jns_tinggal) {
                        return {
                            id: jns_tinggal.id_jns_tinggal,
                            text: jns_tinggal.nm_jns_tinggal
                        }
                    })
                };
            },
            cache: true
        }
    });
});

</script>
@endsection