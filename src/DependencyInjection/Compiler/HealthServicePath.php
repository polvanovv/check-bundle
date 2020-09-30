<?php


namespace polvanov\HealthCheckBundle\DependencyInjection\Compiler;


use polvanovv\HealthCheckBundle\Command\SendDataCommand;
use polvanovv\HealthCheckBundle\Controller\HealthController;
use polvanovv\HealthCheckBundle\Entity\HealthInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class HealthServicePath implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        if (!$container->has(HealthController::class)) {
            return;
        }

        $controller        = $container->findDefinition(HealthController::class);
        $commandDefinition = $container->findDefinition(SendDataCommand::class);
        foreach (array_keys(
                     $container->findTaggedServiceIds(HealthInterface::TAG)
                 ) as $servicesId) {
            $controller->addMethodCall(
                'addHealthService',
                [
                    new Reference($servicesId),
                ]
            );
            $commandDefinition->addMethodCall(
                'addHealthService',
                [
                    new Reference($servicesId),
                ]
            );
        }
    }
}