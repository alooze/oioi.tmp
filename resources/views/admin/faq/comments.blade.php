@extends('layouts.lte')

@section('title', 'FAQ Question Comments')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Главная</a></li>
                <li><a href="{{ route('a.faq') }}">All Questions</a></li>
                <li><a href="{{ route('a.faq.edit', ['id' => $question->id]) }}">Question {{ $question->id }}</a></li>
                <li class="active">Question Comments</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $question->question_title }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('a.faq.comments.add', ['id' => $question->id]) }}" class="btn btn-success btn-flat pull-right">Add Comment for this question</a>
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
                    <th>Comment</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($question->comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->comment_text }}</td>
                    <td>
                        {{ $comment->user_name }}<br/>
                        {{ $comment->user_email }}<br/>
                        {{ $comment->user_role }}
                    </td>
                    <td>
                        {{ $statuses[$comment->status] }}
                    </td>
                    <td>{{ $comment->updated_at }}</td>
                    <td>
                        <a href="{{ route('a.faq.comments.edit', ['id' => $question->id, 'cid' => $comment->id]) }}" class="btn btn-xs btn-success">
                            <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                        </a>
                        <a href="javascript:void(0)" data-href="{{ route('a.faq.comments.delete', ['id' => $question->id, 'cid' => $comment->id]) }}" class="btn btn-danger btn-xs form-item-delete">
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
