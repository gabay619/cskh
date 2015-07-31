<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','HomeController@getIndex');

Route::controller('question', 'QuestionController');

Route::controller('users', 'UsersController');

Route::group(array('before' => 'auth'), function()
{
    \Route::get('elfinder', 'Barryvdh\Elfinder\ElfinderController@showIndex');
    \Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');
});



Route::group(array('prefix' => 'admin'), function(){

Route::get('/',array('as'=>'admin.get-dashboard',function()
{
    return View::make('admin.index');
}));

Route::resource('question', 'AdminQuestionController',
    [ 'names' =>
        [
            'index' => 'admin.question.index',
            'create'=>'admin.question.create',
            'store' => 'admin.question.store',
            'show' => 'admin.question.show',
            'update' => 'admin.question.update',
            'destroy' => 'admin.question.destroy',

        ]
    ]
);
    Route::get('/question/solved/{id}','AdminQuestionController@getResolved');
    Route::post('/question/comment/{id}','AdminQuestionController@postComment');

});

Route::get('/question/update-resolved/{id}','QuestionController@getUpdateResolved');
