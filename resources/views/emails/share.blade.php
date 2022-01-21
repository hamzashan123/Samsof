@component('mail::message')
# {{ $share->name }} shared a Media item from the SASMFOS Website

@component('mail::button', ['url' => $share->link])
View Media Item
@endcomponent

@endcomponent
