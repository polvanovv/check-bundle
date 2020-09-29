<?php


namespace polvanovv\HealthCheckBundle\Service;


use polvanovv\HealthCheckBundle\Entity\HealthDataInterface;

interface HealthSenderInterface
{
    /**
     * @param HealthDataInterface $data
     */
    public function send(array $data): void;

    public function getDescription(): string;

    public function getName(): string;
}