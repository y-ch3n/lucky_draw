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

Route::get('/', 'GuestController@index')->name('result');

//Route::post('register-winning-number', 'WinningNumberController@register')->name('register-winning-number');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/draw-a-prize', 'HomeController@drawAPrize')->name('draw-a-prize');
Route::post('/reset-draw', 'HomeController@resetDraw')->name('reset-draw');

Route::get('/member', 'MemberController@index')->name('member.index');
Route::post('/member/register-winning-number', 'MemberController@register')->name('member.register-winning-number');
