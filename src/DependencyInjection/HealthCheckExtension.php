<?php


namespace polvanovv\HealthCheckBundle\DependencyInjection;


use polvanovv\HealthCheckBundle\Command\SendDataCommand;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

class HealthCheckExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');

        $commandDefinition = new Definition(SendDataCommand::class);

        foreach ($config['sender'] as $senderId) {
            $commandDefinition->addArgument(new Reference($senderId));
        }

        $commandDefinition->addTag('console.command', ['command' => SendDataCommand::COMMAND_NAME]);

        $container->setDefinition(SendDataCommand::class, $commandDefinition);
    }
}