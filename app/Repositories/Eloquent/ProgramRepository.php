<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\ProgramRepositoryInterface;
use App\Models\Program;
use App\Models\Category;
use App\Models\Country;




use Illuminate\Database\Eloquent\Model;



class ProgramRepository extends BaseRepository implements ProgramRepositoryInterface
{
    protected $program;

    public function __construct(Program $program)
    {
        $this->program = $program;
    }

    public function all()
    {
        return $this->program->all();
    }

    public function create(array $data)
    {

        $program =new Program();
        $program->name = $data['name'];
        $program->category_id = $data['category_id'];


        if (isset($data['status'])) {
            $program->status = '0';
        } else {
            $program->status = '1';
        }

        $program->save();

        foreach ($data['countries'] as $country) {
            $program->Countries()->attach($country);
        }



        return $program;

    }

    public function getUserById($id)
    {
        $program = $this->program->where('id',$id)->first();

        return  $program;
    }

    public function update(array $data, $id)
    {
        $program = $this->program->where('id',$id)->first();
        $program->name = $data["name"];
        $program->category_id = $data['category'];

        if (isset($data['status'])) {
            $program->status = '0';
        } else {
            $program->status = '1';
        }

        $program->save();

        foreach ($data['countries'] as $country) {
            $program->Countries()->attach($country);
        }

        return $program;
    }


    public function delete($id)
    {
        $record = $this->program->where('id', $id)->first();
        return $record->delete();
    }

    public function getAllCategory()
    {
        $categories = Category::all();
        return $categories;
    }

    public function getAllCountries()
    {
        $countries = Country::all();
        return $countries;
    }


}
