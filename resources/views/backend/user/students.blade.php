@php use App\Models\Backend\User; @endphp
@extends('backend.layouts.main')

<?php
$i = 1;
?>

@section('content')
    <div class="row">
        <div class="col-12" style="padding: 0 !important; margin: 0 !important; text-align:center;">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
                    O'quvchilar
                </h3>
                <ol class="breadcrumb" style="padding: 0; margin:0 0 10px 0;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">O'quvchilar</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" style="padding: 0; margin:0;">
        <div class="col-lg-12" style="padding: 0; margin:0;">
            <div class="card">
                <h4 class="card-header">
                    <a href="{{ route('backend.user.create') }}"
                       data-bs-toggle="modal"
                       data-bs-target="#addStudentModal" class="btn btn-success btn-sm">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered table-sm" style="font-size: 14px;">
                            <thead>
                            <tr class="text-center bg-dark" style="color: #FFFFFF">
                                <th>#</th>
                                <th>Rasm</th>
                                <th>Ism</th>
                                {{-- <th>Guruhi</th> --}}
                                <th>Email</th>
                                <th>Kiritilgan vaqti</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $user)
                                <tr style="padding: 0; margin:0;">
                                    <th scope="row"><?= $i ?></th>
                                    <td>
                                        <img
                                            src="{{ !is_null($user->img) ? asset($user->img) : asset('images/staticImages/defaultAvatar.png') }}"
                                            width="80" height="70" alt="{{ asset($user->img) }}" class="rounded-circle">
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    {{-- <td>
                                        <button class="btn btn-info btn-sm">
                                            {{ $user->groupName }}
                                        </button>
                                    </td> --}}
                                    <td><?= $user->email ?></td>
                                    <td>{{ $user->created_at ?? '--' }}</td>
                                    <td style="width: 160px;">
                                        <a href="{{ route('backend.user.show', $user->id) }}"
                                           class="btn btn-success btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('backend.user.edit', $user->id) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form id="deleteForm" action="{{ route('backend.user.destroy', $user->id) }}"
                                              method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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


    <!-- Modal -->
    <div class="modal fade" id="addStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addStudent">

                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title" id="staticBackdropLabel">Savol </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" name="name" placeholder="Enter name" required id=""
                                       class="w-100 form-control-sm">
                                <input type="email" name="email" placeholder="Enter email" required id=""
                                       class="w-100 form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="error text-danger text-left"></div>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Yopish</button>
                        <button type="submit" class="btn btn-primary btn-sm">Saqlash</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#addStudent").submit(function(e){
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{route('backend.users.addStudentStore')}}",
                    type: "POST",
                    data: formData,
                    success:function(data){
                        if(data.success == true){
                            location.reload();
                        }else{
                            alert(data.msg)
                        }
                    }
                });
            });
        });

        document.getElementById('deleteForm').addEventListener('submit', function(event) {
            event.preventDefault();

            if (confirm('Haqiqatan ham ma\'lumotni o\'chirmoqchimisiz?')) {
                this.submit();
            }
        });
    </script>
@endsection
