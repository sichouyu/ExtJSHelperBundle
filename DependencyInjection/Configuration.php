<?php

namespace QArea\ExtJSHelperBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * ExtJS Helper bundle configuration builder.
 *
 * @author Bogdan Tkachenko <bogus.weber@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('qarea_extjs_helper');

        $rootNode
            ->children()
                ->scalarNode('extjs_root')->defaultValue('http://cdn.sencha.io/ext-4.0.7-gpl/')->end()
                ->scalarNode('type')->defaultValue('ext-all')->end()
                ->scalarNode('theme')->defaultValue('')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
