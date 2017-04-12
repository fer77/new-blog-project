@component('mail::message')
# Introduction

Thanks again for registering.

@component('mail::panel', ['url' => ''])
I'm a smart, strong, sensual woman.
@endcomponent

@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
