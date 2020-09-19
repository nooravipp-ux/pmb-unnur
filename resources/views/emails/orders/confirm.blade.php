@component('mail::layout')
@slot ('header')
@component('mail::header', ['url' => config('app.url')])
    UNIVERSITAS NURTANIO BANDUNG
@endcomponent
@endslot
<div style="border:gray 2px solid;padding: inherit;border-radius: 15px">
    <div style="text-align: center">
        <div>
            <div>
                <h1 style="color: rgb(20, 128, 20);font-size: 18px;text-align: center">"PEMBAYARAN ANDA TELAH DI KONFIRMASI"</h1>
                <p style="text-align: center">- LOGIN UNTUK MENGISI BIODATA -</p>
            </div>
        </div>
    </div>
</div>

@component('mail::button', ['url' => 'www.google.com'])
Login
@endcomponent

@slot ('footer')
@component('mail::footer')
Operator Admin Universitas Nurtanio Bandung
@endcomponent
@endslot
@endcomponent
