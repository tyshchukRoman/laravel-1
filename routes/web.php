<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Models
use App\Models\Task;

// Requests
use App\Http\Requests\TaskRequest;

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
 * 404
 */
Route::fallback(function () {
    return '404';
});

/*
 * Tasks List
 */
Route::get('/tasks', function () {
    return view('tasks.index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

/*
 * Create Task
 */
Route::view('/tasks/create', 'tasks.create')->name('tasks.create');

/*
 * Edit Single Task
 */
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('tasks.edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

/*
 * Single Task
 */
Route::get('/tasks/{task}', function (Task $task) {
    return view('tasks.show', [
        'task' => $task
    ]);
})->name('tasks.show');


/*
 * Create Task
 */
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()
        ->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

/*
 * Update Task
 */
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()
        ->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');
