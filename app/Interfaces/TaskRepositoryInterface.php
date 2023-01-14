<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface TaskRepositoryInterface 
{
    public function getAllTasks();
    public function getTaskById($taskId);
    public function deleteTask($taskId);
    public function createTask(array $taskDetails);
    public function updateTask($taskId, array $newDetails);
    public function sortTask($typeSort);
    public function searchTask(Request $request);
}
