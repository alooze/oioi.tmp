@extends('layouts.lte')

@section('title', 'Редактировать данные пользователя')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Главная</a></li>
                <li><a href="{{ route('a.users') }}">Все пользователи</a></li>
                <li class="active">Редактировать данные пользователя</li>
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
                    {{ Form::label('name', 'Имя') }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('new_password1', 'Новый пароль') }}
                    {{ Form::text('new_password1', old('new_password1'), ['class' => 'form-control']) }}
                </div>  
                <div class="form-group">
                    {{ Form::label('new_password2', 'Повтор нового пароля') }}
                    {{ Form::text('new_password2', old('new_password2'), ['class' => 'form-control']) }}
                </div>
                <div class="pull-right">
                    {{ Form::submit('Сохранить', ['class'=>'btn btn-success btn-flat']) }}
                </div>
            <?= Form::close() ?>
        </div>
    </div>

@stop