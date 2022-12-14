<?php


namespace SkyCentrics\Cloud\Query;


use SkyCentrics\Cloud\Annotation\AnnotationMapper;
use SkyCentrics\Cloud\Annotation\AnnotationMapperInterface;
use SkyCentrics\Cloud\Exception\CloudQueryException;
use SkyCentrics\Cloud\Security\AbstractSecurityProvider;
use SkyCentrics\Cloud\Transport\Request\MultiRequest;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class MultiQuery
 * @package SkyCentrics\Cloud\Query
 */
class MultiQuery implements QueryInterface
{
    /**
     * @var array
     */
    protected $queries;

    /**
     * @var array
     */
    protected $queryMap;

    /**
     * @var array
     */
    protected $resultMap;

    /**
     * MultiQuery constructor.
     * @param array $queries
     * @param AnnotationMapperInterface $annotationMapper
     * @param AbstractSecurityProvider $securityProvider
     */
    public function __construct(
        array $queries,
        AnnotationMapperInterface $annotationMapper,
        AbstractSecurityProvider $securityProvider
    )
    {
        $this->queries = [];
        $this->queryMap = [];
        $this->resultMap = [];

        /** @var AbstractQuery $query */
        foreach ($queries as $query){
            if($query instanceof AbstractQuery){
                $query->setAnnotationMapper($annotationMapper);
                $query->setSecurityProvider($securityProvider);
            }
            $this->addQuery($query);
        }
    }

    /**
     * @param QueryInterface $query
     */
    public function addQuery(QueryInterface $query)
    {
        $this->queries[] = $query;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        $requests = [];

        /** @var QueryInterface $query */
        foreach ($this->queries as $query){
            $queryRequest = $query->createRequest();

            if($queryRequest instanceof MultiRequestInterface){
                $queryRequests = $queryRequest->getRequests();
            }else{
                $queryRequests = [$queryRequest];
            }

            foreach ($queryRequests as $request){

                $hash = spl_object_hash($request);

                $this->queryMap[$hash] = $query;
                $this->resultMap[$hash] = null;

                $requests[] = $request;
            }
        }

        return new MultiRequest($requests);
    }

    /**
     * @param MultiResponseInterface $response
     * @return array
     * @throws CloudQueryException
     */
    public function mapResponse(ResponseInterface $response)
    {
        if(!$response instanceof MultiResponseInterface){
            throw new CloudQueryException("You must using the Multi response for Multi Requests.");
        }

        foreach ($response as $responseItem){
            $requestHash = spl_object_hash($responseItem->getRequest());

            if(!isset($this->queryMap[$requestHash])){
                continue;
            }

            /** @var QueryInterface $query */
            $query = $this->queryMap[$requestHash];

            $this->resultMap[$requestHash] = $query->mapResponse($responseItem);
        }

        return array_values($this->resultMap);
    }
}