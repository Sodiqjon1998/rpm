@extends('teacher.layouts.main')
<?php
use App\Models\Group;
?>
@section('content')
    <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
        <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
            Sinflar
        </h3>
        <ol class="breadcrumb" style="padding: 0; margin:0 0 10px 0;">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Sinflar</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header d-flex justify-content-end mb-3" >
            <a href="{{ route('teacher.groups.create') }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="card-body" style="padding: 0 10px !important;">
            <table class="table table-bordered table-striped table-sm font-size-13">
                <thead>
                    <tr class="text-center text-white bg-dark">
                        <th style="width: 50px;" class="text-center">T/R</th>
                        <th>Guruh nomi</th>
                        <th>Fan nomi</th>
                        <th>lesson_per_month</th>
                        <th>status</th>

                        <th>Action</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input class="form-control"
                           id="myInput" type="text" placeholder="Sarlavha uchun qidiruv">
                        </td>
                        <td>
                            <input class="form-control"
                           id="myInput" type="text" placeholder="Sarlavha uchun qidiruv">
                        </td>
                        <td>
                            <input class="form-control"
                           id="myInput" type="text" placeholder="Sarlavha uchun qidiruv">
                        </td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($groups as $key => $group)
                        <tr>
                            <td style="width: 50px;" class="text-center">{{ ++$key }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->course->subject }}</td>
                            <td><?= date('d.m.Y', $group->lesson_per_month) ?></td>
                            <td>{{ $group->status }}</td>

                            <td style="width: 100px">
                                <div class="d-flex gap-1">
                                    <a href="{{ route('teacher.groups.show', [$group->id]) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('teacher.groups.edit', [$group->id]) }}"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <form id="deleteForm" action="{{ route('teacher.groups.destroy', $group->id) }}"
                                        method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
