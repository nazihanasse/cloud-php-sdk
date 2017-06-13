<?php


namespace SkyCentrics\Cloud\Transport;


use SkyCentrics\Cloud\Exception\CloudResponseException;
use SkyCentrics\Cloud\Exception\CloudTransportException;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponse;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class AbstractTransport
 * @package SkyCentrics\Cloud\Transport
 */
abstract class AbstractTransport implements TransportInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws CloudResponseException
     * @throws CloudTransportException
     */
    public function send(RequestInterface $request) : ResponseInterface
    {
        $requests = [];
        $isMulti = false;

        if($request instanceof MultiRequestInterface){
            $isMulti = true;

            $requests = $this->buildMulti($request);

        }else{
            $requests[] = $request;
        }

        // Sending requests
        $responses = $this->sendRequests($requests);

        foreach ($responses as $key => $response){

            if(!$response instanceof ResponseInterface){
                throw new CloudTransportException(sprintf("Response must be instance of %s, but %s is given.", ResponseInterface::class, get_class($response)));
            }

            //@TODO: need to resolve what will we do with response exceptions in multi-requests.
            if(!$response->isSuccess()){

                if($isMulti){
                    unset($responses[$key]);
                }else{
                    throw new CloudResponseException($response);
                }
            }
        }

        return $isMulti ? new MultiResponse($responses) : $responses[0];

    }

    /**
     * @param MultiRequestInterface $multiRequest
     * @param array $map
     * @return array
     */
    protected function buildMulti(MultiRequestInterface $multiRequest, &$map = []) : array
    {
        foreach ($multiRequest as $key => $request){
            if($request instanceof $multiRequest){
                $this->buildMulti($request, $map);
                continue;
            }

            $map[] = $request;
        }

        return $map;
    }

    /**
     * @param array $requests
     * @return array<ResponseInterface>
     */
    abstract protected function sendRequests(array $requests) : array;

}