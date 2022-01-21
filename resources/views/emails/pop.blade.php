@component('mail::message')
# {{ $member->name }} has uploaded a proof of payment for their SASMFOS membership fees.

@component('mail::panel')
__Upload Date__: {{ now()->format('d F Y H:i') }}<br>
__Payment Date__: {{ $date }}<br>
@endcomponent

@component('mail::button', ['url' => route('admin.members.index', ['search' => $member->email ])])
View Member
@endcomponent

@endcomponent
