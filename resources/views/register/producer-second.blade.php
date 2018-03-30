<h2>Producer Second Step</h2>
    {{
        Form::open([
            'url' => '',
            'id' => 'second-step',
            'method' => 'post'
        ])
    }}

    {{ Form::hidden('firstname') }}
    {{ Form::hidden('lastname') }}
    {{ Form::hidden('gender') }}
    {{ Form::hidden('pass') }}
    {{ Form::hidden('pass_rep') }}
    {{ Form::hidden('email') }}

    <div class="form__input-wrap form__input-wrap--modal">
        <input type="radio" name="role" value="producer" id="producer" checked>
        <label for="producer">Producer</label>
        <input type="radio" name="role" value="distributor" id="distributor">
        <label for="distributor">Distributor</label>
        <input type="radio" name="role" value="funder" id="funder">
        <label for="funder">Financial</label>
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::text('company', '', ['placeholder' => 'Company']) }}
        @if (!empty($company = $errors->get('company')))
            {{ $company[0] }}
        @endif
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::text('city', '', ['placeholder' => 'City']) }}

    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::select('country', ['Ukraine' => 'Ukraine', 'USA' => 'USA']) }}

    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::text('website', '', ['placeholder' => 'Website']) }}

    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::tel('phone', '', ['placeholder' => 'Mobile Number']) }}
        @if (!empty($phone = $errors->get('phone')))
            {{ $phone[0] }}
        @endif
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::tel('phone_add', '', ['placeholder' => 'Additional home Number']) }}

    </div>
    <button type="submit" id='first-step'>Prev Step</button>
    <button type="submit" id="submit">Register</button>
{{ Form::close() }}
