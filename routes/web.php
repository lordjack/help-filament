<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//public access

Route::view('base', 'livewire.public.base');
Route::get('processo', \App\Livewire\Public\ProcessoResource::class);
Route::get('/processo/{id}', \App\Livewire\Public\ProcessoDetails::class)->name('processo.detail');
Route::get('lote', \App\Livewire\Public\LoteDetails::class);
Route::get('/lote/{processo_id}', \App\Livewire\Public\LoteDetails::class)->name('lote.detail');
Route::get('/lote/{processo_id}/{lote_id}', \App\Livewire\Public\LoteDetails::class)->name('lote.detail');
Route::get('/arquivo/{processo_id}', \App\Livewire\Public\ArquivoDetails::class)->name('arquivo.detail');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
