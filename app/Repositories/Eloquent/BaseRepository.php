<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById(int $modelId)
    {
        return $this->model->find($modelId)->first();
    }

    public function create(array $data)
    {

        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id)->first();
        return $record->update($data);
    }

    public function delete($id)
    {
        $record = $this->model->find($id)->first();
        return $record->delete();
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
