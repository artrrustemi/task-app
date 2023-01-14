<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TaskRepository implements TaskRepositoryInterface 
{
    public function getAllTasks() 
    {
        return Task::with('subtask','priority','position')->paginate(10);
    }

    public function getTaskById($taskId) 
    {
        $task = Task::with('subtask','priority','position')->findOrFail($taskId);

        $createdAt = new Carbon($task->created_at);
        $finishedAt = new Carbon($task->finished_at);
        $diffInSeconds = $createdAt->diffForHumans($finishedAt);
        $task->time_spent=$diffInSeconds;
      
        foreach($task->subtask as $subtask){
            $createdAtSub = new Carbon($subtask->created_at);
            $finishedAtSub = new Carbon($subtask->finished_at);
            $subtask->time_spent = $createdAtSub->diffForHumans($finishedAtSub);
        }

        return $task;
        
    }

    public function deleteTask($taskId) 
    {
        $task=Task::findOrFail($taskId);
        return $task->destroy($taskId);
    }

    public function createTask(array $taskDetails) 
    {
        return Task::create($taskDetails);
    }

    public function updateTask($taskId, array $newDetails) 
    {
        $task = Task::findOrFail($taskId);
        return $task->update($newDetails);
    }

    public function sortTask($typeSort) 
    {
        $sorted = Task::with('subtask','priority','position')->orderBy('id',$typeSort)->paginate(10);

        return $sorted;
    }

    public function searchTask(Request $request) 
    {
        $search = Task::with('subtask','priority','position')
            ->whereNotNull('name')
            ->whereNotNull('position')
            ->whereNotNull('description')
            ->whereNotNull('priority')
            ->when($request->term, function ($query) use ($request) {
        $query->where('name', 'LIKE', '%'.$request->term.'%')
            ->orWhere('position', 'LIKE', '%' . $request->term . '%')
            ->orWhere('description', 'LIKE', '%' . $request->term . '%')
            ->orWhere('priority', 'LIKE', '%' . $request->term . '%');
        })
        ->latest()
        ->simplePaginate(10);

        return $search;
    }
}