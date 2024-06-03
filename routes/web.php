<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


//DASHBOARD
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//USUARIOS CRUD
//CREAT
Route::get('/usuariocriar', [App\Http\Controllers\Usuarios::class, 'usuariocriar'])->name('usuariocriar');
Route::post('/usuarioscriarok', [App\Http\Controllers\Usuarios::class, 'usuarioscriarok'])->name('usuarioscriarok');
//READ
Route::get('/usuarioslista', [App\Http\Controllers\Usuarios::class, 'usuarioslista'])->name('usuarioslista');
//UPDATE
Route::get('/usuarioatualizar/{id}', [App\Http\Controllers\Usuarios::class, 'usuarioatualizar'])->name('usuarioatualizar');
Route::put('/usuarioatualizarok/{id}', [App\Http\Controllers\Usuarios::class, 'usuarioatualizarok'])->name('usuarioatualizarok');
//DELETE
Route::delete('/usuariosdeletar/{id}', [App\Http\Controllers\Usuarios::class, 'usuariosdeletar'])->name('usuariosdeletar');


//LIVROS CRUD
//CREATE
Route::get('/acervoinserir', [App\Http\Controllers\Acervo::class, 'acervoinserir'])->name('acervoinserir');
Route::post('/acervoinserirok', [App\Http\Controllers\Acervo::class, 'acervoinserirok'])->name('acervoinserirok');
//READ
Route::get('/acervolista', [App\Http\Controllers\Acervo::class, 'acervolista'])->name('acervolista');
Route::get('/acervofiltro/{id}', [App\Http\Controllers\Acervo::class, 'acervofiltro'])->name('acervofiltro');
//UPDATE
Route::get('/acervoatualizar/{id}', [App\Http\Controllers\Acervo::class, 'acervoatualizar'])->name('acervoatualizar');
Route::put('/acervoatualizarok/{id}', [App\Http\Controllers\Acervo::class, 'acervoatualizarok'])->name('acervoatualizarok');
//DELETE
Route::delete('/acervodeletar/{id}', [App\Http\Controllers\Acervo::class, 'acervodeletar'])->name('acervodeletar');


//GENEROS CRUD
//CREATE
Route::get('/generoinserir', [App\Http\Controllers\GenerosAcervo::class, 'generoinserir'])->name('generoinserir');
Route::post('/generoinserirok', [App\Http\Controllers\GenerosAcervo::class, 'generoinserirok'])->name('generoinserirok');
//READ
Route::get('/generoslista', [App\Http\Controllers\GenerosAcervo::class, 'generoslista'])->name('generoslista');
//UPDATE
Route::get('/generoatualizar/{id}', [App\Http\Controllers\GenerosAcervo::class, 'generoatualizar'])->name('generoatualizar');
Route::put('/generoatualizarok/{id}', [App\Http\Controllers\GenerosAcervo::class, 'generoatualizarok'])->name('generoatualizarok');
//DELETE
Route::delete('/generodeletar/{id}', [App\Http\Controllers\GenerosAcervo::class, 'generodeletar'])->name('generodeletar');


//EMPRESTIMOS
//READ
Route::get('/emprestimoslista', [App\Http\Controllers\EmprestimosAcervo::class, 'emprestimoslista'])->name('emprestimoslista');
//CREATE
Route::any('/emprestimoinserir', [App\Http\Controllers\EmprestimosAcervo::class, 'emprestimoinserir'])->name('emprestimoinserir');
Route::post('/emprestimoinserirok', [App\Http\Controllers\EmprestimosAcervo::class, 'emprestimoinserirok'])->name('emprestimoinserirok');
//UPDATE
Route::put('/emprestimoatualizar/{id}', [App\Http\Controllers\EmprestimosAcervo::class, 'emprestimoatualizar'])->name('emprestimoatualizar');
//DELETE
Route::delete('/emprestimosdeletar/{id}', [App\Http\Controllers\EmprestimosAcervo::class, 'emprestimosdeletar'])->name('emprestimosdeletar');






