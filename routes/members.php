<?php

Route::get('/login', 'Auth\\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\\LoginController@login');
Route::post('/logout', 'Auth\\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\\RegisterController@register');

Route::group(['middleware' => 'auth:member', 'namespace' => 'Members'], function () {
    Route::get('/', 'DashboardController@showDashboard')->name('dashboard');
    Route::get('/account', 'AccountController@edit')->name('account.edit');
    Route::put('/account', 'AccountController@update')->name('account.update');

    Route::get('/password', 'PasswordController@edit')->name('password.edit');
    Route::post('/password', 'PasswordController@update')->name('password.update');

    Route::get('/payments', 'PaymentController@index')->name('payments.index');
    Route::post('/payments', 'PaymentController@initiate')->name('payments.initiate');
    Route::post('/payments/complete', 'PaymentController@paid')->name('paid');
    Route::post('/payments/pop', 'PaymentPopController@Upload')->name('payments.pop');

    Route::put('/proof-of-payment', 'ProofOfPaymentController@update')->name('submit.pop');

    Route::group(['prefix' => '/download', 'as' => 'download.'], function () {
        Route::get('/voucher', 'VoucherDownloadController@download')->name('voucher');
        Route::get('/certificate', 'CertificateDownloadController@download')->name('certificate');
        Route::get('/proof-of-purchase', 'PopDownloadController@download')->name('pop');
    });
    //Route::get('/certificates', 'CertificateController@index')->name('certificates.index');
});
