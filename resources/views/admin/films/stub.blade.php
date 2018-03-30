@extends('layouts.lte')

@section('title', 'All Films')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li class="active">Films</li>
            </ul>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producer</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Stage</th>
                    <th>Status</th>
                    <th>Date</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach ($films as $film)
                <tr>
                    <td>{{ $film->id }}</td>
                    <td>{{ $film->producer->name }} ({{ $film->producer->email }})</td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->genre }}</td>
                    <td>{{ $film->project_status }}</td>
                    <td>
                        @if ($film->submit == 2)
                        Archieved (Trashed)
                        @elseif ($film->submit == 1)
                        Submitted by producer
                        @else
                        In edit
                        @endif
                    </td>
                    <td>{{ $film->created_at }}</td>
                    <!-- <td>
                        <a href="{{ route('a.faq.edit', ['id' => $film->id]) }}" class="btn btn-xs btn-success">
                            <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                        </a>
                        <a href="javascript:void(0)" data-href="{{ route('a.faq.delete', ['id' => $film->id]) }}" class="btn btn-danger btn-xs form-item-delete">
                            <span class="glyphicon glyphicon-trash"></span>&nbsp;Delete
                        </a>
                    </td> -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop