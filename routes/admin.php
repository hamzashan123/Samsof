<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('/staff', 'StaffController');
    /* Route::resource('/posts', 'PostController'); */
    /* Route::resource('/categories', 'CategoryController'); */
    Route::resource('/events', 'EventController');
    Route::get('/calendar', 'CalendarController@index')->name('calendar');
    /* Route::resource('/medias', 'MediaController'); */
    Route::resource('/releases', 'ReleaseController');
    Route::resource('/coverages', 'CoverageController');
    Route::resource('/opinions', 'OpinionController');

    Route::resource('/photos', 'PhotoController');
    Route::resource('/documents', 'DocumentController');
    Route::resource('/videos', 'VideoController');
    Route::resource('/images', 'ImageController');

    Route::post('/upload', 'UploadController@temp')->name('upload');
    Route::post('/pdf-upload', 'PdfUploadController@store')->name('pdf.upload');

    Route::group(['prefix' => '/members'], function () {
        Route::get('/{member}/approve', 'MemberApprovalController@showApproval')->name('members.approve');
        Route::post('/{member}/approve', 'MemberApprovalController@approve');
        Route::get('/{member}/pop/download', 'MemberPopController@download')->name('members.pop.download');
        Route::delete('/{member}/pop', 'MemberPopController@destroy')->name('members.pop.destroy');
        Route::get('/export', 'MemberExportController@download')->name('members.export');
    });

    Route::resource('/announcements', 'AnnouncementsController');

    Route::resource('/members', 'MemberController');
    Route::resource('/countries', 'CountryController', [
        'except' => ['show'],
    ]);
    Route::resource('/cities', 'CityController', [
        'except' => ['show'],
    ]);
    Route::resource('/hospitals', 'HospitalController', [
        'except' => ['show'],
    ]);
});
