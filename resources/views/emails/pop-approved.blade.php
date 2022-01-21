@component('mail::message')
# Your SASMFOS payment has been approved

Your proof of payment for the payment on {{ $member->payment_at->format('d F Y') }} has been approved

@component('mail::button', ['url' => route('members.dashboard')])
Log in to my SASMFOS account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
