<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\HomeRepositoryInterface;

class HomeController extends Controller
{
    protected $home;

    public function __construct(HomeRepositoryInterface $home)
    {
       // set the news
       $this->home = $home;
    //    $this->middleware(['auth:supervisor'])->only('index');
    }

    public function index(){
        $data = $this->home->getCategoryTrainers();
        $allTrainerCount = 0;
        foreach($data as $key => $value){
            $allTrainerCount = $allTrainerCount + $key;
        }

        $programsCount = $this->home->getProgramsCount();

        $studentsCount = $this->home->getStudentCount();
        return view('dashboard.home')->with('trainerCount', $data)
        ->with('allTrainerCount', $allTrainerCount)
        ->with('programsCount', $programsCount)
        ->with('studentsCount', $studentsCount);
    }

}
