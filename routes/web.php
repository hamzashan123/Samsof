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

use App\Http\Controllers\CookieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Post;

Route::get('/accept-cookie-policy', 'CookieController')->name('accept.cookie');

Route::get('/', 'PublicController@home')->name('home');
Route::get('/resources', 'PublicController@resources')->name('resources');
Route::get('/members', 'PublicController@members')->name('members');
Route::get('/who-we-are', 'PublicController@who')->name('who');
Route::get('/congress', 'CongressController@index')->name('congress');
Route::get('/congress/programme', 'CongressController@programme')->name('congress.programme');
Route::get('/congress/speakers', 'CongressController@speakers')->name('congress.speakers');
Route::get('/education', 'PublicController@education')->name('education');
Route::get('/ask', 'PublicController@ask')->name('ask');
Route::get('/cares', 'PublicController@cares')->name('cares');
Route::get('/media', 'PublicController@media')->name('media');
Route::get('/media-releases/{release}', 'ReleaseController@show')->name('release.show');
Route::get('/media-coverage/{coverage}', 'CoverageController@show')->name('coverage.show');
Route::get('/sasmfos-opinions/{opinion}', 'OpinionController@show')->name('opinion.show');
Route::post('/share', 'ShareController@post')->name('share');
Route::get('/privacy-policy', 'PublicController@privacy')->name('privacy');
Route::get('/terms-and-conditions', 'PublicController@terms')->name('terms');
Route::get('/cares/case-study-claude', 'PublicController@case')->name('case');

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');

Route::get('/search', 'SearchController@index')->name('search');

Route::get('password/reset', 'Auth\\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
