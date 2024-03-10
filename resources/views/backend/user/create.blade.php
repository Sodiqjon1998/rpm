@php use App\Models\User; @endphp
@extends('backend.layouts.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3>
                    Yangi qo'shish
                </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backend.user.index') }}">Foydalanuchilar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yangi qo'shish</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('backend.user.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="card-title">
                                <button class="btn btn-primary btn-sm float-end mt-1" type="submit">
                                    👨‍⚖️ <i class="fa fa-save"></i>
                                </button>
                            </div>
                            @csrf
                            <div class="col-md-6">
                                <label class="mt-1">Rasm</label>
                                <input type="file" class="form-control" id="customFile" name="img">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-1">Ism</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-1">Email</label>
                                <input class="form-control" type="text" id="example-text-input" name="email">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-1">Telefon</label>
                                <input class="form-control" type="tel" id="example-text-input" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-1">Turi</label>
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Default select example" name="user_type">
                                        @foreach(User::getTypes() as $key => $type)
                                            <option value="{{$key  }}">{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
