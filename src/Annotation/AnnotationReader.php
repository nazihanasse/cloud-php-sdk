<?php


namespace SkyCentrics\Cloud\Annotation;

use Doctrine\Common\Annotations\DocParser;
use Doctrine\Common\Annotations\SimpleAnnotationReader;
use SkyCentrics\Cloud\Mapper\MapAnnotation;

/**
 * Class AnnotationReader
 * @package SkyCentrics\Cloud\Annotation
 */
class AnnotationReader implements AnnotationReaderInterface
{
    /**
     * @var \Doctrine\Common\Annotations\AnnotationReader
     */
    protected $doctrineReader;

    /**
     * AnnotationReader constructor.
     * @param \Doctrine\Common\Annotations\AnnotationReader $annotationReader
     */
    public function __construct()
    {
        $this->doctrineReader = new SimpleAnnotationReader(new DocParser());
    }

    /**
     * @param $className
     * @return array
     */
    public function read($className, array $annotations = [])
    {
        $annotations = [];

        $refClass = new \ReflectionClass($className);

        foreach ($refClass->getMethods() as $method){
            $annotation = $this->doctrineReader->getMethodAnnotations($method);

            if($annotation){
                $annotations[] = $annotation;
            }
        }

        unset($refClass);

        return $annotations;
    }
}