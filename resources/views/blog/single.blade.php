@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted In: {{ $post->Category->name }}</p>
		</div>
	</div> <!-- end of div -->

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)

				<div class="media">
				  <div class="media-left">
				      <img class="media-object author-image img-circle" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?d=mm" }}">
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading">{{ $comment->name }} <small><i>{{ $comment->created_at->diffForHumans() }}</i></small></h4>
				   <p>{{ $comment->comment }}</p>
				  </div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2 form-comments-top">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
 
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>

				<div class="col-md-6">
					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email', null, ['class' => 'form-control']) }}
				</div>

				<div class="col-md-12">
					{{ Form::label('comment', 'Comment:') }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

					{{ Form::submit('Add Comment', ['class' => 'btn btn-info btn-block form-spacing-top'])}}
				</div>
			</div>

			{{ Form::close() }}
		</div>
	</div>

@endsection