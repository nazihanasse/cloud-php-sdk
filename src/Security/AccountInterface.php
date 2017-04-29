<?php


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