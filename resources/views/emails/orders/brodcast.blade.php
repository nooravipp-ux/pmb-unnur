@component('mail::layout')
@slot ('header')
@component('mail::header', ['url' => config('app.url')])
    UNIVERSITAS NURTANIO BANDUNG
@endcomponent
@endslot

<div>
    <h2>{{strtoupper($get->header)}}</h2>
</div>

<div style="border:gray 2px solid;padding: inherit;border-radius: 15px">
    <div>
        <div>
            <div>
                {{$get->isi}}
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
