<?php


namespace MichalWolinski\Repository\Interfaces;


use Illuminate\Database\Eloquent\Builder;

/**
 * Interface Criterion
 * @package MichalWolinski\Repository\Interfaces
 */
interface Criterion
{
    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function apply(Builder $query): Builder;
}
