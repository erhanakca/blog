<?php

namespace App\Repository\Eloquent;

use App\Models\Blogpost;
use App\Repository\Interfaces\BlogPostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return Blogpost::all();
    }
}
