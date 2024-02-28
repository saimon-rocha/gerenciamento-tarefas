<?php

use App\Http\Controllers\MateriaController;
use Illuminate\Support\Facades\Route;

//Rota de Matérias
Route::get('/',                    [MateriaController::class, 'index'])->name('materia.index');
Route::get('/materia/cadastrar',   [MateriaController::class, 'create'])->name('materia.create');
Route::get('/materia/{id}',        [MateriaController::class, 'show'])->name('materia.show');
Route::post('/materia/salvar',     [MateriaController::class, 'store'])->name('materia.store');
Route::get('/materia/edit/{id}',   [MateriaController::class, 'edit'])->name('materia.edit');
Route::put('/materia/update/{id}', [MateriaController::class, 'update'])->name('materia.update');;
Route::delete('/materia/{id}',     [MateriaController::class, 'destroy'])->name('materia.destroy');