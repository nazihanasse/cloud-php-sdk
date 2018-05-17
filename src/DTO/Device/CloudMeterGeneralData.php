<?php
/**
 * Created by PhpStorm.
 * User: alexandr.mashukevich
 * Date: 17.5.18
 * Time: 15.58
 */

namespace SkyCentrics\Cloud\DTO\Device;


class CloudMeterGeneralData
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
     * @var string
     *
     * @Property(key="n", to_type="string")
     */
    protected $name;

    /**
     * @var int
     *
     * @Property(key="m", to_type="string")
     */
    protected $mac = 0;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getMac(): int
    {
        return $this->mac;
    }

    /**
     * @param int $mac
     */
    public function setMac(int $mac): void
    {
        $this->mac = $mac;
    }
}