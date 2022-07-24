@extends('front.layouts.master')
@section('title')
    Hamro School | Unverified Account
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h2><span class="theme-cl">Unverified Account</span></h2>
                    </div>
                </div>
            </div>

                <p>Dear {{frontUser('role_id') == \App\Constants\RoleConstant::SCHOOL_ID ? frontUser('school')->name : frontUser('full_name')}} ,</p>
                <br>
                <p>Thank you for registering into <strong>Hamro School.</strong></p>
                <br>
                <p>Your account is under <strong>verification</strong> process. We will email you about your account status. Please stay tuned with us.</p>
        </div>
    </section>
@endsection
