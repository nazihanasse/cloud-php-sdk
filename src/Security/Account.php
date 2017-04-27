<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 27.04.2017
 * Time: 17:05
 */

namespace SkyCentrics\Cloud\Security;


class Account implements AccountInterface
{
    protected $email;

    protected $password;

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
}