@extends('student.layouts.main')

@section('content')

    <div class="container">

        Xush kelibsiz! {{ Auth::user()->name }} <img src="{{ asset('images/staticImages/welStudent.png') }}" width="35px"
            alt="">
        <h1 class="display-6 text-center">{{ $exam[0]['name'] }} <img src="{{ asset('images/staticImages/book.png') }}"
                alt="" width="45px"></h1>
        @php
            $time = explode(':', $exam[0]['time']);
            $date = explode('-', $exam[0]['date']);
        @endphp

        @php $qcount = 1; @endphp
        @if ($success == true)
            @if (count($qnAnswers) > 0)
                <h6 class="text-right">
                    <img src="{{ asset('images/staticImages/time.png') }}" width="25px" alt="">
                    <span class="time">
                        {{ $exam[0]['time'] }}
                    </span>
                </h6>
                <form action="{{ route('submitExam') }}" method="POST" id="exam_form" class="mb-5">
                    @csrf
                    <input type="hidden" name="exam_id" id="" value="{{ $exam[0]['id'] }}">
                    @foreach ($qnAnswers as $key => $question)
                        <div class="card">
                            <h5 class="card-header">
                                Q.{{ $qcount++ }} {!! $question['questionItems'][0]['question'] !!}
                                <img src="{{ asset('images/staticImages/shot.png') }}" width="30px" class="float-end"
                                    alt="">
                            </h5>
                            <input type="hidden" name="q[]" id=""
                                value="{{ $question['questionItems'][0]['id'] }}">
                            <input type="hidden" name="ans_{{ $qcount - 1 }}" id="ans_{{ $qcount - 1 }}">
                            @php $acount = 1; @endphp
                            <div class="card-body">
                                <ol type="A">
                                    @foreach ($question['questionItems'][0]['answers'] as $k => $answer)
                                        <li style="font-weight: lighter;">
                                            <input type="radio" name="radio_{{ $qcount - 1 }}" id=""
                                                class="select_ans" value="{{ $answer->id }}"
                                                data-id="{{ $qcount - 1 }}"> &nbsp;
                                            {{ $answer->answer }}
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        <input type="submit" name="" id="sendAnswer" class="btn btn-success btn-sm"
                            value="Testni yakunlash">
                    </div>
                </form>
            @else
                <h3 class="text-danger">
                    Varyantlar mavjud emas
                </h3>
            @endif
        @else
            <h6 class="text-danger display-6 text-center">
                {{ $msg }}
            </h6>
        @endif
    </div>

    <script>
        $(document).ready(function() {

            $(".select_ans").click(function() {
                let no = $(this).attr('data-id');
                let val = $("#ans_" + no).val($(this).val());
            });

            /**
             * Javascripdata xizirgi vaqtni olish kodi
             * */
            let examId = {{ $exam[0]['id'] }}
            let examDate = @json($date)


            let today = new Date();
            let month = today.getMonth() + 1;
            let day = today.getDate();
            let date = today.getFullYear() + '-' + month.toString().padStart(2, '0') + '-' + day.toString()
                .padStart(2, '0');

            let localTime = localStorage.getItem(examId)

            localTime = JSON.parse(localTime);



            if (localTime != null ) {
                let time = @json($time);

                let second = localTime[examId].second ? localTime[examId].second : 59;
                let minutes = localTime[examId].minutes ? localTime[examId].minutes : parseInt(time[1]);
                let hours = localTime[examId].hours ? localTime[examId].hours : parseInt(time[0]);

                $('.time').text(hours + ':' + minutes + ':' + second);

                function startTimer() {
                    let timer = setInterval(() => {
                        let data = {};
                        data[examId] = {
                            'id': examId,
                            'second': second,
                            'minutes': minutes,
                            'hours': hours
                        };

                        localStorage.setItem(examId, JSON.stringify(data));

                        if (hours == 0 && minutes == 0 && second == 0) {
                            clearInterval(timer);
                            localStorage.remove(examId)
                            $("#exam_form").submit();
                        }

                        if (minutes == 0 && second == 0) {
                            hours--;
                            minutes = 59;
                            second = 59;
                        }

                        if (second == 0) {
                            minutes--;
                            second = 59;
                        }
                        // console.log(second + "--" + minutes + "--" + hours);
                        $('.time').text(hours.toString().padStart(2, '0') + ':' + minutes.toString()
                            .padStart(2, '0') + ':' + second.toString().padStart(2, '0'));
                        second--;
                    }, 1000);
                    $("#sendAnswer").click(function(e) {
                        e.preventDefault();
                        let check = confirm("Testni yakunlamoqchimisiz?");

                        if (check) {
                            clearInterval(timer); // timer ni avtomatik to'zalash
                            localStorage.removeItem({{ $exam[0]['id'] }});
                            $("#exam_form").submit();
                        }
                    });
                }
            } else {
                let time = @json($time);

                let second = 59;
                let minutes = parseInt(time[1]);
                let hours = parseInt(time[0]);

                $('.time').text(hours + ':' + minutes + ':' + second);

                function startTimer() {
                    let timer = setInterval(() => {

                        let data = {};

                        data[examId] = {
                            'id': examId,
                            'second': second,
                            'minutes': minutes,
                            'hours': hours
                        };

                        localStorage.setItem(examId, JSON.stringify(data));

                        if (hours == 0 && minutes == 0 && second == 0) {
                            clearInterval(timer);
                            localStorage.remove(examId)
                            $(".time").text("Tugadi")
                        }

                        if (minutes == 0 && second == 0) {
                            hours--;
                            minutes = 59;
                            second = 59;
                        }

                        if (second == 0) {
                            minutes--;
                            second = 59;
                        }
                        // console.log(second + "--" + minutes + "--" + hours);
                        $('.time').text(hours + ':' + minutes + ':' + second);
                        second--;
                    }, 1000);
                }
            }
            startTimer();

        });

        function isValid() {
            let result = true;
            let qLength = parseInt("{{ $qcount }}") - 1;

            for (let i = 1; i <= qLength; i++) {
                if ($('#ans_' + i).val() == "") {
                    result = false;
                    $("#ans_" + i).parent().append(
                        "<span class='btn btn-warning btn-sm mb-3 ml-3 error_msg'>Javob tanlang!</span>");
                    setTimeout(() => {
                        $(".error_msg").remove();
                    }, 5000);
                }
            }

            return result;
        }
    </script>

@endsection
