<?php


namespace SkyCentrics\Cloud\Annotation;


/**
 * Interface AnnotationInterface
 * @package SkyCentrics\Cloud\Annotation
 */
interface AnnotationInterface
{
    /**
     * @return string
     */
    public static function getName() : string;

    /**
     * @return array
     */
    public function getValues() : array;

    /**
     * @param array $values
     * @return mixed
     */
    public function setValues(array $values);
}