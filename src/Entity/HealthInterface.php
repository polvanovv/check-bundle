<?php


namespace polvanovv\HealthCheckBundle\Entity;


interface HealthInterface
{
    public const TAG = 'health.service';

    public function getName(): string;

    public function getHealthInfo(): HealthDataInterface;

}