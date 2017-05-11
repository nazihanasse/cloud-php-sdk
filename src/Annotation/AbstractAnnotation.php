<?php


namespace SkyCentrics\Cloud\Annotation;


/**
 * Class AbstractAnnotation
 * @package SkyCentrics\Cloud\Annotation
 */
abstract class AbstractAnnotation implements AnnotationInterface
{
    /**
     * @var \Reflection
     */
    protected $context;

    /**
     * @param \Reflector $reflection
     */
    public function setContext(\Reflector $reflection)
    {
        $this->context = $reflection;
    }
}