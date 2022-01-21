<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('releases', 'ReleaseController', [
    'only' => [
        'index', 'show'
    ]
]);

Route::get('/releases/pdf/{release}', 'ReleaseController@pdf')->name('pdf.release');

Route::apiResource('coverages', 'CoverageController', [
    'only' => [
        'index', 'show'
    ]
]);

Route::apiResource('opinions', 'OpinionController', [
    'only' => [
        'index', 'show'
    ]
]);
Route::get('/opinion/pdf/{opinion}', 'OpinionController@pdf')->name('pdf.opinion');

Route::apiResource('photos', 'PhotoController', [
    'only' => [
        'index', 'show'
    ]
]);

Route::apiResource('videos', 'VideoController', [
    'only' => [
        'index', 'show'
    ]
]);

Route::apiResource('documents', 'DocumentController', [
    'only' => [
        'index', 'show'
    ]
]);

Route::apiResource('members', 'MemberController', [
    'only' => [
        'index', 'show'
    ]
]);

Route::put('/approve-pop/{member}', 'PopApproveController@approve')->name('approve.pop');
