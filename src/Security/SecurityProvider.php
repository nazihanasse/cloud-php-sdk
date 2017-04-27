<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 27.04.2017
 * Time: 17:04
 */

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