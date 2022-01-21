@extends('layouts.app', ['active' => 'payments'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="content">
                    <h2 class="has-text-primary">{{ $member->name }} Payments</h2>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
                {{-- @dd(new DateTime('first day of January ' . date('Y'))->addYear()); --}}
                @if (session()->has('success'))
                    <b-message title="Proof of payment submitted" type="is-success">
                        <p>
                            <strong>
                                {{ session()->get('success') }}
                            </strong>
                        </p>
                    </b-message>
                @else
                    @if ($member->payable)
                        <b-message title="Payment due">
                            <p>
                                Your annual SASMFOS membership fees are now payable. Payment of your fees today will ensure your membership is valid until the next financial year. Please contact treasurer@sasmfos.org if you are unsure of your membership account status.
                            </p>

                            <p class="mt-1">
                                Please pay your annual membership fees into the following bank account and upload your Proof of Payment below.
                            </p>

                            <table class="table is-fullwidth mt-2">
                                <tr>
                                    <td><strong>Account name:</strong></td>
                                    <td>The SASMFOS</td>
                                </tr>
                                <tr>
                                    <td><strong>Bank:</strong></td>
                                    <td>Investec Bank Limited</td>
                                </tr>
                                <tr>
                                    <td><strong>Branch:</strong></td>
                                    <td>100 Grayston Drive</td>
                                </tr>
                                <tr>
                                    <td><strong>Branch code:</strong></td>
                                    <td>58 01 05</td>
                                </tr>
                                <tr>
                                    <td><strong>Account number:</strong></td>
                                    <td>10012423956</td>
                                </tr>
                            </table>
                            @if (!session()->has('success'))
                                <form action="{{ route('members.submit.pop') }}" method="post">
                                    @method('put')
                                    @csrf
                                    <pop-uploader :member="{{ $member }}" date="{{ $date }}"></pop-uploader>
                                </form>
                            @endif
                            
                            
                        </b-message>
                    @else
                        <b-message title="All paid up" type="is-success">
                            Thank you for your payment received. Your next SASMFOS membership fee will be payable in the new financial year. We will notify you closer to the time.
                        </b-message>
                        <div class="pt-2 pb-2">
                            <div class="">
                                @if ($member->has_pop)
                                    <div class="">
                                        <a href="{{ route('members.download.pop') }}" class="button is-primary is-fullwidth">
                                            View your most recent proof of payment submitted
                                        </a>
                                    </div>
                                @endif
                                @if ($member->has_certificate)
                                    <div class="pt-1">
                                        <a href="{{ route('members.download.certificate') }}" class="button is-primary is-fullwidth">
                                            View your Membership Certificate
                                        </a>
                                    </div>
                                @endif
                                @if ($member->has_voucher)
                                    <div class="pt-1">
                                        <a href="{{ route('members.download.voucher') }}" class="button is-primary is-fullwidth">
                                            View your AO CMF Voucher
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @endif
            </div>
            <div class="column">
                <div class="content">
                    <p>
                        <strong>
                            The SASMFOS membership fee for 2021 includes membership fees for SASMFOS, FOSAS and AOCMF.
                        </strong>
                    </p>
                    <p>
                        The annual full membership fee is <strong>R3130.45</strong>.
                    </p>
                    <p>
                        This includes AOCMF fee of R1066.57 and the SASMOS fee of R2063.88 - a saving from the previous
                        total fee of R3620.50 which consisted of R1815.00 SAPPF fee and R1815.00 SASMFOS fee.
                    </p>
                    <p>
                        All members over the age of 65 and have their membership in Good Standing qualify to be
                        registered as Life Members, please contact us directly to assist with the registration process.
                    </p>
                    <p>
                        If you registered and paid your SASMFOS membership fees for 2020, your membership fees due for
                        2021 have been waived until January 2022.
                    </p>
                    <p>
                        For more information or to confirm your membership status, please email
                        <a href="mailto:treasurer@sasmfos.org">treasurer@sasmfos.org</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
<script>
    import PopUploader from "../../js/components/PopUploader";
    export default {
        components: {PopUploader}
    }
</script>
