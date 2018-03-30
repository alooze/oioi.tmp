@extends('layouts.lte')

@section('title', 'Create ' . $role . ' user')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li><a href="{{ route('a.users', ['role' => $role]) }}">All {{ str_plural($role) }}</a></li>
                <li class="active">New {{ $role }} create</li>
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

@if ($role == 'manager') 
<p>*New default password for user is <b>adminadmin</b></p>
@endif

{{ Form::open() }}
<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
        </div>
    </div>

            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', old('email'), ['class' => 'form-control']) }}
            </div>
            <!-- <div class="form-group">
                {{ Form::label('roles', 'Роль') }}
                {{ Form::text('roles', old('roles'), ['class' => 'form-control']) }}
            </div> -->
            <div class="pull-right">
                {{ Form::submit('Create', ['class'=>'btn btn-success btn-flat']) }}
            </div>
    </div>
</div>
{{ Form::close() }}
@stop