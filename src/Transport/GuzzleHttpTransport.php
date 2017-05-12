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

class GuzzleHttpTransport implements TransportInterface
{
    protected $client;

    public function __construct(

    )
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
                (array)json_decode($guzzleResponse->getBody(), true),
                $request
            );

            throw new CloudResponseException(
                $response
            );
        }

        return new Response(
            $response->getStatusCode(),
            json_decode($response->getBody(), true),
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
        $response = new MultiResponse([]);

        foreach ($multiRequest as $request){
            $guzzleRequests[] = $this->createRequest($request);
        }

        $pool = new Pool($this->client, $guzzleRequests, [
            'concurrency' => 10,
            'fulfilled' =>
                function($guzzleResponse, $index) use ($response, $multiRequest){

                $response->addResponse(new Response(
                    $guzzleResponse->getStatusCode(),
                    json_decode($guzzleResponse->getBody(), true),
                    $multiRequest
                    ));
            }
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return $response;
    }

    protected function createRequest(RequestInterface $request)
    {
        $uri = new Uri($request->getUri() . ltrim($request->getPath(), '/'));
        $uri->withQuery(http_build_query($request->getQuery()));
        $guzzleRequest = new Request(
            $request->getMethod(),
            $uri,
            $request->getHeaders(),
            json_encode($request->getData())
            );

        return $guzzleRequest;
    }
}