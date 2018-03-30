@extends('layouts.lte')

@section('title', 'Edit form')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li><a href="{{ route('a.forms') }}">All application forms</a></li>               
                <li class="active">Edit form</li>
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
<div class="row">
    <div class="col-md-4">
        {{ Form::open() }}
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', $form->name, ['placeholder'=>'Name', 'class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('from', ' Sender Email') }}
                {{ Form::email('from', $form->from, ['placeholder'=>'Sender Email ', 'class' => 'form-control']) }}
            </div>  
            <div class="pull-right">
                {{ Form::submit('Save', ['class'=>'btn btn-success btn-flat']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop