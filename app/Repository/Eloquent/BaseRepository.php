<?php

namespace App\Repository\Eloquent;

use App\Repository\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $args): Model
    {
        return $this->model->create($args);
    }

    public function update(int $id, array $args): Model
    {
        $this->model = $this->find($id);

        $this->model->update($args);

        return $this->model;
    }

    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

    public function find(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
