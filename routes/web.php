<?php

use App\Http\Controllers\CreateCommunityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Superuser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landpage');
})->name('landing.page');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    })->name('dashboard');

    Route::get('/Community', [HomeController::class, 'comunity'])->name('community');
    Route::get('/About', [HomeController::class, 'about'])->name('about');

    // Profile
    Route::prefix('/Profile')->group(function () {
        Route::get('/Dasboard', [ProfileController::class, 'dasboard'])->name('profile.dasboard');
        Route::get('/Profile', [ProfileController::class, 'profile'])->name('profile.profile');
        Route::get('/Edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/Edit', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/Edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Membuat komunitas
    Route::get('/createcommunity', [CreateCommunityController::class, 'create'])->name('createcommunity.create');
    Route::post('/createcommunity', [CreateCommunityController::class, 'store'])->name('createcommunity.store');

    // Join
    Route::get('/JoinCommunity/{id_komunitas}', [CreateCommunityController::class, 'Join'])->name('Community.join');
    Route::post('/JoinCommunity/{id_komunitas}', [CreateCommunityController::class, 'JoinS'])->name('Community.joinS');
    // unjoin
    Route::get('/JoinCommunity/{id_komunitas}', [CreateCommunityController::class, 'unjoin'])->name('Community.unjoin');
    Route::get('/JoinCommunity/{id_komunitas}', [CreateCommunityController::class, 'unjoinS'])->name('Community.unjoinS');

    // Joined
    Route::prefix('/mycommunity')->group(function () {
        Route::get('/events/{id_komunitas}', [CreateCommunityController::class, 'event'])->name('mycommunity.Event');
        Route::get('/events/{id_komunitas}/{id_kegiatan}', [CreateCommunityController::class, 'isievent'])->name('mycommunity.IsiEvent');
        Route::get('/galery/{id_komunitas}', [CreateCommunityController::class, 'galery'])->name('mycommunity.Galery');
        Route::get('/forum/{id_komunitas}', [CreateCommunityController::class, 'forum'])->name('mycommunity.Forum');
        Route::post('/forums/{id_komunitas}/add-comment', [CreateCommunityController::class, 'forumAdd'])->name('mycommunity.ForumAdd');
    });

    // Admin group
    Route::middleware(['admin_group'])->group(function () {
        // Komunitas
        Route::get('/mycommunity', [CreateCommunityController::class, 'mycommunity'])->name('mycommunity');
        Route::get('/mycommunity/edit/{id_komunitas}', [CreateCommunityController::class, 'edit'])->name('mycommunity.Edit');
        Route::put('/mycommunity/update/{id_komunitas}', [CreateCommunityController::class, 'update'])->name('mycommunity.update');
        Route::get('/mycommunity/update/{id_komunitas}', [CreateCommunityController::class, 'hapus'])->name('mycommunity.Hapus');

        // Event
        Route::get('/mycommunity/add-event/{id_komunitas}', [KegiatanController::class, 'addEvent'])->name('mycommunity.AddEvent');
        Route::post('/mycommunity/add-event/{id_komunitas}', [KegiatanController::class, 'addEventPost'])->name('mycommunity.addEventPost');
        // galery
        Route::get('/mycommunity/add-galery/{id_komunitas}', [KegiatanController::class, 'addGalery'])->name('mycommunity.AddGalery');
        Route::post('/mycommunity/add-galery/{id_komunitas}', [KegiatanController::class, 'addGaleryPost'])->name('mycommunity.addGaleryPost');
        Route::get('/mycommunity/delete-gallery/{id_komunitas}/{id}', [KegiatanController::class, 'deleteGallery'])->name('mycommunity.deleteGallery');

        Route::post('/isievent')->name('layouts.isievent');
        Route::post('/mycommunity/add-Picture/{id_komunitas}/{id}', [KegiatanController::class, 'addPicturePost'])->name('mycommunity.addPicturePost');
        Route::get('/mycommunity/delete-Picture/{id_komunitas}/{id_kegiatan}/{id}', [KegiatanController::class, 'deletePicture'])->name('mycommunity.deletePicture');

        Route::get('/isievent', function () {
            return view('layouts.komunitas.isievent');
        })->name('isievent');
    });

    // Superuser access
    Route::middleware(['superuser'])->group(function () {
        Route::get('/logout', [Superuser::class, 'logout'])->name('Superuser.logout');
        Route::get('/superuser|Home', [Superuser::class, 'Home'])->name('superuser.Home');
        Route::get('/superuser|Kelola', [Superuser::class, 'kelola'])->name('superuser.kelola');
        Route::get('/superuser|User', [Superuser::class, 'user'])->name('superuser.user');
        Route::get('/superuser-Kelola|kegiatan|/{id_kegiatan}', [Superuser::class, 'kegiatan'])->name('superuser.kegiatan');
        Route::get('/superuser-Kelola|kegiatan|Edit/{id_kegiatan}', [Superuser::class, 'editkegiatan'])->name('superuser.edit.kegiatan');
        Route::put('/superuser-Kelola|kegiatan/{id_kegiatan}', [Superuser::class, 'updatekegiatan'])->name('superuser.update.kegiatan');
        Route::get('/superuser-Kelola|kegiatan|hapus/{id_kegiatan}', [Superuser::class, 'hapuskegiatan'])->name('superuser.hapus.kegiatan');

        Route::get('/superuser-Kelola|komunitas|Edit/{id_komunitas}', [Superuser::class, 'editkomunitas'])->name('superuser.edit.komunitas');
        Route::put('/superuser-Kelola|komunitas/{id_komunitas}', [Superuser::class, 'updatekomunitas'])->name('superuser.update.komunitas');
        Route::get('/superuser-Kelola|komunitas|hapus/{id_komunitas}', [Superuser::class, 'hapuskomunitas'])->name('superuser.hapus.komunitas');

        Route::get('/superuser-Kelola|user|Edit/{id_user}', [Superuser::class, 'edituser'])->name('superuser.edit.user');
        Route::put('/superuser-Kelola|user/{id_user}', [Superuser::class, 'updateuser'])->name('superuser.update.user');
        Route::get('/superuser-Kelola|user|hapus/{id_user}', [Superuser::class, 'hapususer'])->name('superuser.hapus.user');
    });
});

// Include SuperUserMiddleware routes
require __DIR__.'/auth.php';
