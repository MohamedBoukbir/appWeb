<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\AnnonceController;
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

// Route::get('/homehelp/signin', function () {
//     return view('auth.login');
// });

// Route::get('/', function () {
//   return view('welcome');
// });
// Route::get('/homehelp/signup', function () {
//   return view('auth.register');
// });


Route::get('/homehelp', function () {
  return view('front.welcome');
});

// Route::get('/homehelp/signup', function () {
//   return view('front.signup');
// })->name('signup');

// Route::get('/homehelp/signin', function () {
//   return view('front.signin');
// })->name('signin');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

   ///// Route candidat////////////////////////////////////////////////////////////
Route::middleware(['auth', 'user-access:candidat'])->group(function () {
  
    Route::get('/candidat/home', [HomeController::class, 'index'])->name('candidat.home');
    Route::resource('candidats', CandidatController::class);

    // Route::get('/homehelp/signin', function () {
    //   return view('front.account');
    // })->name('signin');
    
  });
//////////////////// end candidat ////////////////////////////////////////////////
    ///// Route Admin////////////////////////////////////////////////////////////

  Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
Route::delete('admin/user/delete/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/home/{user}', [AdminController::class, 'edituser'])->name('admin.edit-user');

///////afficher Famille/////////////////
Route::get('admin/user/famille', [AdminController::class, 'indexfamille'])->name('admin.famille');

// add famille
Route::get('admin/user/add-famille', [AdminController::class, 'createfamille'])->name('admin.add.famille');
Route::post('admin/user/famille', [AdminController::class, 'storefamille'])->name('Storefamille');

// edit famille
Route::get('admin/user/edit-famille/{famille}', [AdminController::class, 'editfamille'])->name('admin.edit.famille');
Route::post('admin/user/famille/{famille}', [AdminController::class, 'updatefamille'])->name('Updatefamille');

// Route::get('admin/user/add-famille', function () { return view('add-famille');})->name('admin.add.famille');


///////afficher candidat/////////////////
Route::get('admin/user/candidat', [AdminController::class, 'indexcandidat'])->name('admin.candidat');
// add candidat

Route::get('admin/user/add-candidat', [AdminController::class, 'createcandidat'])->name('admin.add.candidat');
Route::post('admin/user/candidat', [AdminController::class, 'storecandidat'])->name('Storecandidat');

// edit candidat
Route::get('admin/user/edit-candidat/{candidat}', [AdminController::class, 'editcandidat'])->name('admin.edit.candidat');
Route::post('admin/user/candidat/{candidat}', [AdminController::class, 'updatecandidat'])->name('Updatecandidat');







Route::get('admin/abonnements', function () { return view('abonnements');})->name('admin.abonnements');

});

 ////////////////////// End Route Admin ///////////////////////////////////////////
 //////////////////////////// route famille     /////////////////////////////////////////////////

Route::middleware(['auth', 'user-access:famille'])->group(function () {
  
    Route::get('/famille/home', [HomeController::class, 'familleHome'])->name('famille.home');
    Route::resource('familles', FamilleController::class);
    Route::resource('annonces', AnnonceController::class);

});

//////////////////////////// end route route famille     /////////////////////////////////////////////////