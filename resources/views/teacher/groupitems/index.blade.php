@extends('teacher.layouts.main')

<?php
use App\Models\GroupItem;
?>

@section('content')
    <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
        <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
            Sinf a'zolari
        </h3>
        <ol class="breadcrumb" style="padding: 0; margin:0 0 10px 0;">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Sinf a'zolari</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header d-flex justify-content-end mb-3">
            <a href="{{ route('teacher.groupitems.create') }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm font-size-13">
                <thead>
                    <tr>
                        <th style="width: 10px;">T/R</th>
                        <th>O'quvchi F.I.Sh</th>
                        <th>Sinf</th>
                        <th>Sinfga qo'shilgan vaqt</th>
                        <th>Tugatildi</th>
                        <th>Status</th>
                        <th>Kiritilgan v</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groupitems as $key => $groupitem)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>
                                <a href="{{route('teacher.user.show', $groupitem->student_id)}}">
                                    {{ GroupItem::getStudentOne($groupitem->student_id)->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{route('teacher.groups.show', $groupitem->group_id)}}">
                                    {{ GroupItem::getGroup($groupitem->group_id)->name }}
                                </a>
                            </td>
                            <td>{{ date('d.m.Y', $groupitem->started_at) }}</td>
                            <td>{{ !is_null($groupitem->finished_at) ? date('d.m.Y', $groupitem->finished_at) : '--' }}</td>
                            <td>{{ $groupitem->status }}</td>
                            <td>{{ $groupitem->created_at }}</td>

                            <td class="text-center" style="width: 110px;">
                                <a href="{{ route('teacher.groupitems.show', [$groupitem->id]) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('teacher.groupitems.edit', [$groupitem->id]) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <form id="deleteForm" action="{{ route('teacher.groupitems.destroy', $groupitem->id) }}"
                                    method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $i = 1 + 1;
                        ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
