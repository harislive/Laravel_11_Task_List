<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// class Task{
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public ?string $created_at,
//         public ?string $updated_at,
//     )
//     {

//     }
// }
// $tasks = [
//     new Task(1, 'Task 1', 'Description 1', 'Long Description',false,'20-12-2002 12:00:00','20-12-2002 12:00:00'),
//     new Task(2, 'Task 2', 'Description 2', null,true,'20-12-2002 12:00:00','20-12-2002 12:00:00'),
//     new Task(3, 'Task 3', 'Description 3', 'Long Description',false,'20-12-2002 12:00:00','20-12-2002 12:00:00'),
//     new Task(4, 'Task 4', 'Description 4', null,true,'20-12-2002 12:00:00','20-12-2002 12:00:00'),
//     new Task(5, 'Task 5', 'Description 5', 'Long Description',true,'20-12-2002 12:00:00','20-12-2002 12:00:00'),

// ];


Route::get('index',function(){
    $tasks = Task::latest()->paginate(10)->onEachSide(0);
    return view('index',['tasks' => $tasks]);
})->name('task.index');

Route::get('index/create',function(){
    // $request->validate([
    //     'title' => 'required',
    //     'description' => 'required',
    //     'long_description' => 'required',
    // ]);
    return view('create');
})->name('task.create');

Route::post('index/store',function(Request $request){
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'long_description' => 'required',
    ]);
    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->long_description = $request->long_description;
    $task->save();
    return redirect()->route('task.index')->with('success','Succussfully Add Task!');
})->name('task.store');


Route::get('index/{id}',function($id) {
    $task = Task::findOrFail($id);

    return view('show',['task'=>$task]);
})->name('task.show');


Route::get('index/{id}/edit',function($id){
    $task = Task::findOrFail($id);
    return view('edit',['task'=>$task]);
})->name('task.edit');

Route::put('index/{id}/update',function(Request $request,$id){
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'long_description' => 'required',
    ]);
    $task = Task::findOrFail($id);
    $task->title = $request->title;
    $task->description = $request->description;
    $task->long_description = $request->long_description;
    $task->save();
    return redirect()->route('task.show',['id'=>$task->id])->with('success','Task Update Successfully!');
})->name('task.update');

Route::delete('index/{id}',function($id){
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->route('task.index')->with('success','Task Deleted Successfully !');
})->name('task.delete');

Route::put('index/{task}/toggle-complete',function(Task $task){
    $task->toggleComplete();
    return redirect()->back()->with('success','Task Update Successfully');

})->name('toggle.completed');
