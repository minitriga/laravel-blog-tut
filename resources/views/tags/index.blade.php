@extends('main')

@section('title', '| All Tags')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Posts</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td>{{ $tag->name }}</td>
						<td>{{ $tag->posts()->count() }} Posts</td>
						<td><a href="{{ route('tags.show', $tag->id ) }}" class="btn btn-default btn-xs">View</a></td>
						<td>
							{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}

							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-default btn-xs'])}}

							{{ Form::close() }}
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div> <!-- end of col.md8 -->

		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
					<h2>New Tag</h2>
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}

				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection