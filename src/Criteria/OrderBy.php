<?php


namespace MichalWolinski\Repository\Criteria;


use Illuminate\Database\Eloquent\Builder;

/**
 * Class OrderBy
 * @package MichalWolinski\Repository\Criteria
 */
class OrderBy extends Criterion
{
    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        $query->groupBy($this->value);

        return $query;
    }
}