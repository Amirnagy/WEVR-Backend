@component('mail::layout')
{{-- Header --}}

@slot('header')
@component('mail::header', ['url' => 'https://college.makkah-tech.com/'])

<img src="{{ asset('assets/logo/logo.jpg') }}" style="height: 100px;width: 100px;>


@endcomponent
@endslot

{{-- Body --}}

<h2>Forgotten your password?</h2>
@slot('subcopy')

@component('mail::subcopy')

<h4>your verification code for wevr app is <h1>{{$pin_code}}</h1></h4>



@endcomponent
@endslot

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
