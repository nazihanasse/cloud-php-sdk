<?php
/**
 * Skycentrics.
 * Cloud project
 * User: Alexander Bondars <alexander.bondars@cactussoft.biz>
 */

namespace SkyCentrics\Cloud;

use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Security\AccountInterface;
use SkyCentrics\Cloud\Transport\TransportInterface;

/**
 * Interface CloudInterface
 * @package SkyCentrics\Cloud
 */
interface CloudInterface
{
    /**
     * @param QueryInterface|array $query
     * @param AccountInterface|null $account
     * @return mixed
     */
    public function apply($query, AccountInterface $account = null);
}