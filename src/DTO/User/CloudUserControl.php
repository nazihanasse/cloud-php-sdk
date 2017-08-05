<?php


namespace SkyCentrics\Cloud\DTO\User;


use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;

/**
 * Class CloudUserControl
 * @package SkyCentrics\Cloud\DTO\User
 */
class CloudUserControl implements CloudDTOInterface
{
    /**
     * @var int
     *
     * @Property(key="d", to_type="integer")
     */
    protected $control;

    /**
     * CloudUserControl constructor.
     * @param int $control
     */
    public function __construct(
        int $control = 0
    )
    {
        $this->control = $control;
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
}