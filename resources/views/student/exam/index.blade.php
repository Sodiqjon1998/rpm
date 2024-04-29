@extends('student.layouts.main')


@section('content')

    <h6 class="display-6 text-center">Barcha fanlardan test savollari</h6>

    <div class="row">
        @foreach($exams as $exam)
            <div class="col-xl-4 col-md-6">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Mavzu: {{$exam->quiz->name}} &nbsp;&nbsp; <a
                                        href="#" data-code="{{$exam->enterance_id}}" class="copied">
                                        <i class="ri-file-copy-2-fill"></i>
                                    </a></p>
                                <h4 class="mb-2">
                                    {{$exam->name}}
                                </h4>
                                <p class="text-muted mb-0">
                                    <span class="text-success fw-bold font-size-12 me-2">
                                        <i class="ri-alarm-line me-1 align-middle"></i>{{date('M d, Y', strtotime($exam->date))}}
                                        <i class="ri-time-fill"></i> {{$exam->time}}
                                    </span>
                                    Urunishlar soni: {{$exam->attempt - $exam->getIdAttributes($exam->id)}}
                                    <a href="{{route('exam.show', $exam->enterance_id)}}" class="btn btn-link btn-sm">
                                        <i class="ri-link"></i>
                                    </a>
                                </p>
                            </div>
                            <div class="avatar-sm">
                            <span class="avatar-title bg-light text-success rounded-3">
                                <i class="ri-book-2-fill font-size-24"></i>
                            </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        @endforeach
    </div>

    <script>
        $(document).ready(function (e) {
            $(".copied").click(function (e) {
                e.preventDefault();
                $(this).prepend('<span class="copied_text">Copied</span>');

                let code = $(this).attr('data-code');

                let url = "{{URL::to('/student')}}/exam/show/" + code;

                let $temp = $("<input>");

                $("body").append($temp);
                $temp.val(url).select();
                document.execCommand("copy");
                $temp.remove();

                setTimeout(() => {
                    $(".copied_text").remove();
                }, 1000);
            });
        });

    </script>
@endsection
