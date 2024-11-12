<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingMenuController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\LoadNavbarMiddleware;
use App\Http\Middleware\PenggunaMiddleware;
use App\Http\Middleware\StaffMiddleware;

use App\Http\Controllers\sosial\CommentsController;
use App\Http\Controllers\sosial\LikesController;
use App\Http\Controllers\sosial\PostsController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        return view('home');
});
Route::get('/about', function () {
        return view('about');
});
Route::get('/news', function () {
        return view('news');
});

Route::get('/auth-page', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Hanya bisa diakses oleh yang sudah regis
Route::middleware([GuestMiddleware::class])->group(function () {
});
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout']);

// Hanya bisa diakses oleh Admin
Route::middleware([AdminMiddleware::class, LoadNavbarMiddleware::class])->group(function () {
        Route::get('/dashboard/admin', [DashboardController::class, 'index_admin']);
        Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
        Route::post('/user/simpan', [UserController::class, 'simpan'])->name('user.simpan');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        
        Route::get('/menu/index', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/menu/delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');

        Route::get('/role/index', [JenisUserController::class, 'index'])->name('role.index');
        Route::post('/role/simpan', [JenisUserController::class, 'simpan'])->name('role.simpan');
        // Route::post('role/store', [JenisUserController::class, 'store'])->name('role.store');
        Route::get('role/edit/{id}', [JenisUserController::class, 'edit'])->name('role.edit');
        Route::post('role/update/{id}', [JenisUserController::class, 'update'])->name('role.update');
        Route::get('role/delete/{id}', [JenisUserController::class, 'delete'])->name('role.delete');

        Route::get('/menu/{menu_link}/{id}', [MenuController::class, 'show'])->name('menu.show');

        Route::get('/aksesmenu/index', [SettingMenuController::class, 'index'])->name('Aksesmenu.index');
        Route::get('/aksesmenu/create', [SettingMenuController::class, 'create'])->name('Aksesmenu.create');
        Route::post('/aksesmenu/store', [SettingMenuController::class, 'store'])->name('Aksesmenu.store');
        Route::get('/aksesmenu/edit/{id}', [SettingMenuController::class, 'edit'])->name('Aksesmenu.edit');
        Route::post('/aksesmenu/update/{id}', [SettingMenuController::class, 'update'])->name('Aksesmenu.update');
        Route::get('/aksesmenu/delete/{id}', [SettingMenuController::class, 'delete'])->name('Aksesmenu.delete');
});

Route::middleware([LoadNavbarMiddleware::class])->group(function () {
        Route::get('/dashboard/staff', [DashboardController::class, 'index_staff']);
        
        Route::get('/kategori/index', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('/kategori/simpan', [KategoriController::class, 'simpan'])->name('kategori.simpan');
        Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

        Route::get('/buku/index', [BukuController::class, 'index'])->name('buku.index');
        Route::post('/buku/simpan', [BukuController::class, 'simpan'])->name('buku.simpan');
        Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/buku/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');
});

Route::middleware([LoadNavbarMiddleware::class])->group(function () {
        Route::get('/dashboard/pengguna', [DashboardController::class, 'index_pengguna']);
});

Route::middleware([PenggunaMiddleware::class, LoadNavbarMiddleware::class])->group(function () {
        Route::get('post', [PostsController::class, 'index'])->name('post.index');
        Route::get('post/create', [PostsController::class, 'create'])->name('post.create');
        Route::post('post/store', [PostsController::class, 'store'])->name('post.store');
        Route::get('post/edit/{id}', [PostsController::class, 'edit'])->name('post.edit');
        Route::get('post/show/{id}', [PostsController::class, 'show'])->name('post.show');
        Route::post('post/update/{id}', [PostsController::class, 'update'])->name('post.update');
        Route::get('post/delete/{id}', [PostsController::class, 'delete'])->name('post.delete');

        Route::get('/user/{username}/{id}', [PostsController::class, 'profile'])->name('user.profile');

        Route::post('likes/{id}', [LikesController::class, 'like'])->name('like');
        Route::post('dislike/{id}', [LikesController::class, 'dislike'])->name('dislike');

        Route::post('comments/{id}', [CommentsController::class, 'newComments'])->name('comments.new');
});
