<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Task;

class TaskController extends Controller
{
  public function store(Request $request)
  {
    // Validation rules 
      $validatedData = $request->validate([
          'task' => 'required|string|max:255',
          'description' => 'required|string',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 

      ]);

    //  Handle image upload
      if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('images', 'public');
      $validatedData['image'] = $imagePath;
      }
      
      Task::create($validatedData);
      $tasks = Task::all();

      return view('task')->with('tasks', $tasks);
  }

  //delete product
  public function DeleteTask($id){
    $task=Task::findOrFail($id);
    $task->delete();
    $datas=Task::all();

    return view('task')->with('tasks',$datas);
  }

  //update view
  public function UpdateTask($id){
    $task=Task::find($id);

    return view('Updatetask')->with('taskdata',$task);
  
  }

  //update product
  public function UpdateTaskview(Request $request){
    $id=$request->id;
    $task=$request->task;
    $description=$request->description;
    $data=Task::find($id);
    $data->task=$task;
    $data->description=$description;
    $data->save();
    $datas=Task::all();

    return view('task')->with('tasks',$datas);
  
  }

  //search product
  public function search(Request $request)
  {
      $keyword = $request->query('keyword');
      $results = Task::where('task', 'LIKE', "%$keyword%")->get();

      return view('search', ['results' => $results]);
  }
}