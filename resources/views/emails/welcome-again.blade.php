@component('mail::message')
# Introduction

Welcome {{$user->name}}

@component('mail::button', ['url' => '127.0.0.1:8000'])
Proceed to Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
