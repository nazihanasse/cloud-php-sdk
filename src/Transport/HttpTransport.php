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
class HttpTransport extends AbstractTransport
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
     * @param array $requests
     * @return array<ResponseInterface>
     */
    protected function sendRequests(array $requests): array
    {
        $responses = [];

        foreach ($requests as $request){
            $transportRequest = new \Zend\Http\Request();
            $transportRequest->setHeaders((new Headers())->addHeaders($request->getHeaders()));
            $transportRequest->setMethod($request->getMethod());
            $transportRequest->setUri($request->getUri() . ltrim($request->getPath(), '/'));
            $transportRequest->setQuery(new Parameters($request->getQuery()));
            $transportRequest->setContent(json_encode($request->getData()));

            $client = $this->client;

            $transportResponse = $client->send($transportRequest);

            $responses[] = new Response(
                $transportResponse->getStatusCode(),
                (array)$transportResponse->getHeaders(),
                $transportResponse->getContent(),
                $request
            );
        }

        return $responses;
    }
}