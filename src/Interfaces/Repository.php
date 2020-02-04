<?php

namespace MichalWolinski\Repository\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

    /**
     * @param string $column
     * @param string|null $operator
     * @param string|null $value
     *
     * @return Collection
     */
    public function getWhere(string $column, ?string $operator = null, ?string $value = null): Collection;

    /**
     * @param Criterion[] $criteria
     * @param Builder|null $query
     *
     * @return Collection
     */
    public function getByCriteria(array $criteria, ?Builder $query = null): Collection;
}