<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/nova');
   // return view('welcome');
})->name('/');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('choose-role', 'App\Http\Controllers\Auth\ChooseRoleController@chooseRole')->name('choose_role');
Route::get('/invitation/{token}', 'App\Http\Controllers\InviteController@invitation')->name('invitation');

Route::get('/registration/{role}', 'App\Http\Controllers\Auth\RegisterController@registerClient')->name('registration');
Route::post('create-client', 'App\Http\Controllers\Auth\RegisterController@create')->name('create.client');

Route::get('get-organizations', 'App\Api\SiretApi@getOrganizationTitle')->name('get_organizations');

//Api
Route::get('get-token', 'App\Http\Controllers\Api\UsersController@getTokenInvitation')->name('token.invitation');
