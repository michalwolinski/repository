<?php


namespace MichalWolinski\Repository\Criteria;


use Illuminate\Database\Eloquent\Builder;

class Status extends Criterion
{
    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        $query->where('status', $this->value);

        return $query;
    }
}