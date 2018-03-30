@extends('layouts.lte')

@section('title', ucfirst($role) . ' users')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li class="active">All {{ str_plural($role) }}</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('a.user.add', ['slug' => $role]) }}" class="btn btn-success btn-flat pull-right">Add {{ $role }}</a>
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
                    @if ($role == 'manager') 
                    <th>Name</th>
                    @else
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Company</th>
                    <th>Website</th>
                    <th>Phone</th>
                    <th>Phone alt</th>
                    @endif
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    @if ($role == 'manager')
                    <td><a href="{{ route('a.user.edit', ['role' => $role, 'id' => $user->id]) }}">
                        {{ $user->name }}
                    </a></td>
                    @else
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->country }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->company }}</td>
                    <td>{{ $user->website }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->phone_add }}</td>
                    @endif
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('a.user.edit', ['role' => $role, 'id' => $user->id]) }}" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>&nbsp;Update
                        </a>
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
