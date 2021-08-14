<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\SupervisorRepositoryInterface;
use  App\Http\Requests\Dashboard\SupervisorRequest;
use  App\Http\Requests\Dashboard\EditSupervisorRequest;



class SupervisorController extends Controller
{
    protected $supervisor;

    public function __construct(SupervisorRepositoryInterface $supervisor)
    {
        $this->supervisor = $supervisor;
    }

    public function index()
    {
        $supervisors = $this->supervisor->all();
        $permissions = $this->supervisor->getAllPermission();

        return view('dashboard.supervisors.index')->with('supervisors', $supervisors)->with('permissions', $permissions);
    }

    public function store(SupervisorRequest $request)
    {
        $data = $request->all();
        $supervisor = $this->supervisor->create($data);
        return response()->json(['message'=> 'Supervisor added  successfully :)', 'data' => $supervisor]);
    }

    public function edit($id){

        $supervisorData = $this->supervisor->getUserById($id);
        $permissions = $this->supervisor->getAllPermission();
        return response()->json(['supervisor' => $supervisorData, 'permissions' => $permissions]);
    }

    public function update(EditSupervisorRequest $request, $id){
        $data = $request->except(['token']);

        $record = $this->supervisor->update($data, $id);
        return response()->json(['message'=> 'Supervisor data updated successfully :)', 'data' => $record]);
    }


    public function destroy($id)
    {
            $this->supervisor->delete($id);
            return response()->json(['success' =>'Supervisor Deleted Successfully']);

    }



}
