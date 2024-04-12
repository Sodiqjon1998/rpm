@php use App\Models\Group; @endphp
@extends('backend.layouts.main')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">
                   O'quvchilar <span onclick="history.back()" class="btn btn-info btn-sm"><i
                            class="fa fa-arrow-circle-left"></i></span>
                </h4>
                <h1 class="display-6">
                    <strong>Guruh:👨‍⚖️</strong> {{Group::getGroup($group_id)}}
                </h1>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body bg-dark bg-opacity-10">
            <div class="row">
                @if(count($groupItems) > 0)
                @foreach($groupItems as $key => $item)
                    <div class="col-lg-3">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="d-flex align-items-center">
                                    <img class="d-flex me-3 rounded-circle img-thumbnail avatar-lg"
                                         src="{{asset('images/staticImages/defaultAvatar.png')}}"
                                         alt="Generic placeholder image">
                                    <div class="flex-grow-1">
                                        <h5 class="mt-0 font-size-18 mb-1">{{Group::getTeacher($item->student_id)->name}}</h5>
                                        <p class="text-muted font-size-14">{{Group::getTeacher($item->student_id)->phone ?? "Tel:kiritilmagan"}}</p>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                @endforeach
                @else
                    <p class="alert alert-info">
                        <strong>Natija: 0</strong>
                    </p>
                @endif
            </div> <!-- end row -->
        </div>
    </div>


@endsection
