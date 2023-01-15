<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubTaskRequest;
use App\Http\Requests\UpdateSubTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\SubTask;
use Illuminate\Http\Request;
use App\Interfaces\SubTaskRepositoryInterface;
use Illuminate\Support\Facades\Validator;


class SubTasksController extends Controller
{

    protected SubTaskRepositoryInterface $subTaskRepository;

    public function __construct(SubTaskRepositoryInterface $subTaskRepository) 
    {
        $this->subTaskRepository = $subTaskRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubTaskRequest $request)
    {
        
        $subTaskDetails = [
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'task_id' => $request->task_id,
        ];

        $created = $this->subTaskRepository->createSubTask($subTaskDetails);
        if($created){
            return response()->json([
                'data' => $created
            ],200);
        }else{
            return response()->json([
                'message' => 'Failed to create task'
            ],400);
        }
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request)
    {
        $subTaskId = $request->route('id');

        $subTaskDetails = [
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'task_id' => $request->task_id,
        ];

        $updated = $this->subTaskRepository->updateSubTask($subTaskId, $subTaskDetails);

        if ($updated) {
            return response()->json(['Subtask has succesfuly updated!']);
        } else {
            return response()->json(['Failed to update task']);
        }  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $subTaskId = $request->route('id');

        $deleted = $this->subTaskRepository->deleteSubTask($subTaskId);
        if ($deleted) {
            return response()->json(['Task has succesfuly deleted!']);
        } else {
            return response()->json(['Failed to delete task']);
        }    
    }
}
