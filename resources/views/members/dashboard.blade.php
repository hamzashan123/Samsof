@extends('layouts.app', ['active' => 'dashboard'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <div class="content pb-5">
                    <h2 class="has-text-primary">Welcome to SASMFOS Members Area.</h2>
                    <p>
                        From here you can ensure that your contact details are kept up-to-date and make payments on
                        your SASMFOS account.
                    </p>
                    
                    @if (auth('member')->user()->payable)
                        <div class="pt-2 pb-2">
                            <b-message title="Payment due">
                                Your annual SASMFOS membership fees are now payable. Payment of your fees today will ensure your membership is valid until the next financial year. Please contact treasurer@sasmfos.org if you are unsure of your membership account status.
                                <div class="pt-1">
                                    <a href="{{ route('members.payments.index') }}" class="button is-primary">
                                        Pay now
                                    </a>
                                </div>
                            </b-message>
                        </div>
                    @endif

                    <div>
                        @if (auth('member')->user()->published)
                            <a href="{{ route('members.account.edit') }}" class="button is-primary">
                                Update your account and pay now
                            </a>   
                        @endif
                    </div>
                    <hr />

                    <h3 class="has-text-primary pt-0 mt-0">Latest News</h3>
                    <div>
                        <a href="https://mailchi.mp/stone.consulting/sasmfos-announcement-membership-for-2021?e=6bd86995ad" target="_blank">All SASMFOS membership fees are now payable for 2021</a>
                    </div>
                    <div>
                        <a href="/pdfs/2021-sasmfos-first-announcement.pdf" target="_blank">2021 SASMFOS Virtual Congress</a>
                    </div>
                    <hr />

                    <h3 class="has-text-primary pt-0 mt-0">
                        Important information
                    </h3>
                    <div>
                        <a href="/pdfs/sasmfos-constitution-2007-oct.pdf" target="_blank">SASMFOS Constitution</a>
                    </div>

                    @if ($announcements->count() > 0)
                        <hr />
                        <h3 class="has-text-primary pt-0 mt-0">Documents</h3>
                        <div>
                            @foreach ($announcements as $announcement)
                                <div>
                                    <a href="{{ $announcement->link }}" target="_blank">{{ $announcement->title }}</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
@stop
