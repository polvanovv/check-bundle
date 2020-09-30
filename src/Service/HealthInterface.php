<?php


namespace polvanovv\HealthCheckBundle\Service;


use polvanovv\HealthCheckBundle\Entity\HealthDataInterface;

interface HealthInterface
{
    public const TAG = 'health.service';

    public function getName(): string;

    public function getHealthInfo(): HealthDataInterface;

}