<?php


namespace SkyCentrics\Cloud\Query;


use SkyCentrics\Cloud\Annotation\AnnotationMapperInterface;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class AbstractQuery
 * @package SkyCentrics\Cloud\Query
 */
abstract class AbstractQuery implements QueryInterface
{
    /**
     * @var AnnotationMapperInterface
     */
    private $annotationMapper;

    /**
     * @param AnnotationMapperInterface $annotationMapper
     */
    final public function setAnnotationMapper(AnnotationMapperInterface $annotationMapper)
    {
        $this->annotationMapper = $annotationMapper;
    }

    /**
     * @param $cloudDTO
     * @param ResponseInterface|null $response
     * @return mixed
     */
    final public function map($cloudDTO, ResponseInterface $response = null)
    {
        $data = null;

        if($response){
            $data = $response->getData() ?? [];
        }

        return $this->annotationMapper->map($cloudDTO, $data);
    }
}