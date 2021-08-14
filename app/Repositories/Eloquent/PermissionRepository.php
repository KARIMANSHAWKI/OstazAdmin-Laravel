<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;



class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function all()
    {
        return $this->permission->all();
    }

    public function create(array $data)
    {

        $permission =new Permission();
        $permission->name = $data['name'];
        $permission->save();
        return $permission;

    }

    public function getUserById($id)
    {
        $permission = $this->permission->where('id',$id)->first();

        return $permission;
    }

    public function update(array $data, $id)
    {
        $permission = $this->permission->where('id',$id)->first();
        $permission->name = $data["name"];
        $permission->save();
        return $permission;
    }


    public function delete($id)
    {
        $record = $this->permission->where('id', $id)->first();
        return $record->delete();
    }


}
