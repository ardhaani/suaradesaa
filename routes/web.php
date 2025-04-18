<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Status;
use Faker\Provider\Lorem;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use function PHPSTORM_META\map;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\postinController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('main', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Form posting
Route::get('/dashboard', [LaporController::class, 'index'])->middleware('auth');
Route::resource('/posts', LaporController::class)->except(['destroy']);
// ->middleware('cek');
Route::post('/posts/komen', [LaporController::class, 'komen'])->middleware('cek');
Route::get('/dashboard/post/checkSlug', [LaporController::class, 'checkSlug'])->middleware('auth');

// Delete komentar
Route::delete('/comments/destroy/{id}', [LaporController::class, 'destroy'])->name('comment.destroy');

// History postingan
Route::get('/history', [PostController::class, 'index'])->middleware('auth');
Route::get('/history/{post:slug}', [PostController::class, 'show'])->middleware('auth');

// Status
Route::get('/status', function(){
    return view('statuses', [
        'title' => 'Status Laporan',
        'statuses' => Status::all()
    ]);
});

Route::get('/status/{status:slug}', function(Status $status){
    return view('history', [
        'title' => "Status: $status->name",
        'posts' => $status->posts->where('user_id', auth()->user()->id)->load('status', 'user'),
        'allpost' => $status->posts->all(),
        'status' => $status->name,
    ]);
});

Route::get('/author/{user:username}', function(User $user){
    return view('history', [
        'title' => "Post by : $user->name",
        'posts' => $user->posts->load('status', 'user'),
        'allpost' => $user->posts->all()
    ]);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Admin dan petugas
Route::get('/admin', [AdminController::class, 'index'])->middleware('cek');
Route::resource('/admin/posts', AdminController::class)->middleware('cek');

// Search
Route::get('/search', [AdminController::class, 'search'])->name('search')->middleware('cek');
Route::get('/cari', [PostController::class, 'cari'])->name('cari')->middleware('cek');

// List laporan
Route::get('/laporan', [AdminController::class, 'laporan'])->middleware('cek');
Route::get('/terima', [AdminController::class, 'terima'])->middleware('cek');
Route::get('/proses', [AdminController::class, 'proses'])->middleware('cek');
Route::get('/selesai', [AdminController::class, 'selesai'])->middleware('cek');
Route::get('/tolak', [AdminController::class, 'tolak'])->middleware('cek');

// List user
Route::get('/petugas', [AdminController::class, 'petugas'])->middleware('cek'); 
Route::get('/masyarakat', [AdminController::class, 'masyarakat'])->middleware('cek'); 

// Daftar petugas
Route::get('/tambah', [AdminController::class, 'tambah'])->middleware('cek'); 
Route::post('/tambah', [AdminController::class, 'store'])->middleware('cek'); 

// Export
Route::get('/export', [AdminController::class, 'export'])->name('export')->middleware('cek');

//Chart
Route::get('/chart', [AdminController::class, 'chart'])->middleware('cek');

//Firebase
Route::get('/export-all', [App\Http\Controllers\LaporController::class, 'exportAllToFirebase']);

