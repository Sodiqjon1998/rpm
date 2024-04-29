@extends('student.layouts.main')

@section('content')

    <div class="container">

        Xush kelibsiz! {{Auth::user()->name}}
        <h1 class="display-6 text-center">{{$exam[0]['name']}}</h1>
        @php
            $time = explode(':', $exam[0]['time']);
        @endphp

        @php $qcount = 1; @endphp
        @if($success == true)
            @if(count($qnAnswers) > 0)
                <h6 class="text-right time">
                    {{$exam[0]['time']}}
                </h6>
                <form action="{{route('submitExam')}}" method="POST" id="exam_form" class="mb-5">
                    @csrf
                    <input type="hidden" name="exam_id" id="" value="{{$exam[0]['id']}}">
                    @foreach($qnAnswers as $key => $question)
                        <div class="card">
                            <h5 class="card-header">
                                Q.{{$qcount++}} {{$question['questionItems'][0]['question']}}
                            </h5>
                            <input type="hidden" name="q[]" id="" value="{{$question['questionItems'][0]['id']}}">
                            <input type="hidden" name="ans_{{$qcount-1}}" id="ans_{{$qcount-1}}">
                            @php $acount = 1; @endphp
                            <div class="card-body">
                                <ol type="A">
                                    @foreach($question['questionItems'][0]['answers'] as $k => $answer)
                                        <li style="font-weight: lighter;">
                                            <input type="radio" name="radio_{{$qcount-1}}" id=""
                                                   class="select_ans"
                                                   value="{{$answer->id}}" data-id="{{$qcount-1}}"> &nbsp;
                                            {{$answer->answer}}
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        <input type="submit" name="" id="" class="btn btn-success btn-sm" value="Testni yakunlash">
                    </div>
                </form>
            @else
                <h3 class="text-danger">
                    Varyantlar mavjud emas
                </h3>
            @endif
        @else
            <h6 class="text-danger display-6 text-center">
                {{$msg}}
            </h6>
        @endif
    </div>

    <script>
        $(document).ready(function(){
            $(".select_ans").click(function(){
                let no = $(this).attr('data-id');
                let val = $("#ans_"+no).val($(this).val());
            });

            let time = @json($time);

            console.log(time);

            $('.time').text(time[0] + ':' + time[1] + ':00');

            let second = 4;
            let hours = parseInt(time[0]);
            let minutes = parseInt(time[1]);

            let timer = setInterval(function () {

                if(hours == 0 && minutes == 0 && second == 0){
                    clearInterval(timer);
                    $("#exam_form").submit();
                }

                if(second <= 0){
                    minutes--;
                    second = 4;
                }

                if(minutes <= 0 && hours != 0){
                    hours--;
                    second = 4
                    minutes = 59;
                }

                let tempHours = hours.toString().length > 1 ? hours:'0' + hours;
                let tempMinutes = minutes.toString().length > 1 ? minutes:'0' + minutes;
                let tempSecond = second.toString().length > 1 ? second:'0' + second;

                $('.time').text(tempHours + ':' + tempMinutes + ':'+ tempSecond);

                second--;
            }, 1000);


        });

        function isValid(){
            let result = true;
            let qLength = parseInt("{{$qcount}}")-1;

            for(let  i = 1; i <= qLength; i++){
                if($('#ans_'+i).val() == ""){
                    result = false;
                    $("#ans_"+i).parent().append("<span class='btn btn-warning btn-sm mb-3 ml-3 error_msg'>Javob tanlang!</span>");
                    setTimeout(() => {
                        $(".error_msg").remove();
                    }, 5000);
                }
            }

            return result;
        }


    </script>

@endsection
