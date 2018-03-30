@extends('layouts.lte')

@section('title', 'Data from form &laquo;' . $form->name . '&raquo;')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li class="active">{{ $form->name }}</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (request()->route()->getName() == 'ar.relations.all')
            <!-- <a href="{{ route('ar.relations', ['slug' => $slug]) }}" class="btn btn-info btn-flat" style="margin-right:15px;">Показать без удаленных</a>
            <a href="{{ route('ar.relations.exportall', ['slug' => $slug]) }}" class="btn btn-warning btn-flat">Экспорт заявок</a> -->
            @else
            <!-- <a href="{{ route('ar.relations.all', ['slug' => $slug]) }}" class="btn btn-info btn-flat" style="margin-right:15px;">Показать все</a>
            <a href="{{ route('ar.relations.export', ['slug' => $slug]) }}" class="btn btn-warning btn-flat">Экспорт заявок</a> -->
            @endif

            {{-- <a href="{{ route('ar.relations.add', ['slug' => $slug]) }}" class="btn btn-success btn-flat pull-right">Добавить запись</a> --}}

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
                    <th>Date</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Controll</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formUses as $formUse)
                <tr>
                    <td>{{ $formUse->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ ucfirst($formUse->data['who']) }}</td>
                    <td>{{ $formUse->data['name'] }}</td>
                    <td>{{ $formUse->data['email'] }}</td>
                    <td>{{ $formUse->data['message'] }}</td>
                    <td>
                        <a href="{{ route('ar.relations.edit', ['slug' => $slug, 'id' => $formUse->id]) }}" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>&nbsp;Изменить
                        </a>
                        <a href="javascript:void(0)" data-href="{{ route('ar.relations.delete', ['id' => $formUse->id]) }}" class="btn btn-danger btn-xs form-item-delete">
                            <span class="glyphicon glyphicon-trash"></span>&nbsp;Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
