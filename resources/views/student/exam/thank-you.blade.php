@php use App\Models\QuestionItem; @endphp
@php use App\Models\Answer; @endphp

<?php

$isCorrectCount = 0;



foreach ($attempts['examAnswers'] as $key => $value) {
    if (Answer::getAnswer($value->answer_id)->is_correct == 1) {
        ++$isCorrectCount;
    }
}

$allCount = count($attempts['examAnswers']);

?>
@extends('student.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @if (count($attempts['examAnswers']) > 0)
                    <div class="card-body">
                        <table class="table-sm w-100">
                            @foreach ($attempts['examAnswers'] as $key => $attempt)
                                <tr>
                                    <td>
                                        {{ ++$key }}.
                                        {!! QuestionItem::getQuestion($attempt->question_item_id)->question !!}
                                        <img src="{{ asset('images/staticImages/shot.png') }}" width="25px" class="float-end"
                                            alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if (Answer::getAnswer($attempt->answer_id)->is_correct == 1)
                                            <p class="p-2" style="background-color: #9cf59c; cursor: pointer;">
                                                <i class="fa fa-check marker"></i>
                                                {{ Answer::getAnswer($attempt->answer_id)->answer }}
                                            </p>
                                        @else
                                            <p class="p-2" style="background-color: #ffb8b8; cursor: pointer;">
                                                <i class="fa fa-times"></i>
                                                {{ Answer::getAnswer($attempt->answer_id)->answer }}
                                            </p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <p class="alert alert-warning">
                        Natija 0
                    </p>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <tr>
                            <th>
                                Imtihon
                            </th>
                            <td>
                                {{ $attempts['exam']['name'] }} <img src="{{ asset('images/staticImages/book.png') }}"
                                    alt="" width="25px">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                O'quvchi
                            </th>
                            <td>
                                {{ Auth::user()->name }} <img src="{{ asset('images/staticImages/welStudent.png') }}"
                                    width="25px" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                To'g'ri
                            </th>
                            <td>
                                {{ $isCorrectCount }} ta
                            </td>
                        </tr>
                        <tr>
                            <th>Foiz</th>
                            <td>
                                <?php
                                    $result = ($isCorrectCount*100)/$allCount;
                                    echo round($result)."%";
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
