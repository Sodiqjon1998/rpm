@extends('backend.layouts.main')

<style>
    /* Switch starts here */
    .toggle-border {
        border: 2px solid #f0ebeb;
        border-radius: 130px;
        margin-bottom: 45px;
        padding: 1px 2px;
        background: linear-gradient(to bottom right, white, rgba(220, 220, 220, .5)), white;
        box-shadow: 0 0 0 2px #fbfbfb;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .toggle-border:last-child {
        margin-bottom: 0;
    }

    .toggle-border input[type="checkbox"] {
        display: none;
    }

    .toggle-border label {
        position: relative;
        display: inline-block;
        width: 65px;
        height: 20px;
        background: #d13613;
        border-radius: 80px;
        cursor: pointer;
        box-shadow: inset 0 0 16px rgba(0, 0, 0, .3);
        transition: background .5s;
    }

    .toggle-border input[type="checkbox"]:checked + label {
        background: #13d162;
    }

    .handle {
        position: absolute;
        top: -8px;
        left: -10px;
        width: 35px;
        height: 35px;
        border: 1px solid #e5e5e5;
        background: repeating-radial-gradient(circle at 50% 50%, rgba(200, 200, 200, .2) 0%, rgba(200, 200, 200, .2) 2%, transparent 2%, transparent 3%, rgba(200, 200, 200, .2) 3%, transparent 3%), conic-gradient(white 0%, silver 10%, white 35%, silver 45%, white 60%, silver 70%, white 80%, silver 95%, white 100%);
        border-radius: 50%;
        box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, .4);
        transition: left .4s;
    }

    .toggle-border input[type="checkbox"]:checked + label > .handle {
        left: calc(100% - 35px + 10px);
    }
</style>

@section('content')

    <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
        <h3>
            Tahrirlash
        </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('teacher.groups.index') }}">Fanlar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tahrirlash</li>
        </ol>
    </nav>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            {{ Form::model($course, array('route' => array('backend.courses.update', $course->id), 'method' => 'PUT')) }}

            <div class="mb-3">
                {{ Form::label('subject', 'Fan nomi', ['class'=>'form-label']) }}
                {{ Form::text('subject', null, array('class' => 'form-control')) }}
            </div>
            <div class="mb-3">
                <label for="one">Status</label>
                <div class="toggle-border float-center" style="width: 65px;">
                    @if (empty($group->status))
                        <input id="one" type="checkbox" name="status">
                    @else
                        <input id="one" type="checkbox" checked name="status">
                    @endif
                    <label for="one">
                        <div class="handle"></div>
                    </label>
                </div>
            </div>

            {{ Form::submit('Saqlash', array('class' => 'btn btn-success')) }}

            {{ Form::close() }}
        </div>
    </div>
@stop
