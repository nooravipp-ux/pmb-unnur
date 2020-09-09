@component('mail::layout')
@slot ('header')
@component('mail::header', ['url' => config('app.url')])
    UNIVERSITAS NURTANIO BANDUNG
@endcomponent
@endslot

<div>
    <h3>SELAMAT ANDA TELAH MELAKUKAN REGRISTRASI DENGAN DATA SEBAGAI BERIKUT:</h3>
</div>

<div style="border:gray 2px solid;padding: inherit;border-radius: 15px">
    <div>
        <div>
            <div>
                <h3>NAMA:&ensp;&ensp;{{strtoupper($get->name)}}</h3>
                <h3>FAKULTAS:&ensp;&ensp;{{strtoupper($fak->nama_fakultas)}}</h3>
                <h3>PRODI:&ensp;&ensp;{{strtoupper($pro->nama_prodi)}}</h3>
            </div>
        </div>
    </div>
</div>
@component('mail::button', ['url' => 'www.google.com'])
Login
@endcomponent
<div style="color: red">
    <small><sup>*</sup>Harap Ingat Password dan Email Saat Mendaftar dan Jangan Beri Tahu Orang Lain Tentang Password Anda</small>
</div>


@slot('subcopy')
@component('mail::subcopy')
<div>
    <p>Segera Melakukan Pembayaran Agar Dapat Mengikuti Ujian Online Kami</p>
</div>
@endcomponent
@endslot


@slot ('footer')
@component('mail::footer')
AKSFASKFLSANFLSAINFLSAINFLASNFLSANFLASNFLSANFLSANFALSIN
@endcomponent
@endslot
@endcomponent
