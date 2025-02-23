<?php

use App\Models\Task;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
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
 * Single Task
 */
Route::get('/tasks/{id}', function ($id) {
    return view('tasks.show', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');


/*
 * Create Task
 */
Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()
        ->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task created successfully!');

})->name('tasks.store');
