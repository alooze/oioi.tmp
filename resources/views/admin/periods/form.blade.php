@extends('layouts.lte')

@section('title', 'Set period end date and time')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('a.start') }}">Admin start</a></li>
                <li class="active">Set period end</li>
            </ul>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- <div class="row">
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
        </div> -->
        <div class="row">        
            {{ Form::open(['url' => $action, 'method' => 'post']) }}
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('period_end', 'Period end:') }}
                        {{ Form::text('period_end', $period->value, ['placeholder'=>'Period end', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('save', '&nbsp;') }}<br>
                        {{ Form::submit('Save', ['class'=>'btn btn-success btn-flat']) }}
                    </div>
                </div>
                <div class="col-md-12">&nbsp;</div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('email_days', 'Number of days before the end of the period for sending emails:') }}
                        {{ Form::number('email_days', $email->value, ['placeholder'=>'Number of days', 'class' => 'form-control', 'min' => '1']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('save', '&nbsp;') }}<br>
                        {{ Form::submit('Save', ['class'=>'btn btn-success btn-flat']) }}
                    </div>
                </div>
            {{ Form::close()}}
        </div>      
    </div>
</div>
@stop

@section('custom_js')
<script src="{{ asset('vendor/qwertcms/bootstrap_datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
$(function() {
    $('#period_end').datetimepicker({
        format: 'yyyy/mm/dd hh:ii',
        autoclose: true
        // todayBtn: true,
        // minView: 'month', 
    });
});
</script>
@stop