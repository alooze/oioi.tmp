@extends('layouts.film')

@section('block_content')
  <form class="dashboard__info-form" action="{{ $route }}" method="POST" id="film-budget-form" data-form-validate data-form-no-ajax="true">
    {{ csrf_field() }}
    <div class="dashboard__info-form__inner">
      <ul class="dashboard__info__table-list dashboard__info__table-list--budget">
        <li>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
            <p class="dashboard__info-form-descr">
              Total budget, $
              {{-- <i class="icon_info-green icon_info-green--secondary" data-tippy-html='#total-tooltip'></i> --}}
            </p>
            {{ Form::text('total_budget', $film->total_budget, ['data-mask' => 'currency']) }}
            <div class="invalid-feedback total_budget_error"></div>
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
            <p class="dashboard__info-form-descr">
              Financing required, $
              {{-- <i class="icon_info-green icon_info-green--secondary" data-tippy-html='#required-tooltip'></i> --}}
            </p>
            {{ Form::text('fin_required', $film->fin_required, ['data-mask' => 'currency']) }}
            <div class="invalid-feedback"></div>
          </div>
          <div class="dashboard__info-form-wrap dashboard__info-form-wrap--third form-group">
            <p class="dashboard__info-form-descr">
              Financing secured, $
              {{-- <i class="icon_info-green icon_info-green--secondary" data-tippy-html='#secured-tooltip'></i> --}}
            </p>
            {{ Form::text('fin_secured', $film->fin_secured, ['data-mask' => 'currency']) }}
            <div class="invalid-feedback"></div>
          </div>
        </li>
      </ul>
      <div class="dashboard__info-form-wrap dashboard__info-form-btn-wrap dashboard__info-form-btn-wrap--table">
        @if ($next)
          <a href="{{ $film->nextStepHref($step) }}" class="btn btn-primary arrow">Next</a>
        @endif
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@stop

@section('tooltips')
@stop
