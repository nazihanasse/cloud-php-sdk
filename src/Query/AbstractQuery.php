<?php


namespace SkyCentrics\Cloud\Query;


use SkyCentrics\Cloud\Annotation\AnnotationMapperInterface;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\Security\AbstractSecurityProvider;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
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
     * @var AbstractSecurityProvider
     */
    private $securityProvider;

    /**
     * @param AnnotationMapperInterface $annotationMapper
     */
    final public function setAnnotationMapper(AnnotationMapperInterface $annotationMapper)
    {
        $this->annotationMapper = $annotationMapper;
    }

    /**
     * @return AnnotationMapperInterface
     */
    final public function getAnnotationMapper()
    {
        return $this->annotationMapper;
    }

    /**
     * @param AbstractSecurityProvider $securityProvider
     */
    final public function setSecurityProvider(AbstractSecurityProvider $securityProvider)
    {
        $this->securityProvider = $securityProvider;
    }

    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    final public function addSecurityHeaders(RequestInterface $request)
    {
        return $this->securityProvider->provide($request);
    }

    /**
     * @param $cloudDTO
     * @param array|null $data
     * @return mixed
     * @internal param null|ResponseInterface $response
     */
    final public function map($cloudDTO, array $data = null)
    {
        return $this->annotationMapper->map($cloudDTO, $data);
    }
}