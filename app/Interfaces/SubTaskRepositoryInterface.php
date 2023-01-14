<?php

namespace App\Interfaces;

interface SubTaskRepositoryInterface 
{
    public function createSubTask(array $subTaskDetails);
    public function updateSubTask($subTaskId, array $newDetails);
    public function deleteSubTask($subTaskId);
}