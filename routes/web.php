<?php

use App\Http\Controllers\CursosController;
use App\Http\Controllers\estudiantes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Inscripcion;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\planController;
use App\Http\Controllers\TerceroController;
use App\Http\Controllers\UserController;

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
    return view('page.body');
});





Route::get('/certificados', function () {
    return view('page.certificado');
});

Route::get('/preRegistro', function () {
    return view('page.preRegistro');
});
Route::get('/payment', function () {
    return view('page.Pagos');
});

Route::post('/certificados/generar', 'App\Http\Controllers\CertificadoController@generar');

Route::post('/preinscripcion', 'App\Http\Controllers\PreinscripcionController@store');

Route::get('/payment/success/{id}', [PaymentController::class, 'success'])->name('payment.success');


// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/Estudiantes', function () {
        return view('tables.estudiantes');
    })->name('Estudiantes');

    Route::get('/planes', function () {
        return view('tables.planes');
    })->name('planes');


    Route::get('/cursos', function () {
        return view('tables.cursos');
    })->name('cursos');

    
    Route::get('/inscripciones', function () {
        return view('tables.inscripciones');
    })->name('inscripciones');


    
    Route::get('/PreInscripciones', function () {
        return view('tables.PreInscripciones');
    })->name('PreInscripciones');

    Route::get('/Terceros', function () {
        return view('tables.Terceros');
    })->name('Terceros');

    Route::get('/estudiantes/create', function () {
        return view('forms.estudiantes.create');
    })->name('create.estudiante');



    Route::get('/users', function () {
        return view('tables.users');
    })->name('users');

  
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Ruta para mostrar el formulario de creación de usuario
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Ruta para guardar un nuevo usuario
    
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Ruta para mostrar el formulario de edición
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Ruta para actualizar un usuario existente
    
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Ruta para eliminar un usuario

 //rutas de terceros

    Route::get('/tercero/create', [TerceroController::class, 'index'])->name('create.tercero');
    Route::post('/terceroscreate', [TerceroController::class, 'store'])->name('terceros.store');
    Route::get('/terceros/edit/{id}', [TerceroController::class, 'edit'])->name('edit.tercero');
    Route::put('/terceros/{id}', [TerceroController::class, 'update'])->name('terceros.update');
    Route::delete('/terceros/{id}', [TerceroController::class, 'destroy'])->name('terceros.destroy');
   //rutas de planes
    Route::get('/planes/create', [planController::class, 'index'])->name('create.plan');
    Route::post('/planescreate', [planController::class, 'store'])->name('planes.store');
    Route::get('/planes/edit/{id}', [planController::class, 'edit'])->name('edit.plan');
    Route::put('/planes/{id}', [planController::class, 'update'])->name('planes.update');
    Route::delete('/planes/{id}', [planController::class, 'destroy'])->name('planes.destroy');

    //rutas de cursos 
    Route::get('/cursos/create', [CursosController::class, 'index'])->name('create.curso');
    Route::post('/cursoscreate', [CursosController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/edit/{id}', [CursosController::class, 'edit'])->name('edit.curso');
    Route::put('/cursos/{id}', [CursosController::class, 'update'])->name('cursos.update');
    Route::delete('/cursos/{id}', [CursosController::class, 'destroy'])->name('cursos.destroy');



    Route::get('/estudiantes/edit/{documento}', [estudiantes::class, 'edit'])->name('edit.estudiante');
    Route::post('/estudiantescreate', [estudiantes::class, 'store'])->name('estudiantes.store');
    Route::put('/estudiantes/{id}', [estudiantes::class, 'update'])->name('estudiantes.update');
    Route::delete('/estudiantes/{id}', [estudiantes::class, 'destroy'])->name('estudiantes.destroy');



    Route::get('/confirm/Inscripcion/{documento}', [Inscripcion::class, 'index'])->name('confirm.Inscripcion');
    Route::post('/inscripcion/store', [Inscripcion::class, 'store'])->name('inscripcion.store');
    
});

// Rutas de autenticación generadas por Laravel UI
Auth::routes();

