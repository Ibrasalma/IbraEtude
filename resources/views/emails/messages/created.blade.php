@component('mail::message')
# {{ $msg->name }}

-{{ $msg->email }}

@component('mail::panel')
{{ $msg->message }}
@endcomponent

@component('mail::button', ['url' => 'mailto:ibrasalma@alwaysdata.net','color' => 'success'])
Button Text
@endcomponent

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
