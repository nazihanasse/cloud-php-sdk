<?php


namespace SkyCentrics\Cloud\Annotation;


use SkyCentrics\Cloud\Annotation\AnnotationReader;
use SkyCentrics\Cloud\Annotation\AnnotationReaderInterface;
use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\Exception\CloudAnnotationException;

/**
 * Class AnnotationMapper
 * @package SkyCentrics\Cloud\Mapper
 */
class AnnotationMapper implements AnnotationMapperInterface
{
    /**
     * @var AnnotationReaderInterface
     */
    protected $annotationReader;

    /**
     * @var AnnotationHandlerInterface
     */
    protected $handler;

    /**
     * AnnotationMapper constructor.
     * @param \SkyCentrics\Cloud\Annotation\AnnotationReaderInterface $annotationReader
     * @param AnnotationHandlerInterface $annotationHandler
     */
    public function __construct(
        AnnotationReaderInterface $annotationReader,
        AnnotationHandlerInterface $annotationHandler
    )
    {
        $this->annotationReader = $annotationReader;
        $this->handler = $annotationHandler;
    }

    /**
     * @param string|object $class
     * @param array|null $data
     * @return mixed
     * @throws CloudAnnotationException
     */
    public function map($class, array $data = null)
    {
        if(is_string($class)){

            if(!class_exists($class)){
                throw new CloudAnnotationException(sprintf("Can't find class by name %s .", $class));
            }

            $refClass = new \ReflectionClass($class);
            $class = $refClass->newInstanceWithoutConstructor();

            unset($refClass);
        }

        $annotations = $this->annotationReader->read($class);

        if($data !== null) {
            /** @var AnnotationInterface $annotation */
            foreach ($annotations as $annotation) {
                $this->handler->fromSource($annotation, $class, $data);
            }

            return $class;
        }

        /** @var AnnotationInterface $annotation */
        foreach ($annotations as $annotation){
            $data = [];
            $this->handler->fromTarget($annotation, $class, $data);
        }

        return $data;

    }

}