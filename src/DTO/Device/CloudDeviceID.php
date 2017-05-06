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

    public function getId() : int
    {
        return $this->id;
    }

    public function getType() : int
    {
        return $this->type;
    }
}