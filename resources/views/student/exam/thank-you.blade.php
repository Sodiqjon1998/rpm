@extends('student.layouts.main')

@section('content')

    <div class="container-fluid">
        <h6 class="display-6 text-center">
            {{Auth::user()->name}}
        </h6>
        <a href="{{route('student')}}">
            Bosh sahifa
        </a>
    </div>

@endsection
