<?php


namespace SkyCentrics\Cloud\Mapper;


use SkyCentrics\Cloud\Annotation\AnnotationReader;
use SkyCentrics\Cloud\Annotation\AnnotationReaderInterface;
use SkyCentrics\Cloud\Annotation\Method;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;

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
     * @var
     */
    protected static $reader;

    /**
     * AnnotationMapper constructor.
     * @param AnnotationReaderInterface $annotationReader
     */
    final private function __construct(
        AnnotationReaderInterface $annotationReader
    )
    {
        $this->annotationReader = $annotationReader;
    }

    /**
     * @return AnnotationReader
     */
    public static function getReader() : AnnotationReader
    {
        if(!self::$reader instanceof AnnotationReaderInterface){
            self::$reader = new AnnotationReader();
        }

        return self::$reader;
    }

    /**
     * @param array $responseData
     * @param $class
     */
    public static function fromResponse(array $responseData, $class)
    {
        $annotations = self::getReader()->read($class);

        foreach ($annotations as $annotation){

            if($annotation instanceof Method){
                $propertyName = $annotation->getPropertyName();

                if(isset($responseData[$propertyName]) && !empty($annotation->getMethod())){
                    $class->{$annotation->getMethod()}($annotation->toType($responseData[$propertyName]));
                }
            }
        }
    }

    /**
     * @param CloudDTOInterface $class
     */
    public static function toRequest(CloudDTOInterface $class)
    {

    }


}