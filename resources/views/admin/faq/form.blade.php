@extends('layouts.lte')

@section('title', $title)

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Главная</a></li>
                <li><a href="{{ route('a.faq') }}">All Questions</a></li>
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
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('question_title', 'Question*:') }}
            {{ Form::text('question_title', (isset($question)) ? $question->question_title : '' , ['placeholder'=>'Question', 'class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('answer_title', 'Title:') }}
            {{ Form::text('answer_title', (isset($question)) ? $question->answer_title : '', ['placeholder'=>'Answer Title', 'class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('status', 'Status:') }}
            {{ Form::select('status', $statuses, (isset($question)) ? $question->status : '', ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('answer_content', 'Answer Content*:') }}
            {{ Form::textarea('answer_content', (isset($question)) ? $question->answer_content : '' , ['placeholder'=>'Answer Content', 'class' => 'form-control tiny']) }}
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
