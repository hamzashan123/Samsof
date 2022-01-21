@component('mail::message')
# Welcome to SASMFOS {{ $member->first_name . ' ' . $member->last_name }}

Your SASMFOS membership has been approved. You can now log into your account where you'll be able to make payment on
your annual SASMFOS fees. Your account won't actually be activated completely until you've made the required payment.

We've generated a new random password for you. Use this password along with your email address to log into your account.
If you want to change your password, you'll be able to do so once you've logged in the first time. We encourage you to
do so as this will help keep your SASMFOS account safe and secure.

Your randomly generated password:

@component('mail::panel')
__username__: {{ $member->email }}<br>
__password__: {{ $password }}
@endcomponent

@component('mail::button', ['url' => route('members.login')])
Log in to my SASMFOS account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
