<?php
namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Models\Program;
use App\Models\Category;
use App\Models\Country;



use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    // trainer property on class instances
    protected $student;

    // Constructor to bind trainer to repo
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    // Get all instances of model
    public function all()
    {
        return $this->student->orderBy('created_at', 'desc')->get();
    }


    // create a new record in the database
    public function create(array $data)
    {
        $studentUser =new Student();
        $studentUser->first_name = $data['first_name'];
        $studentUser->last_name = $data['last_name'];
        $studentUser->email = $data['email'];
        $studentUser->phone = $data['phone'];
        $studentUser->gender = $data['gender'];
        $studentUser->country_id = $data['country_id'];
        $studentUser->age = $data['age'];
        if (isset($data['status'])) {
            $studentUser->status = '0';
        } else {
            $studentUser->status = '1';
        }

        if ($data['gender']=='Female') {
            $studentUser->gender ='f';
        } else {
            $studentUser->gender ='m';
        }
        $studentUser->save();
        foreach ($data['programs'] as $program) {
            $studentUser->Programs()->attach($program);
        }

        foreach ($data['categories'] as $program) {
            $studentUser->Categories()->attach($program);
        }

        $studentUser->save();
        return $studentUser;
    }

    public function getUserById($id)
    {
        $student = $this->student->where('id',$id)->first();

        return  $student;
    }
    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->student->find($id)->first();

        $record->first_name = $data['first_name'];
        $record->last_name = $data['last_name'];
        $record->email = $data['email'];
        $record->phone = $data['phone'];
        $record->gender = $data['gender'];
        $record->country_id = $data['country'];
        $record->age = $data['age'];
        if (isset($data['status'])) {
            $record->status = '0';
        } else {
            $record->status = '1';
        }

        foreach ($data['programs'] as $program) {
            $record->Programs()->sync($program);
        }

        foreach ($data['categories'] as $category) {
            $record->Categories()->sync($category);
        }

        $record->save();


        return $record;
    }

    // remove record from the database
    public function delete($id)
    {
        $record = $this->student->where('id', $id)->first();
        return $record->delete();
    }

    public function getAllCountries()
    {
        $countries = Country::all();
        return $countries;
    }

    public function getAllPrograms()
    {
        $countries = Program::all();
        return $countries;
    }

    public function getAllCategories()
    {
        $countries = Category::all();
        return $countries;
    }
}
