<?php

namespace App\Exports;

use App\Hospital;
use App\Member;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MemberExport implements FromArray, WithHeadings
{
    /**
     * @inheritDoc
     */
    public function array(): array
    {
        return Member::with('city', 'hospitals')->orderBy('first_name')->orderBy('last_name')->get()->map(function (Member $member) {
            return [
                $member->published ? 'YES' : '-',
                $member->paid ? 'YES' : '-',
                $member->presentable_next_payment_at,
                $member->first_name,
                $member->last_name,
                $member->city && $member->city->country ? $member->city->country->title : '-',
                $member->city ? $member->city->title : '-',
                $this->memberHospitals($member),
                $member->presentable_membership_type,
                $member->email,
                $member->practice_email,
                $member->telephone,
                $member->alt_telephone,
                $member->mobile,
                $member->address,
                $member->alt_address,
                $member->id_number,
                implode(', ', $member->interests),
                $member->university,
                $member->hpcsa_year,
                $member->hpcsa_number,
                $member->presentable_practice,
                implode(', ', $member->qualifications),
                $member->created_at,
                $member->updated_at,
            ];
        })->toArray();
    }

    protected function memberHospitals(Member $member): string
    {
        if ($member->hospitals->count()) {

            $hospitals = $member->hospitals->map(function (Hospital $hospital) {
                return $hospital->title;
            })->toArray();

            return implode(', ', $hospitals);

        }

        return '';
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return [
            'Published',
            'Paid up',
            'Next renewal',
            'First name',
            'Last name',
            'Country',
            'City',
            'Hospital',
            'Membership type',
            'Email',
            'Practice email',
            'Telephone',
            'Alternative Telephone',
            'Mobile',
            'Address',
            'Alternative Address',
            'ID Number',
            'Interests',
            'University',
            'HPCSA registration year',
            'HPCSA number',
            'Practice type',
            'Qualifications',
            'Created At',
            'Updated At',
        ];
    }
}
