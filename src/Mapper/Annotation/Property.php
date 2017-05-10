<?php


namespace SkyCentrics\Cloud\Mapper\Annotation;


use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 *
 * Class Property
 * @package SkyCentrics\Cloud\Mapper
 */
class Property
{
    /**
     * @var string
     */
    protected $property;

    /**
     * Property constructor.
     * @param $propertyName
     */
    public function __construct(
        $propertyName
    )
    {
        $this->property = $propertyName;
    }

    /**
     * @return string
     */
    public function getPropertyName()
    {
        return $this->property;
    }
}