<?php

namespace App\Repository\Interfaces;

use Illuminate\Support\Collection;

interface BlogPostRepositoryInterface
{
    public function all(): Collection;

}
