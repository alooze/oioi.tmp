<?php
Route::get('/', ['as' => 'f.start', 'uses' => 'FrontController@index']);
Route::post('contact', ['as' => 'f.contact', 'uses' => 'FrontController@contact']);

// Register&Auth on front
Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function() {
    Route::get('/', ['as' => 'f.auth', 'uses' => 'Auth\LoginController@loginForm']);
    Route::get('register', ['as' => 'f.auth.register', 'uses' => 'Auth\RegisterController@registerForm']);
    Route::get('forgot', ['as' => 'f.auth.forgot', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::get('reset/{token}', ['as' => 'f.auth.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('reset', ['as' => 'f.auth.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::group(['prefix' => 'api'], function() {
    Route::get('countries', ['as' => 'ajax.countries', 'uses' => 'CountryController@getCountries']);
    Route::get('cities', ['as' => 'ajax.cities', 'uses' => 'CountryController@getCities']);

  // Register&Auth on front
    Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function() {
        Route::post('login', ['as' => 'f.auth.login', 'uses' => 'Auth\LoginController@procLogin']);
        Route::post('register', ['as' => 'f.auth.register.post', 'uses' => 'Auth\RegisterController@procRegister']);
        Route::post('forgot', ['as' => 'f.auth.forgot.post', 'uses' => 'Auth\ForgotPasswordController@checkAndEmail']);
    });

    // Route::group(['prefix' => 'films', 'middleware' => 'setRole'], function() {
    //     Route::get('{id}/getData', ['as' => 'f.films.getData', 'uses' => 'NewFilmController@getData']);
    //
    // });
});
Route::get('api/films/{id}/getData', ['as' => 'f.films.getData', 'uses' => 'NewFilmController@getData']);
Route::get('api/films/userData', ['as' => 'f.films.userData', 'uses' => 'NewFilmController@getUserData']);



// Social auth testing
Route::get('soctest', 'AuthController@soc');
Route::group(['middleware' => 'guest'], function() {
   // Авторизация через соцсети - редирект на шлюз
    Route::get('/socialite/{provider}', ['as' => 'f.auth.social', 'uses' => 'AuthController@redirect']);

    // Авторизация через соцсети - возврат со шлюза
    Route::get('/socialite/{provider}/callback', ['as' => 'f.auth.social.callback', 'uses' => 'AuthController@callback']);
});

// twitter очень хочет 2 страницы
Route::get('tos', 'GarbageController@tos');
Route::get('privacy', 'GarbageController@privacy');



Route::group(['middleware' => 'auth'], function() {
    // logout
    Route::post('logout', ['as' => 'f.auth.logout', 'uses' => 'Auth\LoginController@logout']);

    // update profile on first time social auth
    Route::get('firsttime', ['as' => 'f.auth.social_first', 'uses' => 'AuthController@firstTime']);
    Route::post('firsttime', ['as' => 'f.auth.first_update', 'uses' => 'AuthController@firstUpdate']);

    // user profile
    Route::group(['prefix' => 'profile', 'middleware' => 'setRole'], function() {
        Route::get('/', ['as' => 'f.profile', 'uses' => 'ProfileController@index']);
        Route::post('update', ['as' => 'f.profile.update', 'uses' => 'ProfileController@update']);
    });

    // user films
    Route::group(['prefix' => 'films', 'middleware' => 'setRole'], function() {
        Route::get('{id}/getPerson', ['as' => 'f.films.getPerson', 'uses' => 'FilmController@getPerson']);
        Route::post('add/{step}/attach', ['as' => 'f.films.attachFirst', 'uses' =>'FilmController@attachFirst']);
        Route::post('{id}/{step}/attach', ['as' => 'f.films.attachPerson', 'uses' =>'FilmController@attachPerson']);
        Route::post('{id}/{step}/edit', ['as' => 'f.films.editPerson', 'uses' =>'FilmController@editPerson']);
        Route::post('{id}/{step}/dettach', ['as' => 'f.films.dettachPerson', 'uses' =>'FilmController@dettachPerson']);

        Route::get('/', ['as' => 'f.films', 'uses' => 'FilmController@index']);

        Route::get('add/{step}', ['as' => 'f.films.add', 'uses' =>'FilmController@add']);
        Route::post('add/{step}', ['as' => 'f.films.create', 'uses' =>'FilmController@create']);

        Route::get('{id}/preview', ['as' => 'f.films.preview', 'uses' =>'FilmController@preview']);
        Route::get('{id}/submit', ['as' => 'f.films.submit', 'uses' =>'FilmController@submit']);
        Route::get('{id}/delete', ['as' => 'f.films.delete', 'uses' =>'FilmController@delete']);
        Route::get('{id}/{step}', ['as' => 'f.films.edit', 'uses' =>'FilmController@edit']);
        Route::post('{id}/{step}', ['as' => 'f.films.update', 'uses' =>'FilmController@update']);
    });
});

Route::get('confirm-invitation/{code}', ['as' => 'f.confirm-role', 'uses' => 'FrontController@confirmRole']);

Route::group(['prefix' => 'faq'], function() {
    Route::post('comment', ['as' => 'f.faq.comment.post', 'uses' => 'FaqCommentsController@frontComment']);
    Route::post('guestcomment', ['as' => 'f.faq.comment.guest.post', 'uses' => 'FaqCommentsController@frontGuestComment']);
});
