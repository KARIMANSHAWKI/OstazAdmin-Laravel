<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use  App\Http\Requests\Dashboard\GeneralRequest;



class PermissionController extends Controller
{
    protected $permission;

    public function __construct(PermissionRepositoryInterface $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission->all();

        return view('dashboard.permissions.index')->with('permissions', $permissions);
    }

    public function store(GeneralRequest $request)
    {
        $data = $request->all();
        $permission = $this->permission->create($data);
        return response()->json(['success'=> 'Permission added  successfully :)', 'data' => $permission]);
    }

    public function edit($id){
        $permission = $this->permission->getUserById($id);
        return response()->json($permission);
    }

    public function update(GeneralRequest $request){
        $data = $request->all();
        $id = $data['id'];
        $record = $this->permission->update($data, $id);

        return response()->json(['success'=> 'Permission Updated  successfully :)', 'data' => $record]);
    }

    public function destroy($id)
    {
            $this->permission->delete($id);
            return response()->json(['success' =>'Permission Deleted Successfully']);

    }


}
