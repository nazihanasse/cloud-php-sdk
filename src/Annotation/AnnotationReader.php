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

        $this->doctrineReader->addNamespace(__NAMESPACE__);
    }

    /**
     * @param $className
     * @return array
     */
    public function read($className, array $annotations = [])
    {
        $refClass = new \ReflectionClass($className);

        /** @var AnnotationInterface $classAnnotation */
        $classAnnotation = $this->doctrineReader->getClassAnnotations($refClass);

        if($classAnnotation){
            $classAnnotation->setContext($refClass);
            $annotations[] = $classAnnotation;
        }

        $refItems = array_merge($refClass->getMethods(), $refClass->getProperties());

        foreach ($refItems as $refItem){

            $annotation = $refItem instanceof \ReflectionMethod ? $this->doctrineReader->getMethodAnnotations($refItem) : $this->doctrineReader->getPropertyAnnotations($refItem);

            if($annotation){
                /** @var AnnotationInterface $annotationItem */
                foreach ($annotation as $annotationItem){
                    $annotationItem->setContext($refItem);
                    $annotations[] = $annotationItem;
                }
            }
        }

        unset($refClass);

        return $annotations;
    }
}