<?php


namespace SkyCentrics\Cloud\Annotation;

/**
 * @Annotation
 *
 * Class Property
 * @package SkyCentrics\Cloud\Mapper
 */
class Property implements AnnotationInterface
{
    /**
     * @var string
     */
    protected $property;

    /**
     * @var string
     */
    protected $method;

    /**
     * Property constructor.
     * @param $values
     */
    public function __construct(
        $values
    )
    {
        $this->property = $values['property'];
        $this->method = $values['method'];
    }

    /**
     * @return string
     */
    public function getPropertyName()
    {
        return $this->property;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}