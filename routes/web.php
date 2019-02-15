<?php





// $stripe = resolve('App\Billing\Stripe'); //make or resolve

// dd($stripe);

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/','PostsController@index');


Route::post('/posts','PostsController@store');

Route::get('/posts', 'PostsController@create');
 
Route::get('/posts/tags/{tags}', 'TagsController@index');


Route::get('/register','RegistrationController@create');

Route::post('/register','RegistrationController@store');


Route::get('/login','SessionsController@create');

Route::post('/login','SessionsController@store');

Route::get('/logout','SessionsController@destroy');
