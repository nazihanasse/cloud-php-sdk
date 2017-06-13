<?php


namespace SkyCentrics\Cloud\Query\Organization;


use SkyCentrics\Cloud\Mapper\DeviceMapper;
use SkyCentrics\Cloud\Mapper\GroupMapper;
use SkyCentrics\Cloud\Mapper\UserMapper;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\QueryInterface;
use SkyCentrics\Cloud\Transport\Request\MultiRequestInterface;
use SkyCentrics\Cloud\Transport\Request\Request;
use SkyCentrics\Cloud\Transport\Request\RequestInterface;
use SkyCentrics\Cloud\Transport\Response\ResponseInterface;

/**
 * Class GetOrganizationEntriesQuery
 * @package SkyCentrics\Cloud\Query\Organization
 */
class GetOrganizationEntries extends AbstractQuery
{
    /**
     * @var int
     */
    protected $organizationId;

    /**
     * GetOrganizationEntriesQuery constructor.
     * @param int $organizationId
     */
    public function __construct(
        int $organizationId
    )
    {
        $this->organizationId = $organizationId;
    }

    /**
     * @return RequestInterface|MultiRequestInterface
     */
    public function createRequest(): RequestInterface
    {
        return Request::createFromParams([
            'path' => '/users/',
            'query' => [
                'org' => $this->organizationId
            ]
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    public function mapResponse(ResponseInterface $response)
    {
        $requestData = $response->getData();

        $result = [
            'users' => [],
            'groups' => [],
            'devices' => []
        ];

        foreach ($requestData as $userData) {
            $cloudUser = UserMapper::fromResponse($userData);
            $result['users'][] = $cloudUser;

            foreach ($userData['groups'] as $group){
                $group = GroupMapper::fromResponse($group);

                $result['groups'][] = $group;
            }

            foreach ($userData['devices'] as $typeChar => $devices){
                foreach ($devices as $deviceData){
                    // @TODO: neede cameras support
                    if(!isset($deviceData['t']) && !isset($deviceData['type'])){
                        continue;
                    }

                    $device = DeviceMapper::fromResponse($deviceData);

                    $result['devices'][] = $device;
                }
            }
        }

        return $result;
    }
}