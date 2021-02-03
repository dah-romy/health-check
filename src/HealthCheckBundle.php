<?php

namespace dahromy\Src;

use dahromy\HealthCheckBundle\DependencyInjection\Compiler\HealthServicesPath;
use dahromy\HealthCheckBundle\Service\HealthInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class HealthCheckBundle
 * @package dahromy\Src
 */
class HealthCheckBundle extends Bundle
{
    public function build(ContainerBuilder $container){
        parent::build($container);
        $container->addCompilerPass(new HealthServicesPath());
        $container->registerForAutoconfiguration(HealthInterface::class)->addTag(HealthInterface::TAG);
    }
}