<?php

use App\Http\Controllers\CargosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PagosController;

Route::get('/', function () {
    return view('landing/index');
})->name('/');

Route::get('/backoffice', [DashboardController::class, 'index'])->name('backoffice.dashboard');

//usuario
Route::get('/backoffice/login', [UserController::class, 'showFormLogin'])->name('user.form.show.login');
Route::post('/backoffice/login', [UserController::class, 'login'])->name('user.form.login');

Route::get('/backoffice/create-user', [UserController::class, 'showFormRegistro'])->name('user.form.show.registro');
Route::post('/backoffice/create-user', [UserController::class, 'guardarNuevo'])->name('user.form.registro');

Route::get('/backoffice/user/profile', [UserController::class, 'showPerfil'])->name('backoffice.user.profile');
Route::get('/backoffice/user/contact', [UserController::class, 'showContacto'])->name('backoffice.user.contact');
Route::get('/backoffice/user/security', [UserController::class, 'showSeguridad'])->name('backoffice.user.security');
Route::post('/backoffice/user/security', [UserController::class, 'cambiarClave'])->name('backoffice.user.security.changePass');

Route::post('/backoffice/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/backoffice/roles', [RolesController::class, 'index'])->name('backoffice.roles.index');
Route::post('/backoffice/roles', [RolesController::class, 'store'])->name('backoffice.roles.new');
Route::post('/backoffice/roles/down/{_id}', [RolesController::class, 'down'])->name('backoffice.roles.down');
Route::post('/backoffice/roles/up/{_id}', [RolesController::class, 'up'])->name('backoffice.roles.up');
Route::post('/backoffice/roles/destroy/{_id}', [RolesController::class, 'destroy'])->name('backoffice.roles.destroy');

Route::get('/backoffice/cargos', [CargosController::class, 'index'])->name('backoffice.cargos.index');
Route::post('/backoffice/cargos', [CargosController::class, 'store'])->name('backoffice.cargos.new');
Route::post('/backoffice/cargos/down/{_id}', [CargosController::class, 'down'])->name('backoffice.cargos.down');
Route::post('/backoffice/cargos/up/{_id}', [CargosController::class, 'up'])->name('backoffice.cargos.up');
Route::post('/backoffice/cargos/destroy/{_id}', [CargosController::class, 'destroy'])->name('backoffice.cargos.destroy');

Route::get('/backoffice/pagos', [PagosController::class, 'index'])->name('backoffice.pagos.index');
Route::post('/backoffice/pagos', [PagosController::class, 'store'])->name('backoffice.pagos.new');
Route::get('/backoffice/pagos/{_id}', [PagosController::class, 'show'])->name('backoffice.pagos.show');
Route::get('/backoffice/pagos/{_id}/edit', [PagosController::class, 'edit'])->name('backoffice.pagos.edit');
Route::post('/backoffice/pagos/down/{_id}', [PagosController::class, 'down'])->name('backoffice.pagos.down');
Route::post('/backoffice/pagos/up/{_id}', [PagosController::class, 'up'])->name('backoffice.pagos.up');
Route::post('/backoffice/pagos/destroy/{_id}', [PagosController::class, 'destroy'])->name('backoffice.pagos.destroy');
