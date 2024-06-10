<?php

use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;

//Rota de Matérias
Route::get('/',                       [TarefasController::class, 'index'])->name('tarefas.index');
Route::get('/tarefas/filtrar',        [TarefasController::class, 'filtrar'])->name('tarefas.filtrar');
Route::get('/tarefas/cadastrar',      [TarefasController::class, 'create'])->name('tarefas.create');
Route::get('/tarefas/{id}',           [TarefasController::class, 'show'])->name('tarefas.show');
Route::post('/tarefas/salvar',        [TarefasController::class, 'store'])->name('tarefas.store');
Route::get('/tarefas/edit/{id}',      [TarefasController::class, 'edit'])->name('tarefas.edit');
Route::put('/tarefas/update/{id}',    [TarefasController::class, 'update'])->name('tarefas.update');;
Route::delete('/tarefas/{id}',        [TarefasController::class, 'destroy'])->name('tarefas.destroy');
Route::post('/tarefas/{id}/concluir', [TarefasController::class, 'concluir'])->name('tarefas.concluir');

