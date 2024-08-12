@extends('teacher.layouts.main')

<?php
use App\Models\ExamsAttempt;
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
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                @if (count($examAttempts) > 0)
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th width="30">#</th>
                            <th>Ism</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($examAttempts as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    {{$item->exam->name}}
                                </td>
                                {{-- <td>{{ ExamsAttempt::getStudent($item->user_id)->name }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="alert alert-info">
                        Natija 0 ta
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
