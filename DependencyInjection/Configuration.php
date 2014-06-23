<?php

namespace Cubalider\Bundle\MobileBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Nabel Hernandez <nabelhm@cubalider.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @inheritdoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('cubalider_mobile');

        $rootNode
            ->children()
                ->scalarNode('mobile_class')->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}
