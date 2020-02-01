<?php

namespace MichalWolinski\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use MichalWolinski\Repository\Exceptions\RepositoryException;

interface Repository
{
    /**
     * @param Model $model
     *
     * @return \MichalWolinski\Repository\Repository
     */
    public function getInstance(Model $model): Repository;

    /**
     * @param mixed $id
     *
     * @return Model
     */
    public function get($id): ?Model;

    /**
     * @param array $ids
     *
     * @return Collection
     */
    public function getMany(array $ids): Collection;

    /**
     * @return Collection
     */
    public function getAll(): Collection;
}