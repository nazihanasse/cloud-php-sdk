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
        $valueFounded = false;

        foreach ((explode('.', $key)) as $level => $keyName){

            if($level === 0){
                if($source[$keyName]){
                    $value = $source[$keyName];
                    $valueFounded = true;
                }else{
                    $valueFounded = false;
                    break;
                }
            }else{
                if(isset($value[$keyName])){
                    $value = $value[$keyName];
                    $valueFounded = true;
                }else{
                    $valueFounded = false;
                }
            }
        }

        /** @var \ReflectionProperty  $property */
        $property = $annotation->getContext();

        if(!$valueFounded){
            return null;
        }

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
        $keys = explode('.', $key);

        foreach ($keys as $level => $keyName){
            if($level === 0){
                if(!isset($source[$keyName])){
                    $source[$keyName] = [];
                }

                $value = &$source[$keyName];

            }else{
                $currValue = &$value;
                $this->build($currValue, $keyName);
                $value = &$currValue[$keyName];
            }

        }

        /** @var \ReflectionProperty $property */
        $property = $annotation->getContext();

        $property->setAccessible(true);
        $value = $property->getValue($target);

        unset($keys, $value, $currValue);

        return $source;
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

        return $value;
    }
}