<?php
/**
 * Skycentrics.
 * Cloud project
 * User: Alexander Bondars <alexander.bondars@cactussoft.biz>
 */

namespace SkyCentrics\Cloud;

use SkyCentrics\Cloud\Annotation\AnnotationMapperInterface;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\TransportInterface;

/**
 * Interface CloudInterface
 * @package SkyCentrics\Cloud
 */
interface CloudInterface
{
    const SKYCENTRICS_API_URI = 'http://api.skycentrics.com/api/';
    const SKYCENTRICS_IOT_URI = 'https://iot.skycentrics.com/';

    /**
     * @param QueryInterface|array $query
     * @param AccountInterface|null $account
     * @return mixed
     */
    public function apply($query, AccountInterface $account = null);

    /**
     * @return AnnotationMapperInterface
     */
    public function getAnnotationMapper() : AnnotationMapperInterface;
}