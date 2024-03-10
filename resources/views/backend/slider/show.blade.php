@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3>
                    {{$slider->id}}
                </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$slider->id}}</li>
                </ol>
            </nav>
        </div>
       <!-- end page title -->
    <div class="card">
        <div class="card-header">
            <a href="{{route('slider.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
            <a href="{{route('slider.edit', $slider->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
            <form id="deleteForm" action="{{ route('slider.destroy', $slider->id) }}"
                  method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Id</td>
                    <td>{{$slider->id}}</td>
                </tr>
                <tr>
                    <td>Sarlavha</td>
                    <td><?= $slider->title ?></td>
                </tr>
                <tr>
                    <td>Quyi sarlavha</td>
                    <td><?= $slider->sub_title ?></td>
                </tr>
                <tr>
                    <td>Rasmlar</td>
                    <td>
                        <img src="{{asset($slider->img)}}" width="150" height="80" alt="{{asset($slider->img)}}">
                    </td>
                </tr>
                <tr>
                    <td>Matn</td>
                    <td><?= $slider->text ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?= $slider->status ?></td>
                </tr>
                <tr>
                    <td>Kiritilgan vaqti</td>
                    <td>{{$slider->created_at}}</td>
                </tr>
                <tr>
                    <td>Tahrirlangan vaqti</td>
                    <td>{{$slider->updated_at}}</td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('deleteForm').addEventListener('submit', function (event) {
            event.preventDefault();

            if (confirm('Haqiqatan ham ma\'lumotni o\'chirmoqchimisiz?')) {
                this.submit();
            }
        });
    </script>

@endsection