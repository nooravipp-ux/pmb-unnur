@component('mail::layout')
@slot ('header')
@component('mail::header', ['url' => config('app.url')])
    UNIVERSITAS NURTANIO BANDUNG
@endcomponent
@endslot

<div style="border:gray 2px solid;padding: inherit;border-radius: 15px">
    @if ($din->kelulusan == 'LULUS')
        <h2 style="text-align: center">Selamat Anda Dinyatakan "{{$din->kelulusan}}" Dengan Nilai Ujian "<b>{{$din->nilai_ujian}}</b>"</h2>
    @else
        <h2 style="text-align: center">Maaf Anda Dinyatakan "{{$din->kelulusan}}" Dengan Nilai Ujian "<b>{{$din->nilai_ujian}}</b>"</h2>
    @endif
</div>
<hr>
<div>
    @if ($din->kelulusan == 'LULUS')
        <p style="text-align: center">GUNAKAN UNTUK LOGIN SISTEM AKADEMIK</p>
        <h2 style="text-align: center">User name: "{{$din->nim}}"</h2>
        <h2 style="text-align: center">Password: "{{$din->nim}}"</h2>
    @endif
</div>
@if ($din->kelulusan == 'LULUS')
    @component('mail::button', ['url' => 'https://fikiunnur.omahawan.com/admina/login.php'])
    Login
    @endcomponent
@endif



@slot('subcopy')
@component('mail::subcopy')
<div style="color: red">
    <small><sup>*</sup>untuk informasi lebuh lanjut bisa hubungi staff prodi atau datang langsung</small>
</div>
@endcomponent
@endslot


@slot ('footer')
@component('mail::footer')
Operator Admin Universitas Nurtanio Bandung
@endcomponent
@endslot
@endcomponent
