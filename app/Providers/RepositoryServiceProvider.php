<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use App\Repositories\Interfaces\TrainerRepositoryInterface;
use App\Repositories\Interfaces\HomeRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\ProgramRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Repositories\Interfaces\SupervisorRepositoryInterface;




use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\TrainerRepository;
use App\Repositories\Eloquent\HomeRepository;
use App\Repositories\Eloquent\StudentRepository;
use App\Repositories\Eloquent\CountryRepository;
use App\Repositories\Eloquent\ProgramRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\PermissionRepository;
use App\Repositories\Eloquent\SupervisorRepository;





class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(TrainerRepositoryInterface::class, TrainerRepository::class);
        $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(ProgramRepositoryInterface::class, ProgramRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(SupervisorRepositoryInterface::class, SupervisorRepository::class);

    }

    public function boot()
    {
        //
    }
}
