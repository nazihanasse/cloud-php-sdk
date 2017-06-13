<?php


namespace SkyCentrics\Cloud\Annotation;
use Doctrine\Common\Annotations\AnnotationException;

/**
 * @Annotation
 *
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
    protected $getter;

    /**
     * @var mixed
     */
    protected $setter;

    /**
     * Property constructor.
     * @param array $values
     */
    public function __construct(
        array $values
    )
    {
        if(empty($values['key'])){
            /** @var \ReflectionProperty $context */
            $context = $this->getContext();
            throw new AnnotationException(sprintf("Property 'key' is required in the class property %s.", $context->getName()));
        }

        $values = array_merge([
            'key' => null,
            'getter' => null,
            'setter' => null
        ], $values);

        $this->key = $values['key'];
        $this->getter = $values['getter'];
        $this->setter = $values['setter'];
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getGetter()
    {
        return $this->getter;
    }

    /**
     * @return mixed
     */
    public function getSetter()
    {
        return $this->setter;
    }

}
