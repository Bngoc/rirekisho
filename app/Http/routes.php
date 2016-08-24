<?php

use Vinkla\Hashids\Facades\Hashids;

Route::controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password' => '\App\Http\Controllers\Auth\PasswordController',
]);

Route::group(['middleware' => ['auth', 'App\Http\Middleware\ApplicantMiddleware']], function () {
    Route::resource('CV', 'CVController', ['except' => ['index', 'show']]);

    Route::get('CV/info', 'CVController@getInfo');
    // show create cv no id, or show cv upload with id
    Route::get('CV/create/upload/', 'CVController@getCreateUpload');
    Route::get('CV/upload/{id}/edit', 'CVController@getEditUpload');
});

// gioi han quyen voi aplication
Route::group(['middleware' => ['auth', 'App\Http\Middleware\VisitorMiddleware']], function () {
    //Route::get('CV/search', 'CVController@search');
    //Route::get('CV/search1', 'CVController@search1');

    Route::get('CV', 'CVController@index');
    Route::get('CV/{CV}/getPDF', 'CVController@getPDF');
    Route::post('CV/changeStatus', 'CVController@changeStatus');
    Route::post('CV/adSearch', 'CVController@adSearch');
    Route::post('cv/actnotes/{id}', ['as'=>'cv.active.notes', 'uses' => 'CVController@postActNotes']);

    Route::get('CV/statistic', 'CVController@statistic');
    Route::post('CV/statisticSearch', 'CVController@statisticSearch');
    Route::post('CV/statisticStatus', 'CVController@statisticStatus');
    Route::get('CV/downloadCV/{type}', 'CVController@downloadCV');
});

Route::group(['middleware' => ['auth']], function () {
    Route::bind('User', function ($id) {
        if (count(Hashids::decode($id)) == 0) {
            abort(404, 'Lỗi, Không tìm thấy trang');
        }
        return Hashids::decode($id)[0];
    });
    Route::bind('Bookmark', function ($id) {
        if (count(Hashids::decode($id)) == 0) {
            abort(404, 'Lỗi, Không tìm thấy trang');
        }
        return Hashids::decode($id)[0];
    });
    Route::bind('CV', function ($id) {
        if (count(Hashids::decode($id)) == 0) {
            abort(404, 'Lỗi, Không tìm thấy trang');
        }
        return Hashids::decode($id)[0];
    });
    Route::get('profile', 'UsersController@profile');
    Route::get('/', function () {
        if (Auth::user()->getRole() === 'Applicant'){
            return view('xCV.CVInfo');
        }
        return Redirect::action('CVController@index');
    });

    //every one see different page 
    Route::get('CV/{CV}', 'CVController@show')->where('id', '^(?!search).*');
    Route::get('CV/show/{id}', 'CVController@show1');
    Route::get('CV/upload/{id}', 'CVController@getShowUpload');
    Route::get('Record/index/{type}', 'RecordController@index');
    Route::get('User/logout', 'UsersController@getUserLogout');

    Route::group(['prefix' => 'position','as'=>'position::'], function () {
        Route::get('/list/{id?}',['as' => 'list','uses' =>'PositionsController@index']);
        Route::get('/add', ['as' => 'getaddposition', 'uses' => 'PositionsController@add']);
        Route::post('/add', ['as' => 'postaddposition', 'uses' => 'PositionsController@create']);
        Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'PositionsController@edit'])->where(['id'=>'[0-9]+']);
        Route::post('/{id}/edit', ['as' => 'update', 'uses' => 'PositionsController@update'])->where(['id'=>'[0-9]+']);
        Route::get('/{id}/delete',['as'=>'delete','uses'=>'PositionsController@delete'])->where(['id'=>'[0-9]+']);
        Route::get('/{id}/view',['as'=>'view','uses'=>'PositionsController@view'])->where(['id'=>'[0-9]+']);
    });
    Route::resource('positions', 'PositionsController');
    Route::group(['prefix' => 'slide','as'=>'slide::'], function () {
        Route::get('/list', ['as' => 'list', 'uses' => 'FrontEnd\SlideController@index']);
        Route::get('/add', ['as' => 'addSlide', 'uses' => 'FrontEnd\SlideController@add']);
        Route::post('/add', ['as' => 'postSlide', 'uses' => 'FrontEnd\SlideController@create']);
        Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'FrontEnd\SlideController@edit']);
        Route::post('/{id}/edit', ['as' => 'update', 'uses' => 'FrontEnd\SlideController@update']);
    });
    Route::group(['prefix' => 'fgeneral','as'=>'fgeneral::'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'FrontEnd\FGeneralController@index']);
        Route::post('/', ['as' => 'update', 'uses' => 'FrontEnd\FGeneralController@update']);
    });
    Route::resource('groups', 'GroupsController');
    Route::post('/groups/getUsername', [
        'as' => 'groups.getUsername',
        'uses' => 'GroupsController@getUsername',
    ]);
    Route::post('/groups/updateListMember', [
        'as' => 'groups.updateListMember',
        'uses' => 'GroupsController@updateListMember',
    ]);

    //admin only
    Route::get('User/search', 'UsersController@search');

    Route::resource('User', 'UsersController', ['except' => ['create']]);
    Route::resource('Bookmark', 'BookmarkController', ['except' => ['store', 'destroy', 'create', 'edit']]);
    Route::resource('Record', 'RecordController');
    Route::resource('Skill', 'SkillController');

    Route::group(['prefix' => 'status','as'=>'status::'], function () {
        Route::get('/list/{id?}',['as' => 'list','uses' =>'StatusController@index']);
        Route::get('/add', ['as' => 'getaddstatus', 'uses' => 'StatusController@add']);
        Route::post('/add', ['as' => 'postaddstatus', 'uses' => 'StatusController@create']);
        Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'StatusController@edit'])->where(['id'=>'[0-9]+']);
        Route::post('/{id}/edit', ['as' => 'update', 'uses' => 'StatusController@update'])->where(['id'=>'[0-9]+']);
        Route::get('/{id}/delete',['as'=>'delete','uses'=>'StatusController@delete'])->where(['id'=>'[0-9]+']);
        Route::get('/{id}/view',['as'=>'view','uses'=>'StatusController@view'])->where(['id'=>'[0-9]+']);
    });

    Route::resource('status', 'StatusController');
    // thong ke user
    Route::resource('statistics/user', 'StatisticsUserController');

    //add user - delete
    Route::group(['prefix' => 'user'], function () {
        Route::get('/add', ['as' => 'getadduser', 'uses' => 'UsersController@getAddUser']);
        Route::post('/add', ['as' => 'postadduser', 'uses' => 'UsersController@postAddUser']);
        Route::get('/{listid}/del', ['as' => 'getdeluser', 'uses' => 'UsersController@getDel']);
    });

    Route::post('emails/getEmailAddress', [
        'as' => 'emails.getEmailAddress',
        'uses' => 'EmailsController@getEmailAddress',
    ]);
    Route::get('emails/create', [
        'as' => 'emails.create',
        'uses' => 'EmailsController@create',
    ]);
    Route::post('emails/send', [
        'as' => 'emails.send',
        'uses' => 'EmailsController@send',
    ]);
    Route::post('emails/createFormEmail', [
        'as' => 'emails.createFormEmail',
        'uses' => 'EmailsController@createFormEmail',
    ]);
    Route::post('emails/sendEmail1', [
        'as' => 'emails.sendEmail1',
        'uses' => 'EmailsController@sendEmail1',
    ]);



});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@myLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//FrontEnd
route::get('/', 'FrontEnd\WellController@index');
route::post('/contact','FrontEnd\WellController@sendMailContact');