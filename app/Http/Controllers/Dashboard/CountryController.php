<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use  App\Http\Requests\Dashboard\GeneralRequest;


class CountryController extends Controller
{
    protected $program;

    public function __construct(CountryRepositoryInterface $country)
    {
        $this->country = $country;
    }

    public function index()
    {

        $countries = $this->country->all();

        return view('dashboard.countries.index')->with('countries', $countries);
    }

    public function store(GeneralRequest $request)
    {
        $data = $request->all();
        $country = $this->country->create($data);
        return response()->json(['success'=> 'Country added  successfully :)', 'data' => $country]);
    }

    public function edit($id){
        $country = $this->country->getUserById($id);
        return response()->json($country);
    }

    public function update(GeneralRequest $request){
        $data = $request->all();
        $id = $data['id'];
        $record = $this->country->update($data, $id);

        return response()->json(['success'=> 'Country Updated  successfully :)', 'data' => $record]);
    }

    public function destroy($id)
    {
            $this->country->delete($id);
            return response()->json(['success' =>'Country Deleted Successfully']);

    }

}
