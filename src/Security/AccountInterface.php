<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 17.04.2017
 * Time: 13:23
 */

namespace SkyCentrics\Cloud\Security;

/**
 * Interface AccountInterface
 * @package SkyCentrics\Cloud\Security
 */
interface AccountInterface
{
    /**
     * @return string
     */
    public function getEmail() : string;

    /**
     * @return string
     */
    public function getPassword() : string;
}