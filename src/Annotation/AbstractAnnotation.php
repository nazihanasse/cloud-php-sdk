<?php


namespace SkyCentrics\Cloud\Annotation;


/**
 * Class AbstractAnnotation
 * @package SkyCentrics\Cloud\Annotation
 */
abstract class AbstractAnnotation implements AnnotationInterface
{
    /**
     * @var array
     */
    protected $values;

    /**
     * AbstractAnnotation constructor.
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    public function setValues(array $values)
    {
        $this->values = $values;
    }
}