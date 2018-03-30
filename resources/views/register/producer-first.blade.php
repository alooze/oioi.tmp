<h2>Producer First Step</h2>
    {{
        Form::open([
            'url' => '',
            'id' => 'first-step',
            'method' => 'post'
        ])
    }}

    {{ Form::hidden('company') }}
    {{ Form::hidden('city') }}
    {{ Form::hidden('country') }}
    {{ Form::hidden('website') }}
    {{ Form::hidden('phone') }}
    {{ Form::hidden('phone_add') }}

    <div class="form__input-wrap form__input-wrap--modal">
        <input type="radio" name="role" value="producer" id="producer" checked>
        <label for="producer">Producer</label>
        <input type="radio" name="role" value="distributor" id="distributor">
        <label for="distributor">Distributor</label>
        <input type="radio" name="role" value="funder" id="funder">
        <label for="funder">Financial</label>
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::text('firstname', '', ['placeholder' => 'First name']) }}
        @if (!empty($firstname = $errors->get('firstname')))
            {{ $firstname[0] }}
        @endif
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::text('lastname', '', ['placeholder' => 'Last name']) }}
        @if (!empty($lastname = $errors->get('lastname')))
            {{ $lastname[0] }}
        @endif
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female']) }}
        @if (!empty($gender = $errors->get('gender')))
            {{ $gender[0] }}
        @endif
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::input('password', 'pass', '', ['placeholder' => 'Password']) }}
        @if (!empty($pass = $errors->get('pass')))
            {{ $pass[0] }}
        @endif
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::input('password', 'pass_rep', '', ['placeholder' => 'Confirm Password']) }}
        @if (!empty($pass_rep = $errors->get('pass_rep')))
            {{ $pass_rep[0] }}
        @endif
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::email('email', '', ['placeholder' => 'Email Adress']) }}
        @if (!empty($email = $errors->get('email')))
            @foreach ($email as $er)
                {{ $er }}
            @endforeach
        @endif
    </div>
    <button type="submit" id='second-step'>Next Step</button>
{{ Form::close() }}
