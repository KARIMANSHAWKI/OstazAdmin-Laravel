<?php
namespace App\Repositories\Eloquent;

use App\Models\Trainer;
use App\Models\Program;
use App\Models\Category;
use App\Models\Country;

use App\Repositories\Interfaces\TrainerRepositoryInterface;

class TrainerRepository extends BaseRepository implements TrainerRepositoryInterface
{
    // trainer property on class instances
    protected $trainer;

    // Constructor to bind trainer to repo
    public function __construct(Trainer $trainer)
    {
        $this->trainer = $trainer;
    }

    // Get all instances of model
    public function all()
    {
        return $this->trainer->all();
    }


    // create a new record in the database
    public function create(array $data)
    {
        // return $data;
        $trainerUser =new Trainer();
        $trainerUser->first_name = $data['first_name'];
        $trainerUser->last_name = $data['last_name'];
        $trainerUser->email = $data['email'];
        $trainerUser->phone = $data['phone'];
        $trainerUser->gender = $data['gender'];
        $trainerUser->country_id = $data['country_id'];
        $trainerUser->age = $data['age'];
        if (isset($data['status'])) {
            $trainerUser->status = '0';
        } else {
            $trainerUser->status = '1';
        }

        if ($data['gender']=='Female') {
            $trainerUser->gender ='f';
        } else {
            $trainerUser->gender ='m';
        }
        $trainerUser->save();
        foreach ($data['programs'] as $program) {
            $trainerUser->Programs()->attach($program);
        }

        foreach ($data['categories'] as $program) {
            $trainerUser->Categories()->attach($program);
        }

        $trainerUser->save();
        return $trainerUser;

    }

    public function getUserById($id)
    {
        $trainer = $this->trainer->find($id)->first();

        return  $trainer;
    }
    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->trainer->find($id)->first();

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
        $record->save();

        foreach ($data['programs'] as $program) {
            $record->Programs()->attach($program);
        }

        foreach ($data['categories'] as $program) {
            $record->Categories()->attach($program);
        }

        return $record;
    }

    // remove record from the database
    public function delete($id)
    {
        $record = $this->trainer->where('id',$id)->first();
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
