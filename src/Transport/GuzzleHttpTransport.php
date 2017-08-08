<?php


namespace SkyCentrics\Cloud\Transport;


use function foo\func;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
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
class GuzzleHttpTransport extends AbstractTransport
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
        $this->client = new Client(['timeout' => 1, 'allow_redirects' => false]);
    }

    /**
     * @param array<RequestInterface> $requests
     * @return array
     */
    protected function sendRequests(array $requests) : array
    {
        $responses = [];
        $guzzleRequests = [];

        foreach ($requests as $request){
            $guzzleRequests[] = $this->createRequest($request);
        }

        $pool = new Pool($this->client, $guzzleRequests, [
            'concurrency' => 100,
            'fulfilled' =>
                function(\GuzzleHttp\Psr7\Response $guzzleResponse, $index) use (&$responses, $requests){

                    if($guzzleResponse->getHeaderLine('Content-Type') === 'application/gzip'){
                        $body = gzdecode($guzzleResponse->getBody());
                    }else{
                        $body = $guzzleResponse->getBody();
                    }

                    $responses[$index] = new Response(
                        $guzzleResponse->getStatusCode(),
                        $guzzleResponse->getHeaders(),
                        $body,
                        $requests[$index]
                    );
            },
            'rejected' => function(RequestException $requestException, $index) use (&$responses, $requests){

                    $guzzleResponse = $requestException->getResponse();

                    $responses[$index] = new Response(
                        $guzzleResponse->getStatusCode(),
                        $guzzleResponse->getHeaders(),
                        $guzzleResponse->getBody(),
                        $requests[$index]
                    );
            }
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return $responses;
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