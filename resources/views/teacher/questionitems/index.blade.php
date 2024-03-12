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
                    <a href="{{ route('teacher.questionItems.create') }}" class="btn btn-success btn-sm"
                       data-bs-toggle="modal"
                       data-bs-target="#addQuestionItemsModal">
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
                                <th>Vaqti</th>
                                <th>Tahrirlangan vaqt</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @if(count($questionItems) > 0)

                                @foreach ($questionItems as $key => $question)
                                    <tr style="padding: 0; margin:0;">
                                        <th scope="row" width="30" align="center"><?= ++$key ?></th>
                                        <td>{{ $question->question }}</td>
                                        <td>{{ $question->created_at }}</td>
                                        <td>{{ $question->updated_at }}</td>
                                        <td style="width: 150px;">
                                            <button class="btn btn-secondary btn-sm showAnswer"
                                                    data-id="{{$question->id}}" data-bs-toggle="modal"
                                                    href="#exampleModalToggle" role="button" value="{{$question->id}}">
                                                <i class="fa fa-check-circle"></i>
                                            </button>
                                            <a href="{{ route('teacher.questionItems.show', $question->id) }}"
                                               class="btn btn-success btn-sm getQuestionId">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('teacher.question.edit', $question->id) }}"
                                               class="btn btn-primary btn-sm editButton" data-bs-toggle="modal"
                                               data-bs-target="#editQuestionItemsModal" data-id="{{$question->id}}">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form id="deleteForm"
                                                  action="{{ route('teacher.questionItems.destroy', $question->id) }}"
                                                  method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm questionDelete"
                                                        data-id="{{$question->id}}">
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
    <div class="modal fade" id="addQuestionItemsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addQuestionItems">

                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title" id="staticBackdropLabel">Savol </h5>
                        <button id="addAnswer" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Varyant
                            qo'shish
                        </button>
                        {{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" name="question" placeholder="Enter question" required id=""
                                       class="w-100 form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="error text-danger text-left"></div>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Yopish</button>
                        <button type="submit" class="btn btn-primary btn-sm">Saqlash</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--EDIT Modal -->
    <div class="modal fade" id="editQuestionItemsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editQuestionItems">
                @csrf
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title" id="staticBackdropLabel">Savol </h5>
                        <button id="addAnswer" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Varyant
                            qo'shish
                        </button>
                        {{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    </div>
                    <div class="modal-body editModalBody">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" name="question" placeholder="Enter question" required id=""
                                       class="w-100 form-control-sm question">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="error text-danger text-left"></div>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Yopish</button>
                        <button type="submit" class="btn btn-primary btn-sm">Saqlash</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--SHOW DATA--}}
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Javoblar</th>
                                <th>To'g'ri & Xato</th>
                            </tr>
                            </thead>
                            <tbody id="tableBody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addQuestionItemsModal">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                    <button id="" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editQuestionItemsModal">
                        <i class="fa fa-pencil-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>


        $(document).ready(function(){
             $('#addQuestionItems').submit(function(e){
                 e.preventDefault();

                 if($('.answers').length < 2){
                     $('.error').text("Eng kamida 2 ta varyant kiriting");
                     setTimeout(function(){
                         $('.error').text("");
                     }, 2000);
                 }else{

                    let checkIsCorrect = false;

                    for(let i = 0; i <= $('.is_correct').length; i++){
                        if($('.is_correct:eq('+ i +')').prop('checked') == true){
                            checkIsCorrect = true;
                            $('.is_correct:eq('+ i +')').val($('.is_correct:eq('+ i +')').next().find('input').val())
                        }
                    }

                    if(checkIsCorrect && ($('.answers').length >= 2)){
                        let formData = $(this).serialize();

                        $.ajax({
                            url:"{{route('teacher.questionItems.store')}}",
                            type:"POST",
                            data:formData,
                            success:function(data){
                                if(data.success == true){
                                    location.reload();
                                }else{
                                    alert(data.msg);
                                }
                            }
                        });
                    }else{
                        $('.error').text("To'g'ri varyantni belgilanmagan yoki varyant kam");
                         setTimeout(function(){
                             $('.error').text("");
                         }, 2000);
                    }
                 }
            });

            //Add answer
            $('#addAnswer').click(function(){

                if($('.answers').length >= 11){
                     $('.error').text("Eng ko'pi bilan 6 ta varyant kirita olasiz!");
                     setTimeout(function(){
                         $('.error').text("");
                     }, 2000);
                }else{
                    let html = `
                        <div class="answers mt-2" style="display: flex; justify-content:space-around">
                             <input type="radio" name="is_correct" id="" class="is_correct mt-1" >
                            <div class="pt-2">
                                <input type="text" name="answers[]" placeholder="Enter answer" required id="" style="width: 370px">
                            </div>
                            <button class="btn btn-danger btn-sm mt-2 removeButton"><i class="fa fa-trash"></i></button>
                        </div>
                    `;

                    $('.modal-body').append(html);
                }
            });


            $(document).on('click', '.removeButton', function(e){
                e.preventDefault();

                $(this).parent().remove();
            });


            //SHOW ANSWER
            $('.showAnswer').click(function(e){

                let qid = $(this).attr('data-id');
                let html = '';
                let questionItems = @json($questionItems);

                for(let i = 0; i < questionItems.length; i++){

                    if(questionItems[i]['id'] == qid){

                        let answerLength = questionItems[i]['answers'].length;

                        for(let j = 0; j < answerLength; j++){

                            $("#exampleModalToggleLabel").text(questionItems[i]['question']);

                            let is_correct = "<i class='fa fa-times-circle btn btn-outline-danger'></i>";

                            if(questionItems[i]['answers'][j]['is_correct'] == 1){

                                is_correct = "<i class='fa fa-check-circle btn btn-outline-success btn-xs'></i>";
                            }

                            html += `
                                <tr>
                                    <td>`+ (j + 1) +`</td>
                                    <td>`+ questionItems[i]['answers'][j]['answer'] +`</td>
                                    <td>`+ is_correct +`</td>
                                </tr>
                            `;
                        }
                        break;
                    }
                }
                $("#tableBody").html(html);

            });

            $(".editButton").click(function(e){
                e.preventDefault();

                let html = '';

                let id = $(this).attr('data-id');

                let url = '{{route("teacher.questionItems.getData", "id")}}';

                 url = url.replace('id', id);

                $.ajax({
                    url: url,
                    type: "GET",
                    success:function(data){
                        console.log(data.data.questionItems.answers);
                        if(data.success == true){
                            $('.question').val(data.data.questionItems.question);

                                let answersLength = data.data.questionItems.answers;
                                for(let i = 0; i < answersLength; i++){
                                    html = `
                                     <div class="answers mt-2" style="display: flex; justify-content:space-around">
                                         <input type="radio" name="is_correct" id="" class="is_correct mt-1" >
                                        <div class="pt-2">
                                            <input type="text" name="answers[]" value="` + answersLength.answer + `" placeholder="Enter answer" required id="" style="width: 370px" class="editAnswers">
                                        </div>
                                        <button class="btn btn-danger btn-sm mt-2 removeButton"><i class="fa fa-trash"></i></button>
                                    </div>
                                `;
                                $('.editModalBody').append(html);
                            }
                        }
                    }
                });
            });
        });











    </script>
@stop
