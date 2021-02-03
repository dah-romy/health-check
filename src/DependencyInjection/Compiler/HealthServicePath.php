<?php


namespace dahromy\HealthCheckBundle\DependencyInjection\Compiler;

use dahromy\HealthCheckBundle\Command\SendDataCommand;
use dahromy\HealthCheckBundle\Controller\HealthController;
use dahromy\HealthCheckBundle\Service\HealthInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class HealthServicesPath implements CompilerPassInterface{

    public function process(ContainerBuilder $container){

        if (!$container->has(HealthController::class)) {
            return;
        }

        $controller = $container->findDefinition(HealthController::class);
        $commandDefinition = $container->findDefinition(SendDataCommand::class);

        foreach (array_keys($container->findTaggedServiceIds(HealthInterface::TAG)) as $serviceId) {
            $controller->addMethodCall('addHealthService', [new Reference($serviceId)]);
            $commandDefinition->addMethodCall('addHealthService', [new Reference($serviceId)]);
        }
    }
}