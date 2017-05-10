<?php


namespace SkyCentrics\Cloud\Mapper;


use SkyCentrics\Cloud\Annotation\AnnotationReader;
use SkyCentrics\Cloud\Annotation\AnnotationReaderInterface;
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
     * @return AnnotationMapperInterface
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
        $reader = self::getReader();

        $annotations = $reader->read($class);
    }

    /**
     * @param CloudDTOInterface $class
     */
    public static function toRequest(CloudDTOInterface $class)
    {

    }


}