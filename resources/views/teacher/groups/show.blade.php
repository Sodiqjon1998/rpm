@extends('teacher.layouts.main')

<?php
use App\Models\Group;

?>

@section('content')
    <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
        <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
            Guruhlar
        </h3>
        <ol class="breadcrumb" style="padding: 0; margin:0 0 10px 0;">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('teacher.groups.index') }}">Guruhlar</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Batafsil</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <span class="btn btn-info btn-sm">
                        <strong>ID:{{ $group->id }}</strong>
                    </span>
                    <a href="{{ route('teacher.groups.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                    <a href="{{ route('teacher.groups.edit', $group->id) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-pen"></i>
                    </a>
                    <form id="deleteForm" action="{{ route('teacher.groups.destroy', $group->id) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm font-size-13">
                        <tbody>
                            <tr>
                                <th>
                                    Guruh nomi
                                </th>
                                <td>
                                    {{ $group->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    O'qituvchi
                                </th>
                                <td>
                                    <?= Group::getTeacher($group->teacher_id)->name ?>
                                    </th>
                            </tr>
                            <tr>
                                <th>
                                    Guruh ochilgan sana
                                </th>
                                <td>
                                    <?= date('d.m.Y', $group->lesson_per_month) ?>
                                    </th>
                            </tr>
                            <tr>
                                <th>
                                    Status
                                </th>
                                <td>
                                    <?php
                                    $name = '';
                                    if ($group->status == 1) {
                                        $name = "<span class='btn btn-info btn-sm'>Faol</span>";
                                    } else {
                                        $name = "<span class='btn btn-danger btn-sm'>No faol</span>";
                                    }
                                    echo $name;
                                    ?>
                                    </th>
                            </tr>
                            </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    🤵 O'quvchini guruhga biriktirish
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>
                                <form action="{{ route('teacher.groups.multiple') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="group_id" value="{{ $group->id }}" id="">
                                    <select class="select2 form-control select2-multiple" name="multiple[]"
                                        multiple="multiple" data-placeholder="Choose ..." required>
                                        @foreach (Group::getAllStudents($group) as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-success btn-sm mt-2 float-end ">
                                        <i class="fa fa-save"></i>
                                    </button>
                                </form>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">O'qiyabdi</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Guruhni yakunladi</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home-1" role="tabpanel">
                            <table class="table table-bordered table-striped font-size-11 table-sm">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>
                                        <a href="">O'quvchi F.I.SH</a>
                                    </th>
                                    <th></th>
                                </tr>
                                @foreach ($groupItemActives as $key => $item)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td>
                                            <a href="#">{{ Group::getStudent($item->student_id)->name }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-primary btn-sm" title="Ko'rish"
                                                data-bs-toggle="tooltip">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('teacher.groups.removeStudent', $item->id) }}"
                                                class="btn btn-outline-danger btn-sm" onclick="return myFunction();"
                                                title="O'chirish" data-bs-toggle="tooltip">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane" id="profile-1" role="tabpanel">
                            <table class="table table-bordered table-striped font-size-11 table-sm">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>
                                        <a href="">O'quvchi F.I.SH</a>
                                    </th>
                                    <th></th>
                                </tr>
                                @foreach ($groupItemInActives as $key => $item)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td>
                                            <a href="#">{{ Group::getStudent($item->student_id)->name }}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-primary btn-sm" title="Ko'rish"
                                                data-bs-toggle="tooltip">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
