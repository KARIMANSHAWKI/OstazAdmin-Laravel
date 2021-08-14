<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\Dashboard\UserRequest;


use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $student;

    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $countries = $this->student->getAllCountries();
        $programs = $this->student->getAllPrograms();
        $categories = $this->student->getAllCategories();
        $students = $this->student->all();

        return view('dashboard.students.index')->with('students', $students)->with('countries', $countries)->with('programs', $programs)->with('categories', $categories);
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $studentUser = $this->student->create($data);
        return response()->json(['message'=> 'Student added  successfully :)', 'data' => $studentUser]);
    }

    public function edit($id){

        $studentData = $this->student->getUserById($id);
        $country = $studentData->country->name;
        $programs = $studentData->Programs;
        $categories = $studentData->Categories;
        return response()->json(['student' => $studentData, 'country' => $country, 'categories' => $categories, 'programs' => $programs]);
    }



    public function update(UserRequest $request, $id){
        $data = $request->except(['token']);
        if($data['gender'] == 'Male'){
            $data['gender'] = 'm';
        }else{
            $data['gender'] = 'f';
        }

        $record = $this->student->update($data, $id);
        return response()->json(['message'=> 'Student data updated successfully :)', 'data' => $record]);
    }


    public function destroy($id)
    {
            $this->student->delete($id);
            return response()->json(['success' =>'Student Deleted Successfully']);

    }
}
