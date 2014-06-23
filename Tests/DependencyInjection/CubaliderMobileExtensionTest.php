<?php

namespace Cubalider\MobileBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Cubalider\Bundle\MobileBundle\DependencyInjection\CubaliderMobileExtension;

/**
 * @author Nabel Hernandez <nabelhm@cubalider.com>
 */
class CubaliderMobileExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Cubalider\Bundle\MobileBundle\DependencyInjection\CubaliderMobileExtension::load
     */
    public function testLoad()
    {
        $configuration = new ContainerBuilder();
        $loader = new CubaliderMobileExtension();
        $loader->load(array(), $configuration);

        $this->assertTrue($configuration->hasDefinition('cubalider_mobile.mobile_manager'));
    }
}
