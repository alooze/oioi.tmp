<h2>Distributor One-Step</h2>
    {{
        Form::open([
            'url' => '',
            'id' => 'second-step',
            'method' => 'post'
        ])
    }}

    <div class="form__input-wrap form__input-wrap--modal">
        <input type="radio" name="role" value="producer" id="producer">
        <label for="producer">Producer</label>
        <input type="radio" name="role" value="distributor" id="distributor" checked>
        <label for="distributor">Distributor</label>
        <input type="radio" name="role" value="funder" id="funder">
        <label for="funder">Financial</label>
    </div>
    <div class="form__input-wrap form__input-wrap--modal">
        {{ Form::email('email', '', ['placeholder' => 'Email Adress']) }}
        @if (!empty($email = $errors->get('email')))
            @foreach ($email as $er)
                {{ $er }}
            @endforeach
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
        {{ Form::text('company', '', ['placeholder' => 'Company']) }}
        @if (!empty($company = $errors->get('company')))
            {{ $company[0] }}
        @endif
    </div>
    <button type="submit" id='submit'>Submit</button>
{{ Form::close() }}
