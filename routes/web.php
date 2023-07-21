<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;

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
    return redirect()->route("task.index");
});

Route::get('/task', function () {
    return view('welcome', ['tasks' => Task::latest()->get()]);
})->name('task.index');
Route::view('/task/create', 'create')->name("task.create");
Route::get('/task/{id}/edit', function ($id) {
    return view('edit', ['task' => Task::findOrFail($id)]);
})->name('task.detail');
Route::get('/task/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('task.detail');
Route::post('/task', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'long_description' => 'required',
    ]);
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();
    return redirect()->route('task.detail', ['id' => $task->id])->with('success', 'task created successfully');
})->name('task.store');

Route::put('/task/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'long_description' => 'required',
    ]);
    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();
    return redirect()->route('task.detail', ['id' => $task->id])->with('success', 'task updated successfully');
})->name('task.update');
