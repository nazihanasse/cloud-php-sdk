<?php


namespace SkyCentrics\Cloud\DTO\Device;


class CloudDeviceID
{
    protected $id;

    protected $type;

    public function __construct(
        int $id,
        int $type
    )
    {
        $this->id = $id;
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }
}