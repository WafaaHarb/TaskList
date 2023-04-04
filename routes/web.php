<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Ramsey\Collection\Set;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks',function (){
    return view('tasks');

 });

Route::get('tasks1',function (){
    return view('tasks1');

 });

    /* To insert data */
    Route::post('insert',function (){
        DB::table('tasks')->insert([
        'name'=>$_POST['name'],
        'created-at'=> now(),
        'update-at'=> now()
    ]);

        return redirect()->back();
    });

    Route::put('update',function (Request $request, $id){
        $task = task::find($id);
        $task->name = $request->input('name');
        $task->created = $request->input('created-at');
        $task->update = $request->input('update-at');
        $task->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    });


    Route::put('update',function ($id){
        DB::table('tasks')->find($id);
        return view ('index', ['task'=>$id]);

    });


    Route::delete('delete/{id}',function ($id){
        DB::table('tasks')->where('id','=', $id)->delete();

        return redirect()->back();
    });

?>
