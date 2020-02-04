<?php


namespace MichalWolinski\Repository\Criteria;

use MichalWolinski\Repository\Interfaces\Criterion as CriterionInterface;

/**
 * Class Criterion
 * @package MichalWolinski\Repository\Criteria
 */
abstract class Criterion implements CriterionInterface
{
    /**
     * @var null
     */
    protected $value;

    /**
     * Country constructor.
     *
     * @param null $value
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }
}