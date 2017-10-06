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
     * @var AnnotationMapperInterface
     */
    protected $annotationMapper;

    /**
     * PropertyHandler constructor.
     * @param AnnotationMapperInterface $annotationMapper
     */
    public function __construct(
        AnnotationMapperInterface $annotationMapper
    )
    {
        $this->annotationMapper = $annotationMapper;
    }

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
                if(isset($source[$keyName])){
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

        if($annotation->getMap()){
            $value = $this->annotationMapper->map($annotation->getMap(), $value);
        }elseif($annotation->getToType()){
            $type = $annotation->getToType();

            $value = $this->castType($type, $value);
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
     * @param $source
     * @return null
     * @throws CloudAnnotationException
     */
    public function fromTarget(AnnotationInterface $annotation, $target, &$source)
    {
        if(!$annotation instanceof Property){
            return null;
        }

        $key = $annotation->getKey();

        $value = [];
        $keys = explode('.', $key);

        // Here we are building an hierarchy according annotations. If annotation value
        // contains key.syb_key.sub_key1 , then there will be built the next array:
        // [key => [sub_key => [sub_key1 => 'property_value']]]
        foreach ($keys as $level => $keyName){
            if($level === 0){
                if(!isset($source[$keyName])){
                    $source[$keyName] = [];
                }

                $value = &$source[$keyName];

            }else{
                $currValue = &$value;
                $this->build($currValue, $keyName);
                //Attention. Value by link !
                $value = &$currValue[$keyName];
            }

        }

        /** @var \ReflectionProperty $property */
        $property = $annotation->getContext();

        $property->setAccessible(true);

        if($annotation->getGetter()){

            $getterName = $annotation->getGetter();

            if(!method_exists($target, $getterName)){
                throw new CloudAnnotationException(sprintf("Method with name \"%s\" doesn't exists in the class \"%s\" ", $getterName, get_class($target)));
            }

            $propertyValue = $target->{$getterName}();

        }
        elseif($annotation->getMap()){
            $propertyValue = $this->annotationMapper->map($property->getValue($target));
        }
        else{
            $propertyValue = $property->getValue($target);

            if($annotation->getFromType()){
                $type = $annotation->getFromType();

                $propertyValue = $this->castType($type, $propertyValue);
            }
        }

        //Set property value to the linked variable !
        $value = $propertyValue;

        unset($keys, $value, $currValue);

        return $source;
    }

    /**
     * @param $type
     * @param $value
     * @return bool|float|int|string
     * @throws CloudAnnotationException
     */
    protected function castType($type, $value)
    {
        switch ($type){
            case 'int':
            case 'integer':
                $value = (int)$value; break;
            case 'string':
                $value = (string)$value; break;
            case 'float':
                $value = (float)$value; break;
            case 'bool':
            case 'boolean':
                $value = (bool)$value; break;
            case 'double':
                $value = (double)$value; break;
            case 'real':
                $value = (real)$value; break;
            case 'object':
                $value = (object)$value; break;
            case 'array':
                $value = (array)$value; break;
            case '\DateTimeZone':
                if(!empty($value)){
                    $value = new $type($value);
                }else{
                    $value = null;
                }
                break;
            default:
                if(class_exists($type)){
                    $value = new $type($value);
                }else{
                    throw new CloudAnnotationException(sprintf("Can't evaluate a type [%s] in the class \"%s\" for property \"%s\".", $type, get_class($target), $property->getName()));
                }
                break;
        }

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

        return $value;
    }
}