<?php


namespace SkyCentrics\Cloud\Transport;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use SkyCentrics\Cloud\Exception\CloudResponseException;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponse;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\Response;

/**
 * Class GuzzleHttpTransport
 * @package SkyCentrics\Cloud\Transport
 */
class GuzzleHttpTransport implements TransportInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * GuzzleHttpTransport constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param RequestInterface $request
     * @return Response
     * @throws CloudResponseException
     */
    public function send(RequestInterface $request)
    {
        $guzzleRequest = $this->createRequest($request);

        try{
            $response = $this->client->send($guzzleRequest);
        }catch (ClientException $exception){
            $guzzleResponse = $exception->getResponse();

            $response = new Response(
                $guzzleResponse->getStatusCode(),
                $guzzleResponse->getHeaders(),
                $guzzleResponse->getBody(),
                $request
            );

            throw new CloudResponseException(
                $response
            );
        }

        return new Response(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody(),
            $request
        );
    }

    /**
     * @param MultiRequestInterface $multiRequest
     * @return MultiResponseInterface
     */
    public function sendMulti(MultiRequestInterface $multiRequest): MultiResponseInterface
    {
        $guzzleRequests = [];
        $responses = [];

        foreach ($multiRequest as $request){
            $guzzleRequests[] = $this->createRequest($request);
        }

        $pool = new Pool($this->client, $guzzleRequests, [
            'concurrency' => 100,
            'fulfilled' =>
                function($guzzleResponse, $index) use (&$responses, $multiRequest){

                $responses[$index] = new Response(
                    $guzzleResponse->getStatusCode(),
                    $guzzleResponse->getHeaders(),
                    $guzzleResponse->getBody(),
                    $multiRequest->getRequests()[$index]
                    );
            }
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return new MultiResponse($responses);
    }

    /**
     * @param RequestInterface $request
     * @return Request
     */
    protected function createRequest(RequestInterface $request)
    {
        $uri = (new Uri($request->getUri() . ltrim($request->getPath(), '/')))->withQuery(http_build_query($request->getQuery()));
        $guzzleRequest = new Request(
            $request->getMethod(),
            $uri,
            $request->getHeaders(),
            json_encode($request->getData())
            );

        return $guzzleRequest;
    }
}