<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProgramRepositoryInterface;
use APp\Models\Country;
use  App\Http\Requests\Dashboard\ProgramRequest;



class ProgramController extends Controller
{

    protected $program;

    public function __construct(ProgramRepositoryInterface $program)
    {
        $this->program = $program;
    }

    public function index()
    {
        $categories = $this->program->getAllCategory();
        $counttries = $this->program->getAllCountries();
        $programs = $this->program->all();


        return view('dashboard.programs.index')->with('programs', $programs)->with('categories', $categories)->with('countries', $counttries);
    }


    public function store(ProgramRequest $request){
        $data = $request->all();
        $programData = $this->program->create($data);
        return response()->json(['message'=> 'Program added  successfully :)', 'data' => $programData]);

    }

    public function edit($id){

        $program = $this->program->getUserById($id);

        $category = $program->Category->name;
        $countries = $program->Countries;

        return response()->json(['program' => $program, 'category' => $category, 'countries' =>$countries]);
    }

    public function update(ProgramRequest $request, $id){
        $data = $request->all();
        $record = $this->program->update($data, $id);
        $category =  $record->Category->name;
        return response()->json(['message'=> 'Program data updated successfully :)', 'data' => $record, 'category' => $category]);
    }

    public function destroy($id)
    {
            $this->program->delete($id);
            return response()->json(['success' =>'Program Deleted Successfully']);

    }

}
