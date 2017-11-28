<?php

namespace MediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use MediaBundle\Entity\SuperMedia;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('hollux_doctrine_prefix');

        /*$rootNode
            ->children()
                ->scalarNode('media_class_fqn')
                ->defaultValue(SuperMedia::class)
                ->end()
            ->end()
        ;*/

        $rootNode
            ->children()
                ->scalarNode('hollux_doctrine_prefix')
                    ->defaultValue('hollux_')
                ->end()
            ->end()
        ;

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
