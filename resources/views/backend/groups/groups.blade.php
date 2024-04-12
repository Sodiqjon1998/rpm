@php use App\Models\Group; @endphp
@extends('backend.layouts.main')


@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">
                    Guruhlar <span onclick="history.back()" class="btn btn-info btn-sm"><i
                            class="fa fa-arrow-circle-left"></i></span>
                </h4>
                <h1 class="display-6">
                    <a href="{{route('backend.user.show', $teacher_id)}}" class="btn btn-success">
                        <strong>O'qituvchi:👨‍⚖️</strong> {{Group::getTeacher($teacher_id)->name}}
                    </a>
                </h1>


            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="card">
        <div class="card-body bg-dark bg-opacity-10">
            <div class="row">
                @if(count($groups) > 0)
                @foreach($groups as $key => $group)
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="mt-0 font-size-18 mb-1">
                                            <a href="{{route('backend.user.pupils', $group->id)}}">{{$group->name}}</a>
                                        </h5>
                                        <p class="text-muted font-size-14">{{$group->course->subject}}</p>

                                        <ul class="social-links list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a role="button" class="text-reset"
                                                   title="O'quvchilar soni: {{Group::getPupils($group->id)}}"
                                                   data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href="/"
                                                   disabled="disabled"><i
                                                        class="fa fa-users"></i></a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a role="button" class="text-reset"
                                                   title="O'quvchilar soni: {{Group::getPupils($group->id)}}"
                                                   data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href="/"
                                                   disabled="disabled">O'quvchilar soni: {{Group::getPupils($group->id)}}</a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a role="button" class="text-reset"
                                                   title="Yakunlanganlar soni: {{Group::getPupilsFinishedCount($group->id)}}"
                                                   data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href="{{route('backend.user.finished', $group->id)}}"
                                                   disabled="disabled"><i
                                                        class="fa fa-user-alt-slash btn btn-outline-danger"></i></a>
                                            </li>

                                        </ul>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                @endforeach
                @else
                    <p class="alert alert-info">
                        Natija: 0
                    </p>
                @endif
            </div> <!-- end row -->
        </div>
    </div>

@endsection
