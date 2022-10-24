<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Admin;

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

Auth::routes();
Route::get('/logout', function () {
    return redirect()->route('home');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sponsor', [PageController::class, 'sponsor'])->name('laman.sponsor');
Route::get('/experience', [PageController::class, 'experience'])->name('laman.experience');
Route::get('/tentang', [PageController::class, 'tentange'])->name('laman.tentang');
Route::get('/aturan-penggunaan', [PageController::class, 'aturan'])->name('laman.aturan');
Route::get('/kebijakan-privasi', [PageController::class, 'privasi'])->name('laman.privasi');
Route::get('/tim', [PageController::class, 'tim'])->name('laman.tim');
Route::get('/telegram', [PageController::class, 'telegram'])->name('laman.telegram');

Route::name('video.')->prefix('video')->group(function(){
    Route::get('/', [VideoController::class, 'index'])->name('index');
    Route::get('/cari', [VideoController::class, 'search'])->name('search');
    Route::get('/tanda', [VideoController::class, 'tags'])->name('tags');
    Route::delete('/hapustanda', [VideoController::class, 'deletetag'])->name('deletetag');
    Route::get('/{level}', [VideoController::class, 'level'])->name('level');
    Route::get('/nav/{subject}/{priority}', [VideoController::class, 'navigation'])->name('navigation');
    Route::get('/{level}/{group}/{subject}', [VideoController::class, 'subject'])->name('subject');
    Route::get('/{level}/{group}/{subject}/{chapter}/{lesson}', [VideoController::class, 'lesson'])->name('lesson');
    Route::post('/tandai', [VideoController::class, 'tag'])->name('tag');
    Route::post('/suka', [VideoController::class, 'like'])->name('like');
});


//ADMIN
Route::name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [Admin\HomeController::class, 'index'])->name('home');
    Route::get('/login', [Admin\Auth\LoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [Admin\Auth\LoginController::class, 'login'])->name('login');
    Route::get('/logout', [Admin\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [Admin\Auth\RegisterController::class, 'showFormRegister'])->name('register');
    Route::post('/register', [Admin\Auth\RegisterController::class, 'register']);

    //VIDEO
    Route::name('video.')->prefix('video')->group(function(){
        Route::name('level.')->prefix('level')->group(function(){
            Route::get('/create', [Admin\LevelController::class, 'create'])->name('create');
            Route::post('/create', [Admin\LevelController::class, 'store'])->name('store');
            Route::get('/', [Admin\LevelController::class, 'index'])->name('index');
            Route::get('/{id}/edit', [Admin\LevelController::class, 'edit'])->name('edit');
            Route::put('/{id}', [Admin\LevelController::class, 'update'])->name('update');
        });
        Route::name('group.')->prefix('group')->group(function(){
            Route::get('/create', [Admin\GroupController::class, 'create'])->name('create');
            Route::post('/create', [Admin\GroupController::class, 'store'])->name('store');
            Route::get('/', [Admin\GroupController::class, 'index'])->name('index');
            Route::get('/{id}/edit', [Admin\GroupController::class, 'edit'])->name('edit');
            Route::put('/{id}', [Admin\GroupController::class, 'update'])->name('update');
        });
        Route::name('subject.')->prefix('subject')->group(function(){
            Route::get('/create', [Admin\SubjectController::class, 'create'])->name('create');
            Route::post('/create', [Admin\SubjectController::class, 'store'])->name('store');
            Route::get('/', [Admin\SubjectController::class, 'index'])->name('index');
            Route::get('/{subject_id}', [Admin\SubjectController::class, 'chapter'])->name('chapter');
            Route::get('/{id}/edit', [Admin\SubjectController::class, 'edit'])->name('edit');
            Route::put('/{id}', [Admin\SubjectController::class, 'update'])->name('update');
        });
        Route::name('chapter.')->prefix('chapter')->group(function(){
            Route::get('/{subject_id}/create', [Admin\ChapterController::class, 'create'])->name('create');
            Route::post('/create', [Admin\ChapterController::class, 'store'])->name('store');
            Route::get('/', [Admin\ChapterController::class, 'index'])->name('index');
            Route::get('/{chapter_id}', [Admin\ChapterController::class, 'lesson'])->name('lesson');
            Route::get('/{id}/edit', [Admin\ChapterController::class, 'edit'])->name('edit');
            Route::put('/{id}', [Admin\ChapterController::class, 'update'])->name('update');
        });
        Route::name('lesson.')->prefix('lesson')->group(function(){
            Route::get('/{chapter_id}/create', [Admin\VideoController::class, 'create'])->name('create');
            Route::post('/create', [Admin\VideoController::class, 'store'])->name('store');
            Route::get('/', [Admin\VideoController::class, 'index'])->name('index');
            Route::get('/{id}/edit', [Admin\VideoController::class, 'edit'])->name('edit');
            Route::put('/{id}', [Admin\VideoController::class, 'update'])->name('update');
        });
    });
    
});

Route::name('profile.')->prefix('profil')->group(function(){
    Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [ProfileController::class, 'update'])->name('update');
});


