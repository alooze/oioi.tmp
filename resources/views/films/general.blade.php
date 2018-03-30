@extends('layouts.film')

@section('block_content')
<form class="dashboard__info-form" action="{{ $route }}" method="POST" enctype="multipart/form-data" data-form-validate data-form-no-ajax="true">
    {{ csrf_field() }}
    <div class="dashboard__info-form__inner">
        <h3 class="dashboard__info-form-title">Project</h3>
        <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
            <p class="dashboard__info-form-descr">Title</p>
            {{ Form::text('title', $film->title, ['data-rules' => 'required']) }}
        </div>
        <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
            <p class="dashboard__info-form-descr">Screenplay based on</p>
            {{ Form::select('based_on', $film->getVars('based_on', [
                'Novel' => 'Novel',
                'True Story' => 'True Story',
                'Established Work' => 'Established Work',
                'Real Events' => 'Real Events',
                'Fiction' => 'Fiction',
             ]), $film->based_on, [
                'placeholder' => 'Choose or type yours',
                'data-rules' => 'required',
                'data-choices',
                'data-class-names-container-outer' => 'choices choices_with-border',
                'data-search-enabled' => 'true',
                'data-add-items' => 'true'
            ]) }}
        </div>
        <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
            <p class="dashboard__info-form-descr">Country of production</p>
            {{ Form::select('country', $film->getVars('country', $countries), $film->country, [
                'placeholder' => 'Choose or type yours',
                'data-rules' => 'required',
                'data-choices',
                'data-class-names-container-outer' => 'choices choices_with-border',
                'data-search-enabled' => 'true',
                'data-add-items' => 'true'
            ]) }}
        </div>
        <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
            <p class="dashboard__info-form-descr">Project status</p>
            {{ Form::select('project_status', [
                'Development' => 'Development',
                'Announced' => 'Announced',
                'Pre-production' => 'Pre-production',
                'Filming' => 'Filming',
                'Post-production' => 'Post-production',
                'Completed' => 'Completed',
                // 'Released' => 'Released',
            ], $film->project_status, [
                'placeholder' => 'Choose',
                'data-rules' => 'required',
                'data-choices',
                'data-class-names-container-outer' => 'choices choices_with-border'
            ]) }}
        </div>
        <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
            <p class="dashboard__info-form-descr">Genre</p>
            {{ Form::select('genre', $film->getVars('genre', [
                'Action' => 'Action',
                'Animation' => 'Animation',
                'Comedy' => 'Comedy',
                'Documentary' => 'Documentary',
                'Family' => 'Family',
                'Film-Noir' => 'Film-Noir',
                'Horror' => 'Horror',
                'Musical' => 'Musical',
                'Romance' => 'Romance',
                'Sport' => 'Sport',
                'War' => 'War',
                'Biography' => 'Biography',
                'Crime' => 'Crime',
                'Drama' => 'Drama',
                'Fantasy' => 'Fantasy',
                'History' => 'History',
                'Music' => 'Music',
                'Mystery' => 'Mystery',
                'Sci-Fi' => 'Sci-Fi',
                'Thriller' => 'Thriller',
                'Western' => 'Western',
            ]), $film->genre, [
                'placeholder' => 'Choose or type yours',
                'data-rules' => 'required',
                'data-choices',
                'data-class-names-container-outer' => 'choices choices_with-border',
                'data-search-enabled' => 'true',
                'data-add-items' => 'true'
            ]) }}
        </div>
        <h3 class="dashboard__info-form-title">Elevator Pitch
            <i class="icon_info-green" data-tippy-html='#pitch-tooltip'></i>
        </h3>
        <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
            <p class="dashboard__info-form-descr">Link on a pitch (max 3 min)</p>
            {{ Form::text('pitch_link', $film->pitch_link) }}
        </div>
        <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
            <p class="dashboard__info-form-descr">Password (if link is secured)</p>
            {{ Form::text('pitch_pass', $film->pitch_pass) }}
        </div>
        @if ($film->pitch_file != null)
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half dashboard__info-file active">
                <div class="form__file-previews">
                    <i class="fa fa-close" aria-hidden="true"></i>
                    {{ $film->getFileName('pitch_file') }}
                </div>
        @else
            <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half dashboard__info-file">
                <div class="form__file-previews">
                </div>
        @endif
                <span>or</span>
                {{ Form::hidden('pitch_file', $film->pitch_file, ['class'=>'file_placeholder']) }}
                <input type="file" name="pitch_file_input" id="dashboard__info-upload">
                <label for="dashboard__info-upload">Upload a file</label>
            </div>
        </div>
        <div class="dashboard__info-form-wrap dashboard__info-form-btn-wrap">
            @if ($next)
              <a href="{{ $film->nextStepHref($step) }}" class="btn btn-primary arrow">Next</a>
            @endif
            <button type="submit" class="btn btn-primary">Save</button>
            {{--@if (!$next)
                <button type="submit" class="btn btn-primary">Save</button>
            @else
                <a href="{{ $film->nextStepHref($step) }}" class="btn btn-primary arrow">Next</a>
            @endif
            --}}
        </div>
</form>
@stop

@section('tooltips')
<template id="pitch-tooltip">
    <button class="tooltip-close">
        <svg width="13.25" height="13.25" viewBox="0 0 13.25 13.25">
            <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
            <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
        </svg>
    </button>
    <p class="tooltip-text">Please, provide a short video, where you are introducing your project.</p>
</template>
@stop
