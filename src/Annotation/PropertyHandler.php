<?php


namespace SkyCentrics\Cloud\Annotation;

use SkyCentrics\Cloud\Exception\CloudAnnotationException;

/**
 * Class PropertyHandler
 * @package SkyCentrics\Cloud\Annotation
 */
class PropertyHandler implements AnnotationHandlerInterface
{
    /**
     * @param AnnotationInterface $annotation
     * @param $target
     * @param array|null $source
     * @return mixed|null
     * @throws CloudAnnotationException
     */
    public function fromSource(AnnotationInterface $annotation, &$target, $source)
    {
        if(!$annotation instanceof Property){
            return null;
        }

        $key = $annotation->getKey();

        $value = null;

        foreach ((explode('.', $key)) as $level => $keyName){

            if($level === 0){
                if($source[$keyName]){
                    $value = $source[$keyName];
                }else{
                    break;
                }
            }else{
                if(isset($value[$keyName])){
                    $value = $value[$keyName];
                }
            }
        }

        /** @var \ReflectionProperty  $property */
        $property = $annotation->getContext();

        if($annotation->getSetter()){
            $setterName = $annotation->getGetter();

            if(!method_exists($target, $setterName)){
                throw new CloudAnnotationException(sprintf("Method %s doesn't exists int the target class %s .", $setterName, get_class($target)));
            }

            $target->{$setterName}($value);
        }else{

            $property->setAccessible(true);
            $property->setValue($target, $value);
        }
    }

    /**
     * @param AnnotationInterface $annotation
     * @param $target
     * @return mixed
     */
    public function fromTarget(AnnotationInterface $annotation, $target, &$source)
    {
        if(!$annotation instanceof Property){
            return null;
        }

        $key = $annotation->getKey();

        $value = [];

        foreach (explode('.', $key) as $level => $keyName){
            if($level === 0){
                if(!isset($source[$keyName])){
                    $source[$keyName] = [];
                }

                $value = &$source[$keyName];

            }else{

                $currValue = &$value[$prevName];

                $this->build($currValue, $keyName);
            }

            $prevName = $keyName;
        }

        /** @var \ReflectionProperty $property */
        $property = $annotation->getContext();

        $value = $property->getValue($target);

        return $value;
    }

    /**
     * @param $value
     * @param $keyName
     */
    protected function build(&$value, $keyName)
    {
        if(!isset($value[$keyName])){
            $value[$keyName] = [];
        };
    }
}