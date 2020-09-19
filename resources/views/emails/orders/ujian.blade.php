@component('mail::layout')
@slot ('header')
@component('mail::header', ['url' => config('app.url')])
    UNIVERSITAS NURTANIO BANDUNG
@endcomponent
@endslot

<div style="color: rgb(44, 44, 44)">
    <h1>PEMBERITAHUAN UJIAN</h1>
</div>

<div style="border:gray 2px solid;padding: inherit;border-radius: 15px">
    <div>
        <div>
            <div style="color: rgb(44, 44, 44)">
                <h4>Ujian Untuk Gelombang {{$ujian->gelombang_ujian}} Akan Di Adakan Pada Hari {{\Carbon\Carbon::parse($ujian->tanggal_ujian)->translatedFormat('l,d F Y')}} Pukul {{\Carbon\Carbon::parse($ujian->tanggal_ujian)->translatedFormat('H:i')}}.</h4>
                <small><b>Terima Kasih,Staff Informatika Universitas Nurtanio</b></small>
            </div>
        </div>
    </div>
</div>


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
