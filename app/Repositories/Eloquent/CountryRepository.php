<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Models\Country;


use Illuminate\Database\Eloquent\Model;



class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    protected $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function all()
    {
        return $this->country->all();
    }

    public function create(array $data)
    {

        return $this->country->create($data);
    }

    public function getUserById($id)
    {
        $country = $this->country->where('id',$id)->first();

        return  $country;
    }

    public function update(array $data, $id)
    {
        $country = $this->country->where('id',$id)->first();
        $country->name = $data["name"];
        $country->save();
        return $country;
    }


    public function delete($id)
    {
        $record = $this->country->where('id', $id)->first();
        return $record->delete();
    }


}
