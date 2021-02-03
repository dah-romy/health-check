<?php


namespace dahromy\HealthCheckBundle\Service;


use dahromy\HealthCheckBundle\Entity\HealthDataInterface;

interface HealthInterface
{
    public const TAG = 'health.service';
    public function getName(): string;
    public function getHealthInfo(): HealthDataInterface;
}