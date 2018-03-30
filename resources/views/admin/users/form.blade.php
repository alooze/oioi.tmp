@extends('layouts.lte')

@section('title', $title)

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li><a href="{{ route('a.users', ['role' => $role]) }}">All {{ str_plural($role) }}</a></li>
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
{{ Form::hidden('role', $role) }}
<div class="row">

    @if ($role == 'manager') 
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
        </div>
    </div>
    @else
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('firstname', 'Firstname') }}
            {{ Form::text('firstname', $user->firstname, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('lastname', 'Lastname') }}
            {{ Form::text('lastname', $user->lastname, ['class' => 'form-control']) }}
        </div>
    </div>
    <!-- <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('mgender', 'Male') }}
            {{ Form::radio('gender', 'Male', ($user->gender == 'Male'), ['id' => 'mgender']) }}
            
            {{ Form::label('fgender', 'Female') }}
            {{ Form::radio('gender', 'Female', ($user->gender == 'Male'), ['id' => 'fgender']) }}
            
        </div>
    </div> -->

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('country', 'Country') }}
            {{ Form::text('country', $user->country, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('city', 'City') }}
            {{ Form::text('city', $user->city, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('company', 'Company') }}
            {{ Form::text('company', $user->company, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', $user->website, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('phone_add', 'Phone alternative') }}
            {{ Form::text('phone_add', $user->phone_add, ['class' => 'form-control']) }}
        </div>
    </div>
    @endif


    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('password', 'New password') }}
            {{ Form::text('password', '', ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 pull-right">
        {{ Form::submit('Save', ['class'=>'btn btn-success btn-flat']) }}
    </div>
</div>
{{ Form::close() }}
@stop