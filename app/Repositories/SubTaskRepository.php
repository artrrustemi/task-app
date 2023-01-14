<?php

namespace App\Repositories;

use App\Interfaces\SubTaskRepositoryInterface;
use App\Models\SubTask;

class SubTaskRepository implements SubTaskRepositoryInterface 
{
    public function deleteSubTask($subTaskId) 
    {
        return SubTask::destroy($subTaskId);
    }

    public function createSubTask(array $subTaskDetails) 
    {
        return SubTask::create($subTaskDetails);
    }

    public function updateSubTask($subTaskId, array $newDetails) 
    {
        return SubTask::whereId($subTaskId)->update($newDetails);
    }
}