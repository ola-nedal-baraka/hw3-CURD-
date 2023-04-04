<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Taskcontroller;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[Taskcontroller::class,'index'])->name('tasks');
Route::post('/store',[Taskcontroller::class,'store'])->name('task.insert');
Route::post('delete/{id}',[Taskcontroller::class,'destroy'])->name('task.delete');


Route::post('update/{id}', function ($id) {
    $taskss = DB::table('tasks')->where('id',$id)->get();
    $tasks = DB::table('tasks')->get();
    return view('tasks',compact(['tasks','taskss']))
    ->with('val',1)
    ->with('btn_val','Update')
    ->with('tbl_val','Update Task');
});

Route::post('up/{id}', function ($id){
    
    DB::table('tasks')->where('id', $id)
    ->update(['name'=>$_POST['name']]);
    return redirect('/')   
    ->with('val',0)
    ->with('btn_val','Add Task')
    ->with('tbl_val','Table Task');
});

//up/{{$task->id}}/{{$task->name}}

Route::get('/', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks',compact('tasks'))
    ->with('val',0)
    ->with('btn_val','Add Task')
    ->with('tbl_val','Table Task');
});

Route::get('app', function () {
    
    return view('layout.app');
});