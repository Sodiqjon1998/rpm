@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'groupitems.store']) !!}

		<div class="mb-3">
			{{ Form::label('group_id', 'Group_id', ['class'=>'form-label']) }}
			{{ Form::text('group_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('student_id', 'Student_id', ['class'=>'form-label']) }}
			{{ Form::text('student_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('started_at', 'Started_at', ['class'=>'form-label']) }}
			{{ Form::text('started_at', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('finished_at', 'Finished_at', ['class'=>'form-label']) }}
			{{ Form::text('finished_at', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('status', 'Status', ['class'=>'form-label']) }}
			{{ Form::text('status', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('created_by', 'Created_by', ['class'=>'form-label']) }}
			{{ Form::text('created_by', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('updated_by', 'Updated_by', ['class'=>'form-label']) }}
			{{ Form::text('updated_by', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop