<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

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

/*
 * Homepage
 */
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

/*
 * Tasks List
 */
Route::get('/tasks', function () {
    return view('tasks/index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index');

/*
 * Single Task
 */
Route::get('/tasks/{id}', function ($id) {
    return view('tasks/show', [
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');

/*
 * 404
 */
Route::fallback(function () {
    return '404';
});
