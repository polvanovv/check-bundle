<?php


namespace polvanovv\HealthCheckBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('health_check');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
            ->arrayNode('senders')
            ->scalarPrototype()
            ->end()
            ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}