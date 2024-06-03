@extends('teacher.layouts.main')


@section('content')
<h1 class="display-6 text-center">
    Xush kelbisiz o'qtuvchi bo'limiga! <br>
    {{Auth::user()->name}}
</h1>
@endsection