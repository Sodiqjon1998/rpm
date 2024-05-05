@extends('frontend.layouts.main')


@section('content')

    <nav class=" navbar-expand-lg navbar-dark" style="border-radius: 7px; width: 50%;">
        <h5 class="display-6 text-center">
            <i class="fa fa-cog fa-spin pb-3" style="font-size:24px"></i> Yuksalish maktabiplatformasi
        </h5>
        <div class="container-fluid">
            <button class="navbar-toggler btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="display: flex; justify-content: space-around; font-size: 22px; ">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{route("dashboard")}}" style="color: grey; margin-left: 20px; border: darkgrey 1px solid; border-radius: 10px;">
                        <i class="fa fa-user-graduate"></i> Super admin
                    </a>
                    <a class="nav-link" href="{{route("teacher")}}" style="color: grey; margin-left: 20px; border: darkgrey 1px solid; border-radius: 10px;">
                        <img src="{{asset('images/staticImages/teacher.png')}}" alt="" width="25px;"> O'qituvchi
                    </a>
                    <a class="nav-link" href="{{route("student")}}" style="color: grey; margin-left: 20px; border: darkgrey 1px solid; border-radius: 10px;">
                        <i class="fa fa-child"></i> O'quvchi
                    </a>
                </div>
            </div>
        </div>
    </nav>

@endsection
