<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\TrainerRepositoryInterface;
use App\Http\Requests\Dashboard\UserRequest;
use Session;

class TrainerController extends Controller
{
    protected $trainer;

    public function __construct(TrainerRepositoryInterface $trainer)
    {
        $this->trainer = $trainer;
    }


    public function index()
    {
        $trainers = $this->trainer->all();
        $countries = $this->trainer->getAllCountries();
        $programs = $this->trainer->getAllPrograms();
        $categories = $this->trainer->getAllCategories();
        return view('dashboard.trainers.index')->with('trainers', $trainers)->with('countries', $countries)->with('programs', $programs)->with('categories', $categories);
    }

    public function store (UserRequest $request){
        $data = $request->all();
        $trainer = $this->trainer->create($data);
        $request->session()->flash('message', 'New customer added successfully.');


        return response()->json(['message'=> 'Trainer added  successfully :)', 'data' => $trainer]);
    }

    public function edit($id){

        $trainer = $this->trainer->getUserById($id);
        $country = $trainer->country->name;
        $programs = $trainer->Programs;
        $categories = $trainer->Categories;

        return response()->json(['trainer' => $trainer, 'country' => $country, 'categories' => $categories, 'programs' => $programs]);
    }

    public function update(UserRequest $request, $id){
        $data = $request->except(['token']);
        if($data['gender'] == 'Male'){
            $data['gender'] = 'm';
        }else{
            $data['gender'] = 'f';
        }

        $record = $this->trainer->update($data, $id);
        return response()->json(['message'=> 'Trainer data updated successfully :)', 'data' => $record]);
    }




    public function destroy($id)
    {
            $f = $this->trainer->delete($id);
            return response()->json(['success' =>'Category Deleted Successfully']);

    }
}
