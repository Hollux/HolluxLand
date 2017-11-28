<?php
namespace MediaBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MediaBundleExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container)
    {

    }

}