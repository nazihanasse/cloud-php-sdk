<?php


namespace SkyCentrics\Cloud\Annotation;

/**
 * @Annotation
 *
 * Class Property
 * @package SkyCentrics\Cloud\Mapper
 */
class Property extends AbstractAnnotation
{
    /**
     * @var string
     */
    protected $property;

    /**
     * @var string
     */
    protected $type;

    /**
     * Property constructor.
     * @param $values
     */
    public function __construct(
        $values
    )
    {
        $this->property = $values['property'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function getPropertyName()
    {
        return $this->property;
    }

    /**
     * @return string|null
     */
    public function getMethod()
    {
        return $this->context instanceof \ReflectionMethod ? $this->context->getName() : null;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function toType($value)
    {
        return self::getTypeHandler($this->type)($value);
    }

    /**
     * @return array
     */
    public static function getTypeHandler(string $type)
    {
        $handlers = [
            'int' => function($value){return (int)$value;},
            'string' => function($value){return (string)$value;},
            'float' => function($value){return (float)$value;},
            'array' => function($value){return (array)$value;},
            'datetime' => function($value){return new \DateTime($value);},
            'default' => function($value){return $value;}
        ];

        return $handlers[$type] ?? $handlers['default'];
    }

}