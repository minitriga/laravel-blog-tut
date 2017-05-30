@extends('main')

@section('title', '| Edit Tags')

@section('content')

	{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}

		{{ Form::label('name', 'Title:') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}

		{{ Form::submit('Save Changed', ['class' => 'btn btn-primary form-spacing-top']) }}

	{{ Form::close() }}

@endsection