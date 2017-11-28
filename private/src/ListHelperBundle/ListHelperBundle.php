<?php

namespace ListHelperBundle;

use ListHelperBundle\DependencyInjection\Compiler\ListHelperRegistryExtensionPass;
use ListHelperBundle\DependencyInjection\Compiler\ListHelperRegistryPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ListHelperBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ListHelperRegistryPass());
        $container->addCompilerPass(new ListHelperRegistryExtensionPass());
    }
}
