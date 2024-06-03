@php use App\Models\Backend\User; @endphp
@extends('backend.layouts.main')


@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3>
                    {{ $model->id }}
                </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('backend.user.index') }}">O'qituvchilar</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $model->id }}</li>
                </ol>
            </nav>
        </div>
        <!-- end page title -->
        <div class="card">
            <div class="card-header ">
                <a href="{{ route('backend.user.create') }}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i>
                </a>
                <a href="{{ route('backend.user.edit', $model->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pen"></i>
                </a>
                <form id="deleteForm" action="{{ route('backend.user.destroy', $model->id) }}" method="POST"
                      style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return myFunction()" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <tr>
                        <td>Id</td>
                        <td>{{ $model->id }}</td>
                    </tr>
                    <tr>
                        <td>Ism</td>
                        <td><?= $model->name ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $model->email ?></td>
                    </tr>
                    <tr>
                        <td>Rasmlar</td>
                        <td>
                            <img
                                src="{{ !is_null($model->img) ? asset($model->img) : asset('images/staticImages/defaultAvatar.png') }}"
                                width="80" height="70" alt="{{ asset($model->img) }}" class="rounded-circle">
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><?= User::getTypes($model->user_type) ?></td>
                    </tr>
                    <tr>
                        <td>Kiritilgan vaqti</td>
                        <td>{{ $model->created_at ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td>Tahrirlangan vaqti</td>
                        <td>{{ $model->updated_at ?? '--' }}</td>
                    </tr>
                </table>
            </div>
        </div>
@endsection
