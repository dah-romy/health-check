<?php


namespace dahromy\HealthCheckBundle\Service;


use dahromy\HealthCheckBundle\Entity\HealthDataInterface;

interface HealthSenderInterface
{
    /**
     * @param HealthDataInterface[] $data
     */
    public function send(array $data): void;
    public function getDescription(): string;
    public function getName(): string;
}