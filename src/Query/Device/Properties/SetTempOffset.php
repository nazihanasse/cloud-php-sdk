<?php


namespace SkyCentrics\Cloud\Query\Device\Properties;


use SkyCentrics\Cloud\DTO\Device\CloudDeviceID;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;

/**
 * Class SetTempOffset
 * @package SkyCentrics\Cloud\Query\Device\Properties
 */
class SetTempOffset extends AbstractPropertyQuery
{
    const UNITS_F = 0;
    const UNITS_C = 1;

    /**
     * @var int
     */
    protected $offset;

    /**
     * @var int
     */
    protected $units;

    /**
     * SetTempOffset constructor.
     * @param CloudDeviceID $deviceId
     * @param int $offset
     * @param int $units
     */
    public function __construct(CloudDeviceID $deviceId, int $offset = 0, int $units = self::UNITS_F)
    {
        parent::__construct($deviceId);

        $this->offset = $offset;
        $this->units = $units;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return $this->createPropertyRequest('temp_offset', [
            'offset' => $this->offset,
            'units' => ['F', 'C'][$this->units]
        ]);
    }

}