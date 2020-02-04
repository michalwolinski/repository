<?php


namespace MichalWolinski\Repository\Criteria;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Id
 * @package MichalWolinski\Repository\Criteria
 */
class Id extends Criterion
{
    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        $query->where('id', $this->value);

        return $query;
    }
}