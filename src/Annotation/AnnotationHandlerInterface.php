<?php


namespace SkyCentrics\Cloud\Annotation;

/**
 * Interface AnnotationHandlerInterface
 * @package SkyCentrics\Cloud\Annotation
 */
interface AnnotationHandlerInterface
{
    /**
     * @param AnnotationInterface $annotation
     * @param $target
     * @param array $source
     * @return mixed
     */
    public function fromSource(AnnotationInterface $annotation, &$target, $source);

    /**
     * @param AnnotationInterface $annotation
     * @param $target
     * @return mixed
     */
    public function fromTarget(AnnotationInterface $annotation, $target, &$source);
}