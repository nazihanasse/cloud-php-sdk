<?php


namespace SkyCentrics\Cloud\DTO\Device;


use SkyCentrics\Cloud\Annotation\Property;
use SkyCentrics\Cloud\DTO\CloudDTOInterface;

/**
 * Class CloudUserContacts
 * @package SkyCentrics\Cloud\DTO\Device
 */
class CloudUserContacts implements CloudDTOInterface
{
    /**
     * @var array
     *
     * @Property(key="u.e")
     */
    protected $personalEmails = [];

    /**
     * @var array
     *
     * @Property(key="t.e")
     */
    protected $technicalEmails = [];

    /**
     * @var array
     *
     * @Property(key="u.t")
     */
    protected $personalTwitters = [];

    /**
     * @var array
     *
     * @Property(key="t.t")
     */
    protected $technicalTwitters = [];

    /**
     * @var int
     *
     * @Property(key="u.i")
     */
    protected $personalPushStatus = [];

    /**
     * @var int
     *
     * @Property(key="t.i")
     */
    protected $technicalPushStatus = 0;

    /**
     * CloudUserContacts constructor.
     * @param array $personalEmails
     * @param array $technicalEmails
     * @param array $personalTwitters
     * @param array $technicalTwitters
     * @param int $personalPushStatus
     * @param int $technicalPushStatus
     */
    public function __construct(
        array $personalEmails = [],
        array $technicalEmails = [],
        array $personalTwitters =[],
        array $technicalTwitters =[],
        int $personalPushStatus = 0,
        int  $technicalPushStatus = 0
    )
    {
        foreach ($personalEmails as $personalEmail){
            $this->addPersonalEmail($personalEmail);
        }

        foreach ($technicalEmails as $technicalEmail){
            $this->addTechnicalEmail($technicalEmail);
        }

        foreach ($personalTwitters as $personalTwitter){
            $this->addPersonalTwitter($personalTwitter);
        }

        foreach ($technicalTwitters as $technicalTwitter){
            $this->addTechnicalTwitter($technicalTwitter);
        }

        $this->personalPushStatus = $personalPushStatus;
        $this->technicalPushStatus = $technicalPushStatus;
    }

    /**
     * @return array
     */
    public function getPersonalEmails(): array
    {
        return $this->personalEmails;
    }

    /**
     * @param string $email
     */
    public function addPersonalEmail(string $email)
    {
        $this->personalEmails[] = $email;
    }

    /**
     * @return array
     */
    public function getTechnicalEmails(): array
    {
        return $this->technicalEmails;
    }

    /**
     * @param string $email
     */
    public function addTechnicalEmail(string $email)
    {
        $this->technicalEmails[] = $email;
    }

    /**
     * @return array
     */
    public function getPersonalTwitters(): array
    {
        return $this->personalTwitters;
    }

    /**
     * @param string $personalTwitter
     */
    public function addPersonalTwitter(string $personalTwitter)
    {
        $this->personalTwitters[] = $personalTwitter;
    }

    /**
     * @return array
     */
    public function getTechnicalTwitters(): array
    {
        return $this->technicalTwitters;
    }

    /**
     * @param string $technicalTwitter
     */
    public function addTechnicalTwitter(string $technicalTwitter)
    {
        $this->technicalTwitters[] = $technicalTwitter;
    }

    /**
     * @return int
     */
    public function getPersonalPushStatus()
    {
        return $this->personalPushStatus;
    }

    /**
     * @param int $personalPushStatus
     */
    public function setPersonalPushStatus(int $personalPushStatus)
    {
        $this->personalPushStatus = $personalPushStatus;
    }

    /**
     * @return int
     */
    public function getTechnicalPushStatus()
    {
        return $this->technicalPushStatus;
    }

    /**
     * @param int $technicalPushStatus
     */
    public function setTechnicalPushStatus(int $technicalPushStatus)
    {
        $this->technicalPushStatus = $technicalPushStatus;
    }
}