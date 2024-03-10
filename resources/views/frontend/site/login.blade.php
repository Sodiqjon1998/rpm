@extends('frontend.layouts._blank')

@section('content')
    <div class="account-head" style="background-image:url({{ asset('f/assets/images/background/bg2.jpg') }});">
        <a href="index.html"><img src="{{ asset('f/assets/images/logo-white-2.png') }}" alt=""></a>
    </div>
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">Tizimga kirish</h2>
                <p>Hisobingiz yo'qmi? <a href="register.html">Yangi hisob kiritish</a></p>
            </div>
            <form class="contact-bx" method="POST" action="{{ route('frontend.enter') }}">
                @csrf
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Username</label>
                                <input name="name" type="text" required="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Parol</label>
                                <input name="password" type="password" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group form-forget">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                            </div>
                            <a href="forget-password.html" class="ml-auto">Parolni unutdingizmi?</a>
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
                    </div>
                    <div class="col-lg-12">
                        <h6>Login with Social media</h6>
                        <div class="d-flex">
                            <a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
                            <a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google
                                Plus</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
