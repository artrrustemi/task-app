<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\SubTaskRepositoryInterface;
use App\Repositories\TaskRepository;
use App\Repositories\SubTaskRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() 
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(SubTaskRepositoryInterface::class, SubTaskRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
