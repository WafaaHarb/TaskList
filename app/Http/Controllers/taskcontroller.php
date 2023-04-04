<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class taskcontroller extends Controller
{

    public function index(){

        // $tasks = DB::table('tasks')->get();
     $tasks = Task::all();
         return view('welcome',compact('tasks'));


     }

     //public function store(StoreTaskRequest $request){

     public function store(request $request){

          $validatedData = $request->validate([
              'name' => 'required|max:255',

          ]);

          $task =new Task;
          $task->name=$request->name;
          $task->save();



             return redirect('/');


     }
     public function destory($id){
         task::find($id)->delete();
         return redirect('/');



     }




}
