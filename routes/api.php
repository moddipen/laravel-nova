<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * Login
 */
Route::post('login', 'Auth\LoginController');

/*
 * About the user
 */
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'AuthController@details');
});

/*
 * Register
 */
Route::prefix('register')
    ->group(function () {
        Route::post('', 'Auth\RegisterController');

        Route::post('validate-email', 'Auth\ValidateEmailController');
        Route::post('company', 'Auth\AttachCompanyController');
    });

/*
 * Country
 */
Route::resource('countries', 'Country\CountryController')->only([
    'index', 'show',
]);

/*
 * User
 */
Route::resource('user', 'UserController')->only([
    'show',
]);

/*
 * Company
 */
Route::resource('companies', 'Company\CompanyController')->only([
    'index', 'show',
]);

/*
 * Business Categories
 */
Route::resource('business-categories', 'BusinessCategory\BusinessCategoryController')->only([
    'index', 'show',
]);

/*
 * Event
 */
Route::prefix('events')->namespace('Event')
//    ->middleware('auth:api')
    ->group(function () {
        Route::get('', 'EventController@index');
        Route::get('{id}', 'EventController@show');
        Route::get('{event}/items', 'EventItemController@index');

        Route::post('{event}/subscribe', 'SubscribeToEventController');

        Route::get('{event}/attendees', 'EventAttendeesController@index');
        Route::post('{event}/attend', 'EventAttendeesController@store');

        Route::post('{event}/comment', 'EventCommentController');
    });

/*
 * Post
 */
Route::prefix('posts')->namespace('Post')
//    ->middleware('auth:api')
    ->group(function () {
        Route::get('', 'PostController@index');
        Route::get('{post}', 'PostController@show');
        Route::get('{id}/related', 'RelatedPostsController');
    });

/*
 * Gender
 */
Route::resource('genders', 'Gender\GenderController')->only([
    'index', 'show',
]);

Route::prefix('pages')
//    ->middleware('auth:api')
    ->group(function () {
        Route::get('terms-of-services', function () {
            return response()->json([
                'content' => '<p>Quid securi etiam tamquam eu fugiat nulla pariatur. Ab illo tempore, ab est sed immemorabili. Cum ceteris in veneratione tui montes, nascetur mus. Inmensae subtilitatis, obscuris et malesuada fames.</p>
<p>Morbi odio eros, volutpat ut pharetra vitae, lobortis sed nibh. At nos hinc posthac, sitientis piros Afros. Mercedem aut nummos unde unde extricat, amaras. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Nec dubitamus multa iter quae et nos invenerat. Curabitur blandit tempus ardua ridiculus sed magna.</p>
<p>Quae vero auctorem tractata ab fiducia dicuntur. Quisque placerat facilisis egestas cillum dolore. Non equidem invideo, miror magis posuere velit aliquet. Gallia est omnis divisa in partes tres, quarum.</p>
<p>Integer legentibus erat a ante historiarum dapibus. Fictum, deserunt mollit anim laborum astutumque! Quo usque tandem abutere, Catilina, patientia nostra? Quis aute iure reprehenderit in voluptate velit esse. Plura mihi bona sunt, inclinet, amari petere vellent.</p>
<p>Pellentesque habitant morbi tristique senectus et netus. Curabitur est gravida et libero vitae dictum. Etiam habebis sem dicantur magna mollis euismod.</p>',
                ]);
        });
    });
