<?php


namespace SkyCentrics\Cloud\Security;

/**
 * Class SecurityProvider
 * @package SkyCentrics\Cloud\Security
 */
class SecurityProvider extends AbstractSecurityProvider
{
    /**
     * @return AccountInterface
     */
    public function getAccount(): AccountInterface
    {
        return new Account();
    }
}