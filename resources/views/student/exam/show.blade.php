@extends('student.layouts.main')

@section('content')

    <div class="container">
        Xush kelibsiz! {{Auth::user()->name}}
        <h1 class="display-6 text-center">{{$exam[0]['name']}}</h1>
        @if($success == true)
            @if(count($qnAnswers) > 0)
                @php $qcount = 1; @endphp
                <form action="">
                    @foreach($qnAnswers as $key => $question)
                        <div class="card">
                            <h5 class="card-header">

                                Q.{{$qcount++}} {{$question['questionItems'][0]['question']}}

                            </h5>
                            @php $acount = 1; @endphp
                            <div class="card-body">
                                <ol type="A">
                                    @foreach($question['questionItems'][0]['answers'] as $answer)
                                        <li style="font-weight: lighter;">
                                            <input type="radio" name="" id="" class=""> &nbsp; {{$answer->answer}}
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endforeach
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

@endsection
