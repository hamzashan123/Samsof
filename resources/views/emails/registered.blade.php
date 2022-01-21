@component('mail::message')
# {{ $member->name }} has registered with SASMFOS

The following details have been submitted:

@component('mail::panel')
__First Name:__ {{ $member->first_name }}<br>
__Last Name:__ {{ $member->last_name }}<br>
__Membership Type:__ {{ $member->presentable_membership_type }}<br>
__Email Address:__ {{ $member->email }}<br>
__Alternate Email Address:__ {{ $member->alt_email }}<br>
__Telephone Number:__ {{ $member->telephone }}<br>
__Mobile Phone Number:__ {{ $member->mobile }}<br>
__Fax Number:__ {{ $member->fax }}<br>
__Physical Address:__ {{ $member->physical_address }}<br>
__Postal Address:__ {{ $member->postal_address }}<br>
__Date of Birth:__ {{ $member->presentable_birth }}<br>
__University:__ {{ $member->university }}<br>
__HPCSA Registration Year:__ {{ $member->hpcsa_year }}<br>
__Practise:__ {{ $member->presentable_practice }}<br>
@endcomponent

__Qualifications:__

@component('mail::panel')
@foreach ($member->qualifications as $qualification)
- {{ $qualification }}
@endforeach
@endcomponent

__Interests:__

@component('mail::panel')
@foreach ($member->interests as $interests)
- {{ $interests }}
@endforeach
@endcomponent

__Hospitals:__

@component('mail::panel')
@foreach ($member->hospitals as $hospital)
__Hospital/Practise:__ {{ $hospital->title }}<br>
__City:__ {{ optional($hospital->city)->title ?? '-' }}<br>
---
@endforeach
@endcomponent

Please ensure that this data is correct before approving. Once approved, {{ $member->name }} will be prompted for
payment of their annual SASMFOS fees.

@component('mail::button', ['url' => $approvalUrl])
Approve Member
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
