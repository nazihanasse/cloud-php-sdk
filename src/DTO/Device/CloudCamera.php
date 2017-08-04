<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;
use SkyCentrics\Cloud\Security\Account;
use SkyCentrics\Cloud\Security\AccountInterface;

/**
 * Class CloudCamera
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudCamera extends AbstractCloudDevice
{
        /**
     * @var int
     *
     * @Property(key="i", to_type="int")
     */
    protected $id = 0;

    /**
     * @var int
     *
     * @Property(key="u", to_type="int")
     */
    protected $userId;

    /**
     * @var int
     *
     * @Property(key="g", to_type="int")
     */
    protected $groupId;

    /**
     * @var string
     *
     * @Property(key="n", to_type="string")
     */
    protected $name;

    /**
     * @var int
     */
    protected $mac = 0;

    /**
     * @var int
     */
    protected $type = 0;

    /**
     * @var int
     *
     * @Property(key="h")
     */
    protected $location;

    /**
     * @var int
     *
     * @Property(key="mdl")
     */
    protected $model;

    /**
     * @var string
     *
     * @Property(key="a")
     */
    protected $auth;

    /**
     * @var int
     *
     * @Property(key="mfg")
     */
    protected $manufacturer;

    /**
     * @var string
     *
     * @Property(key="url")
     */
    protected $url;

    /**
     * @return int
     */
    public function getLocation(): int
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getAuth(): string
    {
        return $this->auth;
    }

    /**
     * @return int
     */
    public function getManufacturer(): int
    {
        return $this->manufacturer;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return AccountInterface
     */
    public function getAccount() : AccountInterface
    {
        $credentials = explode(':', base64_decode($this->auth));

        return new Account($credentials[0] ?? '', $credentials[1] ?? '');
    }
}