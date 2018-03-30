@extends('layouts.film')

@section('block_content')
<div class="dashboard__info-form">
    @if (!count($producers = $film->personnel('producer')))
    <div class="dashboard__info-form__inner dashboard__info-form__inner--empty">
        <img class="img-responsive dashboard-img-team__empty" src="data:image/png;base64,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"
            width="46">
        <p class="dashboard__empty-descr">No producer is added yet...</p>
        <div class="justify-center">
            <button class="btn btn-secondary" type="button" data-show-modal="add-producer-modal">
                <span class="plus">+</span> Add producer
            </button>
        </div>
    </div>
    @else
    <div class="dashboard__info__table">
        <div class="dashboard__info__table-div">Producer name</div>
        <div class="dashboard__info__table-div">Email</div>
        <div class="dashboard__info__table-div">Action</div>
    </div>
    <div class="dashboard__info-form__inner">
        <ul class="dashboard__info__table-list">
            @foreach ($producers as $P)
            <li>
                <div class="dashboard__info__table-list-name">
                    {{ $P->firstname }} {{ $P->lastname }} {{ ($P->is_me) ? '(you)' : ''}}
                </div>
                <div class="dashboard__info__table-list-email">
                    {{ $P->email }}
                </div>
                <div class="dashboard__info__table-list-action">
                    <button class="btn btn-edit" type="button" id="js__edit-person" data-show-modal="edit-producer-modal" data-pid="{{ $P->id }}">Edit</button>
                    <button class="btn btn-del" type="button" id="js__delete-person" data-show-modal="delete-producer-modal" data-pid="{{ $P->id }}">Delete</button>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="dashboard__info-form-wrap dashboard__info-form-btn-wrap dashboard__info-form-btn-wrap--table">

        <button class="btn btn-secondary" type="button" data-show-modal="add-producer-modal">
            <span class="plus">+</span> Add producer
        </button>
        <a href="{{ $film->nextStepHref($step) }}" class="btn btn-primary arrow">Next</a>
    </div>
    @endif
</div>
@stop

@section('modals')
<div class="modal" id="add-producer-modal">
    <div class="modal-dialog animated">
        <div class="modal-content modal-content--primary">
            <div class="modal-top">
                <h2 class="modal-title-form">Producer</h2>
                <div class="modal-close modal-close--primary" data-hide-modal>
                    <svg width="18" height="18" viewBox="0 0 13.25 13.25">
                        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
                        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
                    </svg>
                </div>
            </div>
            <div class="tabs-wrap">
                <span>Producer is:</span>
                <div class="tabs-list flex" role="tablist">
                    @if (!$film->hasMeAs('producer'))
                    <a href="#form-me" class="active" data-toggle="tab">ME</a>
                    <a href="#form-someone-else" data-toggle="tab">someone else</a>
                    @else
                    <a href="#form-someone-else" class="active" data-toggle="tab">someone else</a>
                    @endif

                </div>
            </div>
            @if (!$film->hasMeAs('producer'))
            <form action="{{ $attachRoute }}" method="POST" class="modal-content__form tab-pane active" id="form-me" data-form-validate
                data-form-no-ajax="true">
                {{ csrf_field() }} {{ Form::hidden('external', $user->id) }}
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">First name *</p>
                    {{ Form::text('firstname', $user->firstname, ['data-rules' => 'required', /*($user->firstname == null) ? '' : 'readonly'*/])
                    }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Last name *</p>
                    {{ Form::text('lastname', $user->lastname, ['data-rules' => 'required', /*($user->lastname == null) ? '' : 'readonly'*/]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Email *</p>
                    {{ Form::email('email', $user->email, ['data-rules' => 'required|valid_email', /*($user->email == null) ? '' : 'readonly'*/]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Mobile number *</p>
                    {{ Form::text('phone', $user->phone, ['data-rules' => 'required|numeric', /*($user->phone == null) ? '' : 'readonly'*/]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Company</p>
                    {{ Form::text('company', $user->company/*, ($user->company == null) ? [] : ['readonly']*/) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Website</p>
                    {{ Form::text('website', $user->website) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Country</p>
                    {{ Form::select('country', $countries, $user->country, ['id' => 'form-me-country', 'data-class-names-container-outer' => 'choices choices_with-border',
                    'data-search-enabled' => 'true', 'data-choices', /*($user->country == null) ? '' : 'readonly', */]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">City</p>
                    {{ Form::select('city', $cities, $user->city, ['id' => 'form-me-city', 'data-class-names-container-outer' => 'choices choices_with-border', 'data-search-enabled'
                    => 'true', 'data-choices'/*, ($user->city == null) ? '' : 'readonly', */]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                    <p class="dashboard__info-form-descr">IMDB link</p>
                    {{ Form::text('imdb_link', $user->imdb_link/*, ($user->imdb_link == null) ? [] : ['readonly']*/) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                    <div class="pull-right flex">
                        <button class="btn btn-l" type="button" data-hide-modal>Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
            @endif

            @if (!$film->hasMeAs('producer'))
            <form action="{{ $attachRoute }}" method="POST" class="modal-content__form tab-pane" id="form-someone-else" data-form-validate
                data-form-no-ajax="true">
            @else
            <form action="{{ $attachRoute }}" method="POST" class="modal-content__form tab-pane active" id="form-someone-else" data-form-validate
                data-form-no-ajax="true">
            @endif
                {{ csrf_field() }} {{ Form::hidden('external', 0) }}
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">First name *</p>
                    {{ Form::text('firstname', '', ['data-rules' => 'required']) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Last name *</p>
                    {{ Form::text('lastname', '', ['data-rules' => 'required']) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Producer's email * </p>
                    {{ Form::email('email', '', ['data-rules' => 'required|valid_email']) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Mobile number *</p>
                    {{ Form::text('phone', '', ['data-rules' => 'required|numeric']) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Company</p>
                    {{ Form::text('company') }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Website</p>
                    {{ Form::text('website') }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Country</p>
                    {{ Form::select('country', $countries, '', [
                        'id' => 'form-someone-else-country',
                        'placeholder' => 'Choose country',
                        'data-class-names-container-outer' => 'choices choices_with-border',
                        'data-search-enabled' => 'true',
                        'data-choices'
                    ]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">City</p>
                    {{ Form::select('city', [], '', ['id' => 'form-someone-else-city', 'placeholder' => 'Choose country first', 'data-class-names-container-outer' => 'choices
                    choices_with-border', 'data-search-enabled' => 'true', 'data-choices' ]) }}

                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                    <p class="dashboard__info-form-descr">IMDB link</p>
                    {{ Form::text('imdb_link') }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                    <div class="pull-right flex">
                        <button class="btn btn-l" type="button" data-hide-modal>Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="edit-producer-modal" data-modal-type="edit">
    <div class="modal-dialog animated">
        <div class="modal-content modal-content--primary">
            <div class="modal-top">
                <h2 class="modal-title-form">Editing producer</h2>
                <div class="modal-close modal-close--primary" data-hide-modal>
                    <svg width="18" height="18" viewBox="0 0 13.25 13.25">
                        <path d="M956.1,3403.37l0.53,0.53L943.9,3416.63l-0.53-.53Z" transform="translate(-943.375 -3403.38)"></path>
                        <path d="M943.9,3403.37l12.728,12.73-0.53.53-12.728-12.73Z" transform="translate(-943.375 -3403.38)"></path>
                    </svg>
                </div>
            </div>
            <div class="tabs-wrap">
                <span>Producer is:</span>
                <div class="tabs-list flex" role="tablist">
                    {{-- @if ($film->hasMeAs('producer')) --}}
                    <a href="#form-me-edit" data-toggle="tab">ME</a>
                    {{-- @endif --}}
                    <a href="#form-someone-else-edit" class="active" data-toggle="tab">Someone else</a>
                </div>
            </div>

            <form action="{{ route('f.films.editPerson', ['id' => $film->id, 'step' => $step]) }}" method="POST" class="modal-content__form tab-pane" id="form-me-edit" data-form-validate data-form-no-ajax="true">
                {{ csrf_field() }}
                {{ Form::hidden('external', $user->id) }}
                {{ Form::hidden('pid') }}
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">First name *</p>
                    {{ Form::text('firstname', $user->firstname, [ 'data-rules' => 'required', /*($user->firstname == null) ? '' : 'readonly'*/]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Last name *</p>
                    {{ Form::text('lastname', $user->lastname, [ 'data-rules' => 'required', /*($user->lastname == null) ? '' : 'readonly'*/]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Email *</p>
                    {{ Form::email('email', $user->email, [ 'data-rules' => 'required|valid_email', /*($user->email == null) ? '' : 'readonly'*/]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Mobile number *</p>
                    {{ Form::text('phone', $user->phone, [ 'data-rules' => 'required|numeric', /*($user->phone == null) ? '' : 'readonly'*/]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Company</p>
                    {{ Form::text('company', $user->company/*, ($user->company == null) ? [] : ['readonly']*/) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Website</p>
                    {{ Form::text('website', $user->website) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Country</p>
                    {{ Form::select('country', $countries, $user->country, [
                        'id' => 'form-me-edit-country',
                        'data-class-names-container-outer' => 'choices choices_with-border',
                        'data-search-enabled' => 'true',
                        'data-choices',
                    ]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">City</p>
                    {{ Form::select('city', $cities, $user->city, [
                        'id' => 'form-me-edit-city',
                        'data-class-names-container-outer' => 'choices choices_with-border',
                        'data-search-enabled' => 'true',
                        'placeholder' => 'Choose country first',
                        'data-choices',
                    ]) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                    <p class="dashboard__info-form-descr">IMDB link</p>
                    {{ Form::text('imdb_link', $user->imdb_link/*, ($user->imdb_link == null) ? [] : ['readonly']*/) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                    <div class="pull-right flex">
                        <button class="btn btn-l" type="button" data-hide-modal>Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('f.films.editPerson', ['id' => $film->id, 'step' => $step]) }}" method="POST" class="modal-content__form tab-pane active" id="form-someone-else-edit" data-form-validate data-form-no-ajax="true">
                {{ csrf_field() }}
                {{ Form::hidden('external', 0) }}
                {{ Form::hidden('pid') }}
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">First name *</p>
                    {{ Form::text('firstname', '', ['data-rules' => 'required']) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Last name *</p>
                    {{ Form::text('lastname', '', ['data-rules' => 'required']) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Producer's Email *
                        @if (false)
                        <span class="icon-verified" data-title="Email is verified by producer"></span>
                        @endif
                    </p>
                    {{ Form::email('email', '', ['data-rules' => 'required|valid_email']) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half form-group">
                    <p class="dashboard__info-form-descr">Mobile number *</p>
                    {{ Form::text('phone', '', ['data-rules' => 'required|numeric']) }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Company</p>
                    {{ Form::text('company') }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Website</p>
                    {{ Form::text('website') }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">Country</p>
                    <div id="js__country-select">
                        {{ Form::select('country', $countries, '', [ 'id' => 'form-someone-else-edit-country', 'placeholder' => 'Choose country',
                        'data-class-names-container-outer' => 'choices choices_with-border', 'data-search-enabled' => 'true',
                        'data-choices', ]) }}
                    </div>
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--half">
                    <p class="dashboard__info-form-descr">City</p>
                    <div id="js__city-select">
                        {{ Form::select('city', [], '', [ 'id' => 'form-someone-else-edit-city', 'data-class-names-container-outer' => 'choices choices_with-border',
                        'data-search-enabled' => 'true', 'data-choices', 'placeholder' => 'Choose country first']) }}
                    </div>
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                    <p class="dashboard__info-form-descr">IMDB link</p>
                    {{ Form::text('imdb_link') }}
                </div>
                <div class="dashboard__info-form-wrap dashboard__info-form-wrap--full">
                    <div class="pull-right flex">
                        <button class="btn btn-l" type="button" data-hide-modal>Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="delete-producer-modal" data-modal-type="delete">
    <div class="modal-dialog animated">
        <div class="modal-content">
            <img class="img-responsive img-mod-del" src="data:image/png;base64,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">
            <h2 class="modal-title">Deleting writer</h2>
            <p class="modal-descr">Do you really want to delete
                <b id="js__delete-person-name"></b> from the list?
            </p>
            <div>
                <form action="{{ route('f.films.dettachPerson', ['id' => $film->id, 'step' => $step]) }}" method="POST">
                    {{ csrf_field() }} {{ Form::hidden('pid', '', ['id' => 'js__delete-person-id']) }}
                    <button class="btn btn-del btn-del--mod" type="submit"> yes, delete</button>
                    <button class="btn btn-not-del-mod" type="button" data-hide-modal> No, don’t delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
