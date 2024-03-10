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
                    <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yangi qo'shish</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="card-title">
                                <button class="btn btn-primary btn-sm float-end mt-1" type="submit">
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>
                            @csrf
                            <div class="col-md-6">
                                <label class="mt-1">Rasm</label>
                                <input type="file" class="form-control" id="customFile" name="img">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-1">Quyi sarlavha</label>
                                <input class="form-control" type="text" name="sub_title">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-1">Sarlavha</label>
                                <input class="form-control" type="text" id="example-text-input" name="title">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-1">Status</label>
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option value="1">Faol</option>
                                        <option value="0">No faol</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="mb-1">Matn</label>
                                <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="text"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection