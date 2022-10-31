<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function create(array $args): Model;
    public function update(int $id, array $args): Model;
    public function delete(int $id): bool;
    public function find(int $id): Model;
}
