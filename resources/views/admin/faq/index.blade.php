@extends('layouts.lte')

@section('title', 'All FAQ')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li class="active">All Questions</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('a.faq.add') }}" class="btn btn-success btn-flat pull-right">Add Question</a>
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
                    <th>Question</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Comments/Approved</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question_title }}</td>
                    <td>{{ $question->answer_title }}</td>
                    <td>{!! substr($question->answer_content, 0, 100) !!}</td>
                    <td>{{ $statuses[$question->status] }}</td>
                    <td>
                        <a href="{{ route('a.faq.comments', ['id' => $question->id]) }}">
                            {{ count($question->comments) }} / {{ count($question->aproved_comments()) }}
                        </a>
                    </td>
                    <td>{{ $question->created_at }}</td>
                    <td>
                        <a href="{{ route('a.faq.edit', ['id' => $question->id]) }}" class="btn btn-xs btn-success">
                            <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                        </a>
                        <a href="javascript:void(0)" data-href="{{ route('a.faq.delete', ['id' => $question->id]) }}" class="btn btn-danger btn-xs form-item-delete">
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
