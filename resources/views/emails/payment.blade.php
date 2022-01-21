@component('mail::message')
# {{ $member->name }} has made a payment for their SASMFOS membership fees.

@component('mail::panel')
__Transaction Date__: {{ $member->payments()->latest()->first()->created_at->format('d F Y H:i') }}
@endcomponent

@component('mail::button', ['url' => route('admin.members.edit', [$member])])
Edit Member
@endcomponent

@endcomponent
