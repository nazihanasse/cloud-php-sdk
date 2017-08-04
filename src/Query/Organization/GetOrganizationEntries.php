<?php


namespace SkyCentrics\Cloud\Query\Organization;


use SkyCentrics\Cloud\DTO\CloudGroup;
use SkyCentrics\Cloud\DTO\CloudUser;
use SkyCentrics\Cloud\DTO\Device\CloudCamera;
use SkyCentrics\Cloud\DTO\Device\CloudDevice;
use SkyCentrics\Cloud\DTO\Device\CloudSmartplug;
use SkyCentrics\Cloud\DTO\Device\CloudThermostat;
use SkyCentrics\Cloud\Mapper\DeviceMapper;
use SkyCentrics\Cloud\Mapper\GroupMapper;
use SkyCentrics\Cloud\Mapper\UserMapper;
use SkyCentrics\Cloud\Query\AbstractQuery;
use SkyCentrics\Cloud\Query\Device\DeviceResponseSanitizer;
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
            $cloudUser = $this->map(CloudUser::class, $userData);
            $result['users'][] = $cloudUser;

            foreach ($userData['groups'] as $group){
                $group = $this->map(CloudGroup::class, $group);

                $result['groups'][] = $group;
            }

            foreach ($userData['devices'] as $typeChar => $devices){
                foreach ($devices as $deviceData){

                    $mapClass = [
                        'd' => CloudDevice::class,
                        's' => CloudSmartplug::class,
                        't' => CloudThermostat::class,
                        'c' => CloudCamera::class
                    ][$typeChar];

                    $device = $this->map($mapClass, $deviceData);

                    $result['devices'][] = $device;
                }
            }
        }

        return $result;
    }
}