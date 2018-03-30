@extends('layouts.lte')

@section('title', $title . ' ' . $form->name)

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li><a href="{{ route('ar.relations', ['slug' => $slug]) }}">Form &laquo;{{ $form->name }}&raquo; uses</a></li>               
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
{{ Form::open() }}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $formUse->name, ['placeholder'=>'Name', 'class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', $formUse->email, ['placeholder'=>'Email', 'class' => 'form-control']) }}
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('who', 'User role') }}
            {{ Form::select('who', [
                'producer' => 'producer',
                'financier' => 'financier',
                'distributor' => 'distributor',
                'other' => 'other',
            ], $formUse->who, ['class' => 'form-control']) }}
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('status', 'Статус:') }}
            {{ Form::select('status', $statuses, $formUse->status, ['class' => 'form-control']) }}
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('message', 'Message:') }}
            {{ Form::textarea('message', $formUse->message, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="pull-right">
            {{ Form::submit('Save', ['class'=>'btn btn-success btn-flat']) }}
        </div>
    </div>
    {{ Form::close() }}
    
</div>
@stop