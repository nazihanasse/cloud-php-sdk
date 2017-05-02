<?php


namespace SkyCentrics\Cloud\Transport;


use Guzzle\Common\Exception\GuzzleException;
use Guzzle\Http\Client;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response as GuzzleResponse;
use SkyCentrics\Cloud\Exception\CloudResponseException;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Response\MultiResponse;
use SkyCentrics\Cloud\Transport\Response\MultiResponseInterface;
use SkyCentrics\Cloud\Transport\Response\Response;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
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

        $client = new \Zend\Http\Client();

        $transportResponse = $client->send($transportRequest);

        if(!$transportResponse->isSuccess()){
            $response = new Response($transportResponse->getStatusCode(), []);
            throw new CloudResponseException($response);
        }

        $data = $transportResponse->getContent() ?? [];

        if($transportResponse->getStatusCode() === 201){
            preg_match_all("/([\d]+)/", $transportResponse->getHeaders()->get('Location'), $matches);

            if(!empty($matches[0][0])){
                $data['id'] = (int)$matches[0][0];
            }
        }

        return new Response(
            $transportResponse->getStatusCode(),
            json_decode($data, true)
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