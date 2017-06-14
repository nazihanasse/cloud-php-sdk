<?php


namespace SkyCentrics\Cloud\DTO;

use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\Security\Account;
use SkyCentrics\Cloud\Security\AccountInterface;

/**
 * Class CloudUser
 * @package SkyCentrics\Cloud\DTO
 */
class CloudUser implements CloudDTOInterface
{
    /**
     * @var int
     * @Property(key="id")
     */
    protected $id;

    /**
     * @var string
     * @Property(key="email")
     */
    protected $email;

    /**
     * @var string
     * @Property(key="auth")
     */
    protected $password;

    /**
     * @var string
     * @Property(key="name.first")
     */
    protected $firstName;

    /**
     * @var string
     * @Property(key="name.last")
     */
    protected $lastName;

    /**
     * @var string
     * @Property(key="address.street")
     */
    protected $street;

    /**
     * @var string
     * @Property(key="address.city")
     */
    protected $city;

    /**
     * @var string
     * @Property(key="address.state")
     */
    protected $state;

    /**
     * @var int
     * @Property(key="address.zip")
     */
    protected $zip;

    /**
     * @var string
     * @Property(key="address.country")
     */
    protected $country;

    /**
     * @var \DateTimeZone
     * @Property(key="timezone")
     */
    protected $timeZone;

    /**
     * @var int
     * @Property(key="sync")
     */
    protected $sync;

    /**
     * @var int
     * @Property(key="organization")
     */
    protected $organization;

    /**
     * @var int
     * @Property(key="control")
     */
    protected $control;

    /**
     * CloudUser constructor.
     * @param string $email
     * @param string $password
     * @param bool $isHashed
     */
    public function __construct(
        string $email,
        string $password,
        bool $isHashed = false
    )
    {
        $this->email = $email;
        $this->setPassword($password, $isHashed);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @param bool $isHashed
     */
    public function setPassword(string $password, bool $isHashed = false)
    {
        $this->password = $isHashed ? $password : md5($password);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state)
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getZip(): int
    {
        return $this->zip;
    }

    /**
     * @param int $zip
     */
    public function setZip(int $zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return \DateTimeZone
     */
    public function getTimeZone(): \DateTimeZone
    {
        return $this->timeZone;
    }

    /**
     * @param \DateTimeZone $timeZone
     */
    public function setTimeZone(\DateTimeZone $timeZone)
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @return int
     */
    public function getSync(): int
    {
        return $this->sync;
    }

    /**
     * @param int $sync
     */
    public function setSync(int $sync)
    {
        $this->sync = $sync;
    }

    /**
     * @return int
     */
    public function getOrganization(): int
    {
        return $this->organization;
    }

    /**
     * @param int $organization
     */
    public function setOrganization(int $organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return int
     */
    public function getControl(): int
    {
        return $this->control;
    }

    /**
     * @param int $control
     */
    public function setControl(int $control)
    {
        $this->control = $control;
    }

    /**
     * @return AccountInterface
     */
    public function getAccount() : AccountInterface
    {
        return new Account($this->getEmail(), $this->getPassword());
    }

}