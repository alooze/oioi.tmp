@extends('layouts.lte')

@section('title', 'All application Email')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                @if (!$emails)
                <li><a href="{{ route('a.emails') }}">Email</a></li>
                <li class="active">Edit</li>
                @else
                <li class="active">Email</li>
                @endif
            </ul>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="row">        
            {{ Form::open(['url' => $action, 'method' => 'post']) }}
                <div class="col-md-2">
                    <div class="form-group">
                        <!-- {{ Form::label('name', 'Имя:') }} -->
                        {{ Form::text('name', $email->name, ['placeholder'=>'Имя', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <!-- {{ Form::label('email', 'Email') }} -->
                        {{ Form::email('email', $email->email, ['placeholder'=>'Email', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-2">
                    {{ Form::submit('Save', ['class'=>'btn btn-success btn-flat']) }}
                </div>
            {{ Form::close()}}
        </div>      
    </div>
</div>

@if ($emails)
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($emails as $email)
                    <tr>
                        <td>
                            <a href="{{ route('a.email.edit', ['id' => $email->id]) }}" class="btn btn-info btn-xs email-item-edit">
                            <span class="glyphicon glyphicon-pencil" data-href="{{ route('a.email.edit', ['id' => $email->id]) }}"></span>
                            </a>&nbsp;

                            <a href="javascript:;" data-href="{{ route('a.email.delete', ['id' => $email->id]) }}" class="btn btn-danger btn-xs email-item-delete">
                            <span class="glyphicon glyphicon-trash" data-href="{{ route('a.email.delete', ['id' => $email->id]) }}"></span></a>&nbsp;

                            {{ $email->email }}
                        </td>
                        <td>{{ $email->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@stop