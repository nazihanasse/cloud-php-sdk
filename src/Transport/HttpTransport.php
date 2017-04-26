<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 17.04.2017
 * Time: 16:18
 */

namespace SkyCentrics\Cloud\Transport;


use Guzzle\Common\Exception\GuzzleException;
use Guzzle\Http\Client;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response as GuzzleResponse;
use SkyCentrics\Cloud\Transport\Response\Response;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class HttpTransport
 * @package SkyCentrics\Cloud\Transport
 */
class HttpTransport implements TransportInterface
{
    /**
     * @param RequestInterface $request
     * @return Response
     */
    public function send(RequestInterface $request)
    {
        $client = new Client();

        /** @var Request $guzzleRequest */
        $guzzleRequest = $client->createRequest(
            $request->getMethod(),
            $request->getUri(),
            $request->getHeaders(),
            json_encode($request->getData())
        );

        /** @var GuzzleResponse $response */
        $response = $guzzleRequest->send();

        $body = $response->getBody(true);

        if(empty($body)){
            $data = [];
        }else{
            $data = json_decode($body, true);
        }

        if($response->getStatusCode() === 201){
            preg_match_all("/([\d]+)/", $response->getLocation(), $matches);

            if(!empty($matches[0][0])){
                $data['id'] = (int)$matches[0][0];
            }
        }



        return new Response(
            $response->getStatusCode(),
            $data
        );
    }
}