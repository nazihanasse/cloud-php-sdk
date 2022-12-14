<?php


namespace SkyCentrics\Cloud\Annotation;

use SkyCentrics\Cloud\DTO\CloudDTOInterface;


/**
 * Interface AnnotationInterface
 * @package SkyCentrics\Cloud\Annotation
 */
interface AnnotationInterface
{
    /**
     * @param \Reflector $reflection
     */
    public function setContext(\Reflector $reflection);

    /**
     * @return \Reflection
     */
    public function getContext();
}