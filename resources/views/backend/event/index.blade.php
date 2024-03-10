@extends('backend.layouts.main')


<?php
$i = 1;
?>

@section('content')
    <div class="row">
        <div class="col-12" style="padding: 0 !important; margin: 0 !important; text-align:center;">
            <nav aria-label="breadcrumb" style="display:flex; justify-content:space-between; align-items: center;">
                <h3 style="padding: 0 !important; margin: 0 !important; text-align:center;">
                    Hodisalar
                </h3>
                <ol class="breadcrumb"  style="padding: 0; margin:0 0 10px 0;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hodisalar</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" style="padding: 0; margin:0;">
        <div class="col-lg-12" style="padding: 0; margin:0;">
            <div class="card">
                <h4 class="card-header">
                    <a href="{{ route('event.create') }}" class="btn btn-success btn-sm">
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
                                    <th>Sarlavha</th>
                                    <th>Manzil</th>
                                    <th>Boshlanish vaqti</th>
                                    <th>Tugash vaqti</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                        
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr  style="padding: 0; margin:0;">
                                        <th scope="row" class="text-center bg-dark" style="color: #FFFFFF"><?= $i ?></th>
                                        <td style="padding: 0; margin:0;" class="text-center">
                                            <img src="{{ asset($event->img) }}" alt="{{ asset($event->img) }}"
                                                width="130" height="60" class="mt-lg-1">
                                        </td>
                                        <td><?= $event->title ?></td>
                                        <td>{{ $event->location }}</td>
                                        <td><i class="fa fa-clock"></i> <?php echo date("H:i", $event->date_start);?> </td>
                                        <td><i class="fa fa-clock"></i> <?php echo date("H:i", $event->date_end);?> </td>
                                        <td>{{ $event->status }}</td>
                                        <td style="width: 140px;">
                                            <a href="{{ route('event.show', $event->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('event.edit', $event->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form id="deleteForm" action="{{ route('event.destroy', $event->id) }}"
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

    <script>
        document.getElementById('deleteForm').addEventListener('submit', function(event) {
            event.preventDefault();

            if (confirm('Haqiqatan ham ma\'lumotni o\'chirmoqchimisiz?')) {
                this.submit();
            }
        });
    </script>
@endsection