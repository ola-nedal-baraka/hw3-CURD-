<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Taskcontroller extends Controller
{
    //this method used foe retriveng from table 
    public function index(){
        $tasks = DB::table('tasks')->get();
    
    
    return view('tasks',compact('tasks'));
       
    }




public function store(Request $request){

    DB::table('tasks')->insert([
      'name' => $request->name,
      'created_at' =>now(),
      'updated_at' => now()

    ]);
    
    return 'store';

}

public function destroy($id)
{
    //$valus=['','Add Task','Table Task'];
    $tasks = DB::table('tasks')->where('id',$id)->delete();
    return redirect()->back()
    ->with('val',0)
    ->with('btn_val','Add Task')
    ->with('tbl_val','Table Task');
}



}