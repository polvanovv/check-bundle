<?php


namespace polvanovv\HealthCheckBundle\Entity;


/**
 * Interface HealthDataInterface
 *
 * @package polvanovv\HealthCheckBundle\Entity
 */
interface HealthDataInterface
{
    public const STATUS_OK = 1;
    public const STATUS_WARNING = 2;
    public const STATUS_DANGER = 3;
    public const STATUS_CRITICAL = 4;

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @return array
     */
    public function getAdditionalInfo(): array;

}