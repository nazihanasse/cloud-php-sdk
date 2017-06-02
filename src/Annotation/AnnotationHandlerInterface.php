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
     * @param $source
     * @return mixed
     */
    public function handle(AnnotationInterface $annotation, $target, $source);
}