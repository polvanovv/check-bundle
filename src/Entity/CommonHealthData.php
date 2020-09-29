<?php


namespace polvanovv\HealthCheckBundle\Entity;


class CommonHealthData implements HealthDataInterface
{

    private $status;

    private $additionalInfo = [];

    public function __construct(int $status)
    {
        $this->status = $status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @param array $additionalInfo
     */
    public function setAdditionalInfo(array $additionalInfo): void
    {
        $this->additionalInfo = $additionalInfo;
    }



    public function getStatus(): int
    {
        return $this->status;
    }

    public function getAdditionalInfo(): array
    {
        return $this->additionalInfo;
    }
}