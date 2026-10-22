<?php
use App\Http\Controllers\{ProfileController, GuestbookController, EntryController};
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestbookController::class, 'index'])->name('guestbook.index');
Route::get('/sign', [GuestbookController::class, 'create'])->name('guestbook.create');
Route::post('/sign', [GuestbookController::class, 'store'])->name('guestbook.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => redirect()->route('entries.index'))->name('dashboard');
    Route::get('/entries', [EntryController::class, 'index'])->name('entries.index');
    Route::post('/entries/{entry}/approve', [EntryController::class, 'approve'])->name('entries.approve');
    Route::post('/entries/{entry}/reject', [EntryController::class, 'reject'])->name('entries.reject');
    Route::delete('/entries/{entry}', [EntryController::class, 'destroy'])->name('entries.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
