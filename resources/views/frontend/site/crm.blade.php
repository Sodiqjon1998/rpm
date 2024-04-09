@extends('frontend.layouts.main')

@section('content')

    <div class="card" style="width: 80%">
        <div class="card-header text-center">
            Yuksalish CRM <i class="fa fa-puzzle-piece"></i> <i class='fa fa-spin fa-cog mr-2'></i>(in progress)
        </div>
        <div class="card-body bg-success">
            <ul style="list-style: none; display: flex; -webkit-justify-content: space-around">
                <li>
                    <a href="{{route("dashboard")}}" class="btn btn-info"><i class="fa fa-user-secret"></i> Super admin </a>
                </li>
                <li>
                    <a href="{{route("teacher")}}" class="btn btn-primary"><i class="fa fa-chalkboard-teacher"></i> Teacher </a>
                </li>
                <li>
                    <a href="" class="btn btn-primary"><i class="fa fa-user-friends"></i> Pupils </a>
                </li>
            </ul>
        </div>
    </div>

@endsection
