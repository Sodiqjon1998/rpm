@extends('teacher.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3>
                    {{$quiz->id}}
                </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.quiz.index') }}">Viktorinalar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$quiz->id}}</li>
                </ol>
            </nav>
        </div>
        <!-- end page title -->
        <div class="card">
            <div class="card-header ">
                <a href="{{ route('teacher.quiz.create') }}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i>
                </a>
                <a href="{{ route('teacher.quiz.edit', $quiz->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pen"></i>
                </a>
                <form id="deleteForm" action="{{ route('teacher.quiz.destroy', $quiz->id) }}" method="POST"
                      style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return myFunction()" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Id</td>
                        <td>{{$quiz->id}}</td>
                    </tr>
                    <tr>
                        <td>Sarlavha</td>
                        <td><?= $quiz->name ?></td>
                    </tr>

                    <tr>
                        <td>O'qituvchi</td>
                        <td><?= $quiz->teacher->name ?></td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td><?= $quiz->status ?></td>
                    </tr>
                    <tr>
                        <td>Kiritilgan vaqti</td>
                        <td>{{$quiz->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Tahrirlangan vaqti</td>
                        <td>{{$quiz->updated_at}}</td>
                    </tr>
                </table>
            </div>
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
