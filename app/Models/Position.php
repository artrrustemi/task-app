<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;


class Position extends Model
{
    use HasFactory;
    protected $table='positions';
    
    protected $fillable = [
        'name',
    ];
    
    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
