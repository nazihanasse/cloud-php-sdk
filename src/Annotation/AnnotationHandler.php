<?php


namespace SkyCentrics\Cloud\Annotation;


use SkyCentrics\Cloud\Exception\CloudAnnotationException;
use SkyCentrics\Cloud\Exception\CloudException;

/**
 * Class AnnotationHandler
 * @package SkyCentrics\Cloud\Annotation
 */
class AnnotationHandler implements AnnotationHandlerInterface
{
    /**
     * @var array
     */
    protected $annotationsMap;

    /**
     * AnnotationHandler constructor.
     * @param array $annotationHandlers
     */
    public function __construct(array $annotationHandlers = [])
    {
        $this->annotationsMap = [];

        foreach ($annotationHandlers as $annotationClassName => $annotationHandler){
            $this->registerAnnotation($annotationClassName, $annotationHandler);
        }
    }

    /**
     * @param AnnotationInterface $annotation
     * @param $target
     * @param array $source
     * @return AnnotationHandlerInterface
     * @throws CloudAnnotationException
     */
    protected function getHandler(AnnotationInterface $annotation)
    {
        $annotationClassName = get_class($annotation);

        if(!isset($this->annotationsMap[$annotationClassName])){
            throw new CloudAnnotationException(sprintf("Annotation with the given name %s is'n regitered yet.", $annotationClassName));
        }

        return $this->annotationsMap[$annotationClassName];
    }

    /**
     * @param string $annotationClass
     * @param AnnotationHandlerInterface $annotationHandler
     * @throws CloudAnnotationException
     */
    public function registerAnnotation(string $annotationClass, AnnotationHandlerInterface $annotationHandler)
    {
        if(!class_exists($annotationClass)){
            throw new CloudAnnotationException(sprintf("Can't find annotation class by the given classname %s ", $annotationClass));
        }

        if(isset($this->annotationsMap[$annotationClass])){
            throw new CloudAnnotationException(sprintf("Annotation with given name %s is already registered !", $annotationClass));
        }

        $this->annotationsMap[$annotationClass] = $annotationHandler;
    }

    /**
     * @param AnnotationInterface $annotation
     * @param $target
     * @param array $source
     * @return mixed
     */
    public function fromSource(AnnotationInterface $annotation, &$target, $source)
    {
        $handler = $this->getHandler($annotation);

        return $handler->fromSource($annotation, $target, $source);
    }

    /**
     * @param AnnotationInterface $annotation
     * @param $target
     * @return mixed
     */
    public function fromTarget(AnnotationInterface $annotation, $target, &$source)
    {
        $handler = $this->getHandler($annotation);

        return $handler->fromTarget($annotation, $target, $source);
    }
}