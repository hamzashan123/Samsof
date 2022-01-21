<?php

namespace App\Presenters;

trait MemberPresenter
{
    public function getPresentableLastLoginAtAttribute()
    {
        return $this->last_login_at ? $this->last_login_at->format('d F Y h:i a') : '-';
    }

    public function getPresentableBirthAttribute()
    {
        return $this->birth ? $this->birth->format('d F Y h:i a') : '-';
    }

    public function getPresentablePracticeAttribute()
    {
        switch ($this->practice) {
            case 'full':
                return 'Full-time private practice';
            case 'academic':
                return 'Full-time academic';
            case 'part':
                return 'Private with part-time academic';
            default:
                return 'None';
        }
    }

    public function getPresentableMembershipTypeAttribute()
    {
        switch($this->membership_type) {
            case 'affiliate':
                return 'Affiliate Membership';
            case 'associate':
                return 'Associate Membership';
            case 'student':
                return 'Student Membership';
            default:
                return 'Full Membership';
        }
    }

    public function getPresentablePaymentAtAttribute()
    {
        return $this->payment_at ? $this->payment_at->format('Y-m-d H:i:s') : null;
    }

    public function getPresentableNextPaymentAtAttribute()
    {
        return $this->next_payment_at ? $this->next_payment_at->format('d F Y') : '-';
    }

    public function getPresentablePopUploadedAtAttribute()
    {
        return $this->pop_uploaded_at ? $this->pop_uploaded_at->format('d F Y H:i') : '-';
    }
}
