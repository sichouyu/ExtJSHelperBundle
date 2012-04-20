<?php

namespace QArea\ExtJSHelperBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author Bogdan Tkachenko <bogus.weber@gmail.com>
 */
class QAreaExtJSHelperExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter(
            'qarea.extjshelper.twig.extension.extjs_root',
            $config['extjs_root']
        );

        $container->setParameter(
            'qarea.extjshelper.twig.extension.type',
            $config['type']
        );

        $container->setParameter(
            'qarea.extjshelper.twig.extension.theme',
            $config['theme']
        );

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
