@extends('frontend.layouts._blank')


@section('content')
    <div class="account-head" style="background-image:url({{ asset('f/assets/images/background/bg2.jpg') }});">
        <a href="index.html"><img src="{{ asset('f/assets/images/logo-white-2.png') }}" alt=""></a>
    </div>
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">Ro'yxatdan o'tish</h2>
                <p>Ro'yxatdan o'tganmisiz? <a href="login.html"> Bu yerga bosing</a></p>
            </div>
            <form class="contact-bx" method="POST" action="{{ route('frontend.store') }}">
                @csrf
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Ismingiz</label>
                                <input name="name" type="text" required="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Email</label>
                                <input name="email" type="email" required="" class="form-control">
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
                    <div class="col-lg-12 m-b30">
                        <button name="submit" type="submit" value="Submit" class="btn button-md">Yuborish</button>
                    </div>
                    <div class="col-lg-12">
                        <h6>Sign Up with Social media</h6>
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
