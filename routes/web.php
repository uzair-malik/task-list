<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task; // Import the Task model

Route::get('/', function () {
    return view('welcome');
});
Route::get('/all-tasks', function(){

    return view('tasks');
})->name('taskList');
Route::post('/addNewTask',function(Request $request){
    $validated=$request->validate([
        'taskname'=>'required|string|max:255',
        'description'=>'required',
        'long_description'=>'nullable|min:20'
    ]);
    $task = new Task();
    $task->name = $validated['taskname'];
    $task->description = $validated['description'];
    $task->long_description = $validated['long_description'] ?? null;
   
    // Save the task to the database
    $task->save();

    // Redirect or return response as needed
    return redirect()->route('taskList')->with('success', 'Task created successfully!');


    
    

})->name('add');
Route::get('/tasksOverview',function(){
    $tasks = Task::paginate(10);
    return view('completetasks',[
        'tasks'=>$tasks
    ]);

})->name('allTasksOverview');
Route::get('/edit/{id}',function($id){
    $data=Task::find($id);
    if(!$data){
        abort(404);
    }

    return view('modifytask',[
        'task'=>$data
    ]);
})->name('modify');

Route::put('/modifytask/{id}',function($id,Request $request){
    $validated=$request->validate([
        'name'=>'required|string|max:255',
        'description'=>'required',
        'long_description'=>'nullable|min:20'
    ]);
    $task = Task::findOrFail($id);
    $task->update($validated);
    return redirect()->route('modify',['id'=>$id])->with('success', 'Task updated successfully!');


   // return dd($id);

})->name('modifycatcher');
Route::get('/removetask/{id}',function($id){
  
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->route('allTasksOverview')->with('success', 'Task deleted successfully!');


   // return dd($id);

})->name('destroy');
