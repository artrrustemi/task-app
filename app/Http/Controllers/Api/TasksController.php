<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use App\Interfaces\TaskRepositoryInterface;




class TasksController extends Controller 
{

    protected TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository) 
    {
        $this->taskRepository = $taskRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : JsonResponse
    {
        return response()->json([
            'data' => $this->taskRepository->getAllTasks()
        ]);
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
     * @param  \Illuminate\Http\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string|max:255',
            'position' => 'required|numeric',
            'description' => 'required|string',
            'priority_id' => 'required|numeric|exists:priorities,id'
        ]);
      
        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }
       
        $taskDetails = [
                    'name' => $request->name,
                    'position' => $request->position,
                    'description' => $request->description,
                    'priority_id' => $request->priority_id,
                ];
        $created = $this->taskRepository->createTask($taskDetails);
        if($created){
            return response()->json([
                'data' => $created
            ],200);
        }else{
            return response()->json([
                'message' => 'Failed to create subtask'
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
        $taskId = $request->route('id');

        return response()->json([
            'data' => $this->taskRepository->getTaskById($taskId)
        ]);
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
    public function update(Request $request)
    {
        $taskId = $request->route('id');
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string|max:255',
            'position' => 'required|numeric',
            'description' => 'required|string',
            'priority_id' => 'required|numeric|exists:priorities,id'
        ]);
      
        if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
        }

        $taskDetails = [
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'priority_id' => $request->priority_id,
        ];

        $updated = $this->taskRepository->updateTask($taskId, $taskDetails);

        if ($updated) {
            return response()->json([
                'data' => $taskDetails
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to update subtask'
            ], 400);
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
        $taskId = $request->route('id');

        $deleted = $this->taskRepository->deleteTask($taskId);
        if ($deleted) {
            return response()->json(['Task has succesfuly deleted!']);
        } else {
            return response()->json(['Failed to delete task']);
        }    
    }

    public function sortTask(Request $request){
        
        $typeSort = $request->route('typeSort');
        $sort = $this->taskRepository->sortTask($typeSort);

        return response()->json([
            'data' => $sort
        ]);
    }


    public function searchTask(Request $request){
        
        $searchTask = $request->route('term');
        $search = $this->taskRepository->searchTask($searchTask);

        return response()->json([
            'data' => $search
        ]);
    }
}
