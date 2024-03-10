@extends('teacher.layouts.main')

@section('content')

    <div class="row">
        <div class="col-12" style="padding: 0 !important; margin: 0 !important; text-align:center;">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
                    Viktorinalar
                </h3>
                <ol class="breadcrumb" style="padding: 0; margin:0 0 10px 0;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Viktorinalar</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" style="padding: 0; margin:0;">
        <div class="col-lg-12" style="padding: 0; margin:0;">
            <div class="card">
                <h4 class="card-header">
                    <a href="{{ route('teacher.quiz.create') }}" class="btn btn-success btn-sm" data-bs-toggle="modal"
                       data-bs-target="#addQuizModal">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered table-sm" style="font-size: 14px;">
                            <thead>
                            <tr class="text-center bg-dark" style="color: #FFFFFF">
                                <th width="30" align="center">#</th>
                                <th>Viktorina</th>
                                <th>Vaqti</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach ($quizzes as $key => $quiz)
                                <tr style="padding: 0; margin:0;">
                                    <th scope="row" width="30" align="center"><?= ++$key ?></th>
                                    <td>
                                        <a href="{{route('teacher.question.index', $quiz->id)}}">{{ $quiz->name }}</a>
                                    </td>
                                    <td>{{ $quiz->created_at }}</td>
                                    <td>{{ $quiz->status }}</td>
                                    <td style="width: 140px;">
                                        <a href="{{ route('teacher.quiz.show', $quiz->id) }}"
                                           class="btn btn-success btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('teacher.quiz.edit', $quiz->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form id="deleteForm"
                                              action="{{ route('teacher.quiz.destroy', $quiz->id) }}"
                                              method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addQuizModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addQuiz">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <label for="name">Viktorina</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="one">Status</label>
                                <div class="toggle-border float-center" style="width: 65px;">
                                    <input id="one" type="checkbox" name="status">
                                    <label for="one">
                                        <div class="handle"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
{{--        document.getElementById('deleteForm').addEventListener('submit', function(event) {--}}
{{--                    event.preventDefault();--}}

{{--                    if (confirm('Haqiqatan ham ma\'lumotni o\'chirmoqchimisiz?')) {--}}
{{--                        this.submit();--}}
{{--                    }--}}
{{--                });--}}

        $(document).ready(function(){
             $('#addQuiz').submit(function(e){
                 e.preventDefault();
                 let formData = $(this).serialize();

                 $.ajax({
                    url:"{{route('teacher.quiz.store')}}",
                    type: "POST",
                    data:formData,
                    success:function(data){
                        if(data.success == true){
                            location.reload();
                        }else{
                            alert(data.msg);
                        }
                    }
                 });
            });
        });


    </script>
@stop
