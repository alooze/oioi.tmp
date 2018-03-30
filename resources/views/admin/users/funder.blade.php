@extends('layouts.lte')

@section('title', 'Funders')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Главная</a></li>
                <li class="active">Funders</li>
            </ul>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <table  class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>User</th>
                    <th>Other Data</th>
                    <th>Управление</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('a.user.edit', ['id' => $user->id]) }}">
                        {{ $user->name }}
                    </a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->data->firstname }} {{ $user->data->lastname }} <br/> {{ $user->data->gender }}</td>
                    <td>
                        <b>Phone:</b> {{ $user->data->phone }} <br/>
                        {{ $user->data->phone_add }}
                        <b>Company:</b> {{ $user->data->company }} <br/>
                        {{ $user->data->website }} <br/>
                        {{ $user->data->city }} {{ $user->data->country }}
                    </td>
                    <td>
                        {{-- <a href="{{ route('a.user.edit', ['id' => $user->id]) }}" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>&nbsp;Update
                        </a>                             --}}
                        <a href="javascript:void(0)" data-href="{{ route('a.user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-xs page-item-delete">
                            <span class="glyphicon glyphicon-trash page-item-delete" data-href="{{ route('a.user.delete', ['id' => $user->id]) }}"></span>&nbsp;Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
