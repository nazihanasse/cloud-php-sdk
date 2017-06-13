<?php


namespace SkyCentrics\Cloud\Annotation;


/**
 * Interface AnnotationMapperInterface
 * @package SkyCentrics\Cloud\Annotation
 */
interface AnnotationMapperInterface
{
    /**
     * @param $class
     * @param array|null $data
     * @return mixed
     */
    public function map($class, array $data = null);
}