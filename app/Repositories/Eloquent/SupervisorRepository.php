<?php
namespace App\Repositories\Eloquent;

use App\Models\Admin;
use App\Models\Permission;

use App\Repositories\Interfaces\SupervisorRepositoryInterface;

class SupervisorRepository extends BaseRepository implements SupervisorRepositoryInterface
{
    protected $supervisor;

    public function __construct(Admin $supervisor)
    {
        $this->supervisor = $supervisor;
    }

    // Get all instances of model
    public function all()
    {
        return $this->supervisor->all();
    }


    // create a new record in the database
    public function create(array $data)
    {
        $supervisor =new Admin();
        $supervisor->first_name = $data['first_name'];
        $supervisor->last_name = $data['last_name'];
        $supervisor->email = $data['email'];
        $supervisor->phone = $data['phone'];
        $supervisor->password = bcrypt($data['password']);
        if (isset($data['status'])) {
            $supervisor->status = '0';
        } else {
            $supervisor->status = '1';
        }

        $supervisor->syncPermissions($data['permissions']);
        $supervisor->assignRole('supervisor');

        $supervisor->save();
        $supervisor->assignRole('admin');
        return $supervisor;
    }

    public function getUserById($id)
    {
        $supervisor = $this->supervisor->where('id',$id)->first();

        return  $supervisor;
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $supervisor = $this->supervisor->find($id)->first();
        $supervisor->first_name = $data['first_name'];
        $supervisor->last_name = $data['last_name'];
        $supervisor->email = $data['email'];
        $supervisor->phone = $data['phone'];

        $supervisor->syncPermissions($data['permissions']);
        $supervisor->assignRole('supervisor');
        $supervisor->save();

        return $supervisor;
    }

    // remove record from the database
    public function delete($id)
    {
        $record = $this->supervisor->find($id)->first();
        return $record->delete();
    }


    public function getAllPermission()
    {
        $permissions = Permission::all();
        return $permissions;
    }
}
