<?php
/**
 * Created by IntelliJ IDEA.
 * User: Admin
 * Date: 17.04.2017
 * Time: 17:15
 */

namespace SkyCentrics\Cloud\DTO;

/**
 * Class AbstractCloudDTO
 * @package SkyCentrics\Cloud\DTO
 */
abstract class AbstractCloudDTO
{
    /**
     * @param array $data
     * @return static
     */
    abstract public static function createFromCloud(array $data);

    /**
     * @param array $params
     * @return static
     */
    abstract public static function createFromParams(array $params);
}