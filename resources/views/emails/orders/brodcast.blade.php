@component('mail::layout')
@slot ('header')
@component('mail::header', ['url' => config('app.url')])
    UNIVERSITAS NURTANIO BANDUNG
@endcomponent
@endslot

<div style="color: rgb(44, 44, 44)">
    <h1>{{strtoupper($get->header)}}</h1>
</div>

<div style="border:gray 2px solid;padding: inherit;border-radius: 15px">
    <div>
        <div>
            <div style="color: rgb(44, 44, 44)">
                <h4>{{$get->isi}}</h4>
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
