@extends('backend.layouts.main')


@section('content')
    <h1 class="display-6 text-center">
        Xush kelbisiz super admin bo'limiga! <br>
        {{Auth::user()->name}}
    </h1>
@endsection