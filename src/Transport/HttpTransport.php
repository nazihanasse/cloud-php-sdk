<?php


namespace SkyCentrics\Cloud\Transport;


use SkyCentrics\Cloud\Exception\CloudResponseException;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponse;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\Response;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use Zend\Http\Client;
use Zend\Http\Headers;
use Zend\Stdlib\Parameters;
use Zend\Uri\Http;

/**
 * Class HttpTransport
 * @package SkyCentrics\Cloud\Transport
 */
class HttpTransport implements TransportInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * HttpTransport constructor.
     */
    public function __construct()
    {
        $this->client = new Client(null, [
            'keepalive' => true
        ]);
    }

    /**
     * @param RequestInterface $request
     * @return Response
     * @throws CloudResponseException
     */
    public function send(RequestInterface $request)
    {
        $transportRequest = new \Zend\Http\Request();
        $transportRequest->setHeaders((new Headers())->addHeaders($request->getHeaders()));
        $transportRequest->setMethod($request->getMethod());
        $transportRequest->setUri($request->getUri() . ltrim($request->getPath(), '/'));
        $transportRequest->setQuery(new Parameters($request->getQuery()));
        $transportRequest->setContent(json_encode($request->getData()));

        $client = $this->client;

        $transportResponse = $client->send($transportRequest);

        if(!$transportResponse->isSuccess()){
            $response = new Response(
                $transportResponse->getStatusCode(),
                (array)$transportResponse->getHeaders(),
                $transportResponse->getContent(),
                $request);

            throw new CloudResponseException($response);
        }

        return new Response(
            $transportResponse->getStatusCode(),
            (array)$transportResponse->getHeaders(),
            $transportResponse->getContent(),
            $request
        );
    }

    /**
     * @param MultiRequestInterface $multiRequest
     * @return MultiResponse
     */
    public function sendMulti(MultiRequestInterface $multiRequest) : MultiResponseInterface
    {
        $responses = [];

        foreach ($multiRequest as $request){
            $responses[] = $this->send($request);
        }

        return new MultiResponse($responses);
    }
}