@extends('backend.layouts.main')

@section('content')

    <div class="row">
        <div class="col-12" style="padding: 0 !important; margin: 0 !important; text-align:center;">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
                    Fanlar
                </h3>
                <ol class="breadcrumb" style="padding: 0; margin:0 0 10px 0;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Fanlar</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" style="padding: 0; margin:0;">
        <div class="col-lg-12" style="padding: 0; margin:0;">
            <div class="card">
                <h4 class="card-header">
                    <a href="{{ route('backend.courses.create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered table-sm" style="font-size: 14px;">
                            <thead>
                            <tr class="text-center bg-dark" style="color: #FFFFFF">
                                <th width="30" align="center">#</th>
                                <th>Fan nomi</th>
                                <th>Vaqti</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach ($courses as $key => $course)
                                <tr style="padding: 0; margin:0;">
                                    <th scope="row" width="30" align="center"><?= ++$key ?></th>
                                    <td>{{ $course->subject }}</td>
                                    <td>{{ $course->created_at }}</td>
                                    <td>{{ $course->status }}</td>
                                    <td style="width: 140px;">
                                        <a href="{{ route('backend.courses.show', $course->id) }}"
                                           class="btn btn-success btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('backend.courses.edit', $course->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form id="deleteForm"
                                              action="{{ route('backend.courses.destroy', $course->id) }}"
                                              method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('deleteForm').addEventListener('submit', function(event) {
            event.preventDefault();

            if (confirm('Haqiqatan ham ma\'lumotni o\'chirmoqchimisiz?')) {
                this.submit();
            }
        });

    </script>

@stop
