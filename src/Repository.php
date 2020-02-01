<?php

namespace MichalWolinski\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use MichalWolinski\Repository\Interfaces\Repository as RepositoryInterface;

/**
 * Class Repository
 * @package MichalWolinski\Repository
 */
class Repository implements RepositoryInterface
{

    /**
     * @var Model
     */
    private Model $model;
    /**
     * @var Builder
     */
    private Builder $builder;

    /**
     * @param string $model
     *
     * @return Repository
     */
    public function getInstance(Model $model): Repository
    {
        $instance = new self;
        $instance->setModel($model);

        return $instance;
    }

    /**
     * @param mixed $id
     *
     * @return Model
     */
    public function get($id): ?Model
    {
        return $this->builder->find($id);
    }

    /**
     * @param array $ids
     *
     * @return Collection
     */
    public function getMany(array $ids): Collection
    {
        return $this->builder->findMany($ids);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->builder->get();
    }

    /**
     * @param Model $model
     *
     * @return void
     */
    private function setModel(Model $model): void
    {
        $this->model   = $model;
        $this->builder = $this->model->newModelQuery();
    }
}