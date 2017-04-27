<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 26.04.2017
 * Time: 12:42
 */

namespace SkyCentrics\Cloud\Security;


use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class AbstractSecurityProvider
 * @package SkyCentrics\Cloud\Security
 */
abstract class AbstractSecurityProvider
{
    /**
     * @param RequestInterface $request
     * @param AccountInterface|null $account
     */
    public function provide(RequestInterface $request, AccountInterface $account = null)
    {
        $headers = $request->getHeaders();

        if(!$account){
            $account = $this->getAccount();
        }

        $date = str_replace('+0000', 'GMT', gmdate('r'));
        $ohscSig = $account->getPassword()
            . $request->getMethod() . ' /'
            . $request->getUri() . ' '
            . 'HTTP/1.1Date: ' . $date
            . json_encode($request->getData());
        $ohscSig = base64_encode($account->getEmail() . ':' . md5($ohscSig));

        $headers = array_merge($headers, [
            'Date' => $date,
            'Authorization' => 'OHSC ' . $ohscSig,
        ]);

        $request->setHeaders($headers);

        return $request;
    }

    abstract public function getAccount() : AccountInterface;
}