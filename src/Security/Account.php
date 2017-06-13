<?php


namespace SkyCentrics\Cloud\Security;

/**
 * Class Account
 * @package SkyCentrics\Cloud\Security
 */
class Account implements AccountInterface
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * Account constructor.
     * @param string $email
     * @param string $password Md5 hashed string !
     */
    public function __construct(
        string $email = '',
        string $password = ''
    )
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getAuth(): string
    {
        return base64_encode(sprintf("%s:%s", $this->getEmail(), $this->getPassword()));
    }
}