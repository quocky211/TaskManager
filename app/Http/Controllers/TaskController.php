<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Hash;
use Session;
class TaskController extends Controller
{
    public function index()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = Task::where('user_id','=',Session::get('loginId'))->orderBy('id','desc')->get();
        }
        return view('dashboard', compact('data'));
        
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->user_id = Session::get('loginId');
        $task->description = $request->description;
        $task->save();
        return redirect('dashboard');

    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {   
        $task = Task::findOrFail($id);
        $statuses = [
            [
                'label' => 'Completed',
                'value' => 'Completed',
            ],
            [
                'label' => 'Incompleted',
                'value' => 'Incompleted',
            ]
        ];
        return view('edit', compact('statuses','task'));
    }
    public function update(Request $request,$id)
    {
        $task = Task::findOrFail($id);
        $request->validate([
            'title'=>'required',
        ]);
        $task->title = $request->title;
        $task->user_id = Session::get('loginId');
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect('dashboard');
        
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('dashboard');
    }
}
