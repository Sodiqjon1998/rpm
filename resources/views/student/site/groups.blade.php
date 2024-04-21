@extends('student.layouts.main')


@section('content')

    <style>
        body {
            background: #f2f1f5;
        }

        .list-group {
            width: 100% !important;

        }

        .list-group-item {
            margin-top: 10px;
            border-radius: none;
            background: #9d99a1;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }


        .list-group-item:hover {
            transform: scaleX(1.1);
        }


        .check {
            opacity: 0;
            transition: all 0.6s ease-in-out;
        }

        .list-group-item:hover .check {
            opacity: 1;

        }

        .about span {
            font-size: 12px;
            margin-right: 10px;

        }

        input[type=checkbox] {
            position: relative;
            cursor: pointer;
        }

        input[type=checkbox]:before {
            content: "";
            display: block;
            position: absolute;
            width: 20px;
            height: 20px;
            top: 0px;
            left: 0;
            border: 1px solid #10a3f9;
            border-radius: 3px;
            background-color: white;

        }

        input[type=checkbox]:checked:after {
            content: "";
            display: block;
            width: 7px;
            height: 12px;
            border: solid #007bff;
            border-width: 0 2px 2px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            position: absolute;
            top: 2px;
            left: 6px;
        }

        input[type="checkbox"]:checked + .check {
            opacity: 1;
        }
    </style>


    <div class="container d-flex justify-content-center">

        <ul class="list-group mt-5 text-white">
            @foreach($groups as $group)
                <a href="{{route("groups")}}">
                    <li class="list-group-item d-flex justify-content-between align-content-center">

                        <div class="d-flex flex-row">
                            <img src="https://img.icons8.com/color/100/000000/folder-invoices.png" width="40"/>
                            <div class="ml-2">
                                <h6 class="mb-0">{{$group->name}}</h6>
                                <div class="about">
                                    @foreach($group->groupItems as $item)

                                    @endforeach
                                    <span>{{date('M d, Y', $group->lesson_per_month)}}</span>
                                </div>
                            </div>
                        </div>

                    </li>
                </a>
            @endforeach
        </ul>

    </div>

@endsection
