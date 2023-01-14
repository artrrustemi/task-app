<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Priority;
use App\Models\SubTask;
use App\Models\Position;

class Task extends Model
{
    use HasFactory;

    
    protected $table='tasks';
    protected $fillable = [
        'name',
        'position',
        'description',
        'priority_id',
        'finished_at',
        'time_spent',
    ];


    public function priority()
    {
        return $this->belongsTo(Priority::class, "priority_id");
    }
    public function position()
    {
        return $this->belongsTo(Position::class, "position");
    }
    public function subtask()
    {
        return $this->hasMany(SubTask::class);
    }
}
