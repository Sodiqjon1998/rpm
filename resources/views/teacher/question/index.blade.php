@extends('teacher.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12" style="padding: 0 !important; margin: 0 !important; text-align:center;">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
                    Savollar
                </h3>
                <ol class="breadcrumb" style="padding: 0; margin:0 0 10px 0;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teacher.quiz.index') }}">Viktorinalar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Savollar</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" style="padding: 0; margin:0;">
        <div class="col-lg-12" style="padding: 0; margin:0;">
            <div class="card">
                <h4 class="card-header">
                    <a href="{{ route('teacher.question.create') }}" class="btn btn-success btn-sm" data-bs-toggle="modal"
                        data-bs-target="#addQuestionModal">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered table-sm" style="font-size: 14px;">
                            <thead>
                                <tr class="text-center bg-dark" style="color: #FFFFFF">
                                    <th width="30" align="center">#</th>
                                    <th>Savol</th>
                                    <th>Belgilangan kuni</th>
                                    <th>Belgilangan soati</th>
                                    <th>Urunishlar soni</th>
                                    <th>Vaqti</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if (count($questions) > 0)

                                    @foreach ($questions as $key => $question)
                                        <tr style="padding: 0; margin:0;">
                                            <th scope="row" width="30" align="center"><?= ++$key ?></th>
                                            <td>{{ $question->name }}</td>
                                            <td>{{ $question->date }}</td>
                                            <td>{{ $question->time }}</td>
                                            <td>{{ $question->attempt }} Time</td>
                                            <td>{{ $question->created_at }}</td>
                                            <td style="width: 180px;">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#addQNAModal"
                                                    class="btn btn-outline-info btn-sm addQuestionItems"
                                                    data-id="{{ $question->id }}"> Add
                                                    <i class="fa fa-question-circle"></i>
                                                </a>
                                                <a href="{{ route('teacher.question.show', $question->id) }}"
                                                    class="btn btn-success btn-sm showButton" data-bs-toggle="modal"
                                                    data-bs-target="#showQuestionModal" data-id="{{ $question->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('teacher.question.edit', $question->id) }}"
                                                    class="btn btn-primary btn-sm editButton" data-bs-toggle="modal"
                                                    data-bs-target="#editQuestionModal" data-id="{{ $question->id }}">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form id="deleteForm"
                                                    action="{{ route('teacher.question.destroy', $question->id) }}"
                                                    method="POST" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm questionDelete"
                                                        data-id="{{ $question->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">
                                            Natijalar topilmadi!
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addQuestionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addQuestion">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz_id }}" id="">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Savol</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="name">Vaqti</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="time">Saot</label>
                                <input type="time" name="time" id="time" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="attempt">Urunishlar soni</label>
                                <input type="number" name="attempt" id="attempt" class="form-control" required>
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

    {{-- EDIT DATA --}}
    <div class="modal fade" id="editQuestionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editQuestion">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz_id }}" id="edit_quiz_id">
                        <input type="hidden" name="question_id" id="edit_question_id">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Savol</label>
                                <input type="text" name="name" id="edit_name" min="{{ date('Y-m-d') }}"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="name">Vaqti</label>
                                <input type="date" name="date" id="edit_date" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="time">Saot</label>
                                <input type="time" name="time" id="edit_time" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="attempt">Urunishlar soni</label>
                                <input type="number" name="attempt" id="edit_attempt" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                        <button type="submit" class="btn btn-primary">Tahrirlash</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- SHOW ANSWER --}}
    <div class="modal fade" id="showQuestionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Question show</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-hover table-sm" id="showQuestionTable">

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                    <button type="submit" class="btn btn-primary">Tahrirlash</button>
                </div>
            </div>
        </div>
    </div>

    <!-- QNA Modal -->
    <div class="modal fade" id="addQNAModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addQNA">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Savol qo'shish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="question_id" id="questionId">

                        <input type="search" name="search" id="search" class="form-control">
                        <br><br>

                        {{--                            <select class="selectpicker" multiple data-live-search="true" name="cat[]"> --}}
                        {{--                                <option value="php">PHP</option> --}}
                        {{--                                <option value="react">React</option> --}}
                        {{--                                <option value="jquery">JQuery</option> --}}
                        {{--                                <option value="javascript">Javascript</option> --}}
                        {{--                                <option value="angular">Angular</option> --}}
                        {{--                                <option value="vue">Vue</option> --}}
                        {{--                            </select> --}}
                        <table class="table table-bordered table-striped" id="questionItemsTable">
                            <thead>
                                <tr>
                                    <th width="20px">Select</th>
                                    <th>Question</th>
                                </tr>
                            </thead>
                            <tbody class="addBody">

                            </tbody>
                        </table>
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
        $(document).ready(function() {
            $('#addQuestion').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('teacher.question.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });
            {{-- Question update --}}
            $('#editQuestion').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('teacher.question.update') }}",
                    type: "PUT",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });

            {{-- Get  EDIT AJAX     --}}
            $('.editButton').click(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                document.getElementById('edit_question_id').value = id;
                let url = '{{ route('teacher.question.getData', 'id') }}';

                url = url.replace('id', id);

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(data) {
                        if (data.success == true) {
                            var question = data.data[0];
                            $("#edit_name").val(question.name);
                            $("#edit_date").val(question.date);
                            $("#edit_time").val(question.time);
                            $("#edit_attempt").val(question.attempt);
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });


            {{-- Get QuestionItems --}}
            $(".addQuestionItems").click(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                let question_id = document.getElementById('questionId').value = id;

                let formData = $(this).serialize();


                $.ajax({
                    url: "{{ route('teacher.questionItems.getQuestionItems') }}",
                    type: "GET",
                    data: {
                        question_id: question_id
                    },

                    success: function(data) {
                        let questionItems = data.data;
                        let html = '';

                        if (questionItems.length > 0) {
                            for (let i = 0; i < questionItems.length; i++) {
                                html += `
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="questionItems_ids[]" id="" value="` +
                                    questionItems[i]['id'] + `">
                                        </td>
                                        <td>` + questionItems[i]['question'] + `</td>
                                    </tr>
                                `;
                            }
                        } else {
                            html += `
                                <tr>
                                    <td colspan="2">Question Items not Available!</td>
                                </tr>
                            `;
                        }

                        $('.addBody').html(html);
                    }
                });
            });


            $("#addQNA").submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('teacher.questionItems.setData') }}",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });

            $(".showButton").click(function(e) {
                e.preventDefault();

                let id = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('teacher.question.show') }}",
                    type: "GET",
                    data: {
                        question_id: id
                    },
                    success: function(data) {
                        console.log(data.data)
                        let question = data.data;
                        let html = '';

                        if (question) {
                            html += `
                                <tr>
                                    <th>ID</th>
                                    <th>` + question.id + `</th>
                                </tr>
                                 <tr>
                                    <th>Quiz</th>
                                    <th>` + question.quiz.name + `</th>
                                </tr>
                                <tr>
                                    <th>Savol</th>
                                    <th>` + question.name + `</th>
                                </tr>
                                <tr>
                                    <th>Belgilangan kun</th>
                                    <th>` + question.date + `</th>
                                </tr>
                                <tr>
                                    <th>Belgilangan vaqt</th>
                                    <th>` + question.time + `</th>
                                </tr>
                                <tr>
                                    <th>Urunishlar soni</th>
                                    <th>` + question.attempt + `</th>
                                </tr>
                                 <tr>
                                    <th>Kiritilgan vaqti</th>
                                    <th>` + question.created_at + `</th>
                                </tr>
                                 <tr>
                                    <th>Tahrirlanga vaqti</th>
                                    <th>` + question.updated_at + `</th>
                                </tr>
                            `;
                        } else {
                            html += `
                                <tr>
                                    <th>Savol mavjud emas!</th>
                                </tr>
                            `;
                        }

                        $("#showQuestionTable").html(html);
                    }
                });
            });

            $("#search").keyup(function() {
                let input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("search");
                filter = input.value.toUpperCase();
                table = document.getElementById('questionItemsTable');
                tr = table.getElementsByTagName('tr');

                for (let i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName('td')[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            });

            document.getElementById('deleteForm').addEventListener('submit', function(event) {
                event.preventDefault();

                if (confirm('Haqiqatan ham ma\'lumotni o\'chirmoqchimisiz?')) {
                    this.submit();
                }
            });



            $('select').selectpicker();
        });
    </script>
@stop
