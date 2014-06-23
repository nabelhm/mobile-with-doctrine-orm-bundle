<?php

namespace Cubalider\Bundle\MobileBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class DoctrineMappingPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $definition = new Definition('Doctrine\ORM\Mapping\Driver\XmlDriver', array(array(
            sprintf("%s/../../../../../../mobile-with-doctrine-orm/src/Cubalider/Component/Mobile/Resources/config/doctrine", __DIR__)
        )));
        $definition->setPublic(false);
        $container->setDefinition('cubalider_mobile.xml_driver', $definition);

        $definition = $container->getDefinition('doctrine.orm.default_metadata_driver');
        $definition->addMethodCall('addDriver', array(new Reference('cubalider_mobile.xml_driver'), 'Cubalider\Component\Mobile\Model'));
    }
}
