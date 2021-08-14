<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Program;
use App\Models\Category;



use Illuminate\Database\Eloquent\Model;



class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all()
    {
        return $this->category->all();
    }

    public function create(array $data)
    {

        $category =new Category();
        $category->name = $data['name'];

        if (isset($data['status'])) {
            $category->status = '0';
        } else {
            $category->status = '1';
        }
        $category->save();
        return $category;

    }

    public function getUserById($id)
    {
        $category = $this->category->where('id',$id)->first();

        return  $category;
    }

    public function update(array $data, $id)
    {
        $category = $this->category->where('id',$id)->first();
        $category->name = $data["name"];

        if (isset($data['status'])) {
            $category->status = '0';
        } else {
            $category->status = '1';
        }
        $category->save();
        return $category;
    }


    public function delete($id)
    {
        $record = $this->category->where('id', $id)->first();
        return $record->delete();
    }


}
