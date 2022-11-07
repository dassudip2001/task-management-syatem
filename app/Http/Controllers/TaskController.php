<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Exception;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $project=Project::all();
            $task    = Task::orderBy('priority', 'asc')->get();
            // $task=Task::all();
            return view('index',compact('task','project'));
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $request->validate([
            'task_name'=>'required|unique:tasks',
            'priority'=>'required|unique:tasks',
//            'description'=>'required'

        ]);
            $task=new Task();
            $task->task_name=$request->task_name;
            $task->priority =$request->priority;

           
            $task->save();
            return redirect(route('index'))->with('success','task Created Successfully',array('timeout' => 3000),'error');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        try {
            $task=task::find($id);
            return view('edit',compact('task'));
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $task=Task::find($id);
            $task->task_name=$request->task_name;
            $task->priority =$request->priority;
 
            $task->save();
            return redirect(route('index'))->with('success','Task Update Successfully');
        }catch (Exception $e){
 
            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Task::destroy($id);
            return redirect(route('index'))->with('success','Task Delete Successfully');
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
}
