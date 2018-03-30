@extends('layouts.lte')

@section('title', $title)

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Главная</a></li>
                <li><a href="{{ route('a.faq') }}">All Questions</a></li>
                <li><a href="{{ route('a.faq.edit', ['id' => $question->id]) }}">Question {{ $question->id }}</a></li>
                <li><a href="{{ route('a.faq.comments', ['id' => $question->id]) }}">Question {{ $question->id }} Comments</a></li>
                <li class="active">{{ $title }}</li>
            </ul>
        </div>
    </div>
@stop

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::open(['url' => $action, 'method' => 'post']) }}
{{ Form::hidden('question_id', $question->id) }}
<!-- <div class="row">
    <div class="col-md-12">
        <p>If you </p>
    </div>
</div> -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('user_name', 'User name:') }}
            {{ Form::text('user_name', $comment->user_name, ['placeholder'=>'User name', 'class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('user_email', 'User email:') }}
            {{ Form::text('user_email', $comment->user_email, ['placeholder'=>'User email', 'class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('user_role', 'User role:') }}
            {{ Form::select('user_role', $roles, $comment->user_role, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('status', 'Comment status:') }}
            {{ Form::select('status', $statuses, $comment->status, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('comment_text', 'Comment Content*:') }}
            {{ Form::textarea('comment_text', $comment->comment_text, ['placeholder'=>'Comment Content', 'class' => 'form-control tiny']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            {{ Form::submit('Save', ['class'=>'btn btn-success btn-flat']) }}
        </div>
    </div>
</div>

{{ Form::close() }}
@stop
