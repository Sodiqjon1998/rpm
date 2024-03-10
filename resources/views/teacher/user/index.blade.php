@extends('teacher.layouts.main')

<?php
$i = 1;
?>

@section('content')
    <div class="row">
        <div class="col-12" style="padding: 0 !important; margin: 0 !important; text-align:center;">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
                    Foydalanuvchilar
                </h3>
                <ol class="breadcrumb" style="padding: 0; margin:0 0 10px 0;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Foydalanuvchilar</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" style="padding: 0; margin:0;">
        <div class="col-lg-12" style="padding: 0; margin:0;">
            <div class="card">
                <h4 class="card-header">
                    <a href="{{ route('backend.user.create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered table-sm" style="font-size: 14px;">
                            <thead>
                                <tr class="text-center bg-dark" style="color: #FFFFFF">
                                    <th>#</th>
                                    <th>Ism</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Kiritilgan vaqti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr style="padding: 0; margin:0;">
                                        <th scope="row"><?= $i ?></th>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td><?= $user->email ?></td>
                                        <td>{{ $user->user_type }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td style="width: 140px;">
                                            <a href="{{ route('teacher.user.show', $user->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('teacher.user.edit', $user->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </td>
                                        <?php $i += 1; ?>
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
@endsection
