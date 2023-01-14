<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class SubTask extends Model
{
    use HasFactory;
    protected $table='sub_tasks';

    protected $fillable = [
        'name',
        'task_id',
        'position',
        'description',
        'finished_at',
        'finished_at',
        'time_spent',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, "task_id");
    }
}
