<?php


namespace SkyCentrics\Cloud\Annotation;


interface AnnotationReaderInterface
{
    public function read($className, array $annotations = []);
}