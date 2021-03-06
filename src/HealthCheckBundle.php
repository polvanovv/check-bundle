<?php


namespace polvanovv\HealthCheckBundle;


use polvanovv\HealthCheckBundle\DependencyInjection\Compiler\HealthServicePath;
use polvanovv\HealthCheckBundle\Service\HealthInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HealthCheckBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new HealthServicePath());
        $container->registerForAutoconfiguration(HealthInterface::class)->addTag
        (HealthInterface::TAG);
    }
}