<?php

namespace CRTX\CountryISOBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\Yaml\Parser;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class CRTXCountryISOExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('CountryISO', $config['CountryISO']);
    }

    public function getAlias()
    {
        return 'crtx_country_iso';
    }

    public function prepend(ContainerBuilder $container)
    {
        $yaml = new Parser();
        $approot = $container->getParameter('kernel.root_dir');
        $file = $approot . '/../vendor/CRTX/PHPCountryISO/countries.yml';
        $CountryArray = $yaml->parse(file_get_contents($file));
        $container->prependExtensionConfig(
            'crtx_country_iso', array(
                'CountryISO' => $CountryArray
            )
        );
    }
}
