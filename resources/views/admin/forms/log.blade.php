@extends('layouts.lte')

@section('title', 'Form use info')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li><a href="{{ route('a.forms') }}">All application forms</a></li>               
                <li class="active">Form use info &laquo;{{ $form->name }}&raquo;</li>
            </ul>
        </div>
    </div>
@stop

@section('content')
    <!-- <div class="row">
        <div class="col-md-3">
            <a href="{{ route('a.form.export', ['id' => $form->id]) }}" class="btn btn-success btn-xs btn-flat"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Экспорт</a>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Info</th>
                        <th>Send date</th>
                    </tr>
                </thead>
                <tbody>
                @if ($form->uses)
                @foreach ($form->uses as $info)
                    <tr>
                        <td>{{ dump(json_decode($info->json, true)) }}</td>
                        <td>{{ $info->created_at }}</td>
                    </tr>   
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop