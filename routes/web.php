<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebControllers\V1\Frontend\ComicController;
use App\Http\Controllers\WebControllers\V1\Frontend\ChapterController;
use App\Http\Controllers\WebControllers\V1\Frontend\LandingController;
use App\Http\Controllers\WebControllers\V1\Backend\LandingController as AdmLandingController;
use App\Http\Controllers\WebControllers\V1\Backend\ComicController as AdmComicController;
use App\Http\Controllers\AjaxControllers\V1\Backend\ChapterController as AdmChapterController;
use App\Http\Controllers\AjaxControllers\V1\Frontend\ChapterController as FrontendChapterController;
use App\Http\Controllers\WebControllers\V1\Backend\HashtagController as AdmHashtagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/users', function () {
    $users = DB::table('users')->get();
    return view('users', compact('users'));
});

Route::get('/', [LandingController::class, 'index'])->name('landingPage');

Route::group(array('prefix' => 'comics'), function () {
    Route::get('/content/search', [ComicController::class, 'searchByhashTag'])->name('search');
    Route::get('/content/keywork/{hashtag}', [ComicController::class, 'searchByhashTag'])->name('searchByhashTag');
    Route::get('/content/{comic_code}', [ComicController::class, 'show'])->name('comic-info')->middleware('viewed');
    Route::get('/viewer/{comic_code}/chapter/{id}', [ChapterController::class, 'show'])->name('view-comic')->middleware('viewed');

    Route::get('/api', [FrontendChapterController::class, 'show'])->name('show');
});

Route::group(array('prefix' => 'ajax','as'=>'ajax.'), function () {
    Route::group(array('prefix' => 'comics','as' => 'comics.'), function () {
        Route::group(array('prefix' => '{comic_code}/chapters','as' => 'chapters.'), function () {
            Route::get('/{id}', [FrontendChapterController::class, 'show'])->name('show');
        });
    });

});

Route::group(array('prefix' => 'admin'), function () {
    Route::get('/dashboard', [AdmLandingController::class, 'index'])->name('dashboard');
    Route::group(array('prefix' => 'comics','as' => 'comics.'), function () {
        Route::get('/', [AdmComicController::class, 'index'])->name('list');
        Route::get('/create', [AdmComicController::class, 'create'])->name('create');
        Route::get('/edit/{code}', [AdmComicController::class, 'edit'])->name('edit');
        Route::get('/{code}', [AdmComicController::class, 'show']);
        Route::patch('/{code}', [AdmComicController::class, 'update'])->name('patch');
        Route::post('/', [AdmComicController::class, 'store'])->name('store');
        Route::delete('/{code}', [AdmComicController::class, 'destroy'])->name('delete');

        Route::group(array('prefix' => '{comic_code}/chapters','as' => 'chapters.'), function () {
            Route::get('/', [AdmChapterController::class, 'index'])->name('list');
            Route::get('/create', [AdmChapterController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [AdmChapterController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [AdmChapterController::class, 'update'])->name('patch');
            Route::get('/{id}', [AdmChapterController::class, 'show']);
            Route::post('/', [AdmChapterController::class, 'store'])->name('store');
            Route::delete('/{id}', [AdmChapterController::class, 'destroy'])->name('delete');
        });
    });
    Route::group(array('prefix' => 'hashtags','as' => 'hashtags.'), function () {
        Route::get('/', [AdmHashtagController::class, 'index'])->name('list');
        Route::get('/create', [AdmHashtagController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [AdmHashtagController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [AdmHashtagController::class, 'update'])->name('patch');
        Route::get('/{id}', [AdmHashtagController::class, 'show']);
        Route::post('/', [AdmHashtagController::class, 'store'])->name('store');
        Route::delete('/{id}', [AdmHashtagController::class, 'destroy'])->name('delete');
    });
});
