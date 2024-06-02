@extends('backend.layouts._blank')

@section('content')
    <div class="card" style="background: url({{asset('images/staticImages/backend/bg2.png')}});">
        <div class="card-body">

            <div class="text-center mt-4">
                <div class="mb-3">
                    <a href="index.html" class="auth-logo">
                        <img src="assets/images/logo-dark.png" height="30" class="logo-dark mx-auto" alt="">
                        <img src="assets/images/logo-light.png" height="30" class="logo-light mx-auto" alt="">
                    </a>
                </div>
            </div>

            <h4 class="text-muted text-center font-size-18"><b>Platformaga kirish</b></h4>

            <div class="p-3">
                <form method="POST" class="form-horizontal mt-3" action="{{route('backend.login')}}">
                    @csrf

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" type="text" required="" name="name" placeholder="Foydalanuvchi nomi">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Parol">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="form-label ms-1" for="customCheck1">Meni eslab qol</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Kirish</button>
                        </div>
                    </div>

                    {{-- <div class="form-group mb-0 row mt-2">
                        <div class="col-sm-7 mt-3">
                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your
                                password?</a>
                        </div>
                        <div class="col-sm-5 mt-3">
                            <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an
                                account</a>
                        </div>
                    </div> --}}
                </form>
            </div>
            <!-- end -->
        </div>
        <!-- end cardbody -->
    </div>
@endsection
