<?php


namespace SkyCentrics\Cloud\Annotation;

/**
 * Class Property
 * @package SkyCentrics\Cloud\Annotation
 */
class Property extends AbstractAnnotation
{
    /**
     * @var mixed
     */
    protected $key;

    /**
     * @var mixed
     */
    protected $property;

    /**
     * @var mixed
     */
    protected $method;

    /**
     * Property constructor.
     * @param array $values
     */
    public function __construct(
        array $values
    )
    {
        $this->key = $values['key'];
        $this->property = $values['property'];
        $this->method = $values['method'];
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getProperty()
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
