<?php
/**
 * Created by PhpStorm.
 * User: alexandr.mashukevich
 * Date: 17.5.18
 * Time: 16.02
 */

namespace SkyCentrics\Cloud\DTO\Device;


class CloudMeterInfo
{
    /**
     * @var string
     *
     * @Property(key="mdl")
     */
    protected $model;


    /**
     * @var string
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
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}