<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $table='priorities';
    protected $fillable = [
        'name',
    ];

    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
