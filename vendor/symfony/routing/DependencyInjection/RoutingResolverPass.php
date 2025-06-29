<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\PriorityTaggedServiceTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Adds tagged routing.loader services to routing.resolver service.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class RoutingResolverPass implements CompilerPassInterface
{
    use PriorityTaggedServiceTrait;

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('routing.resolver')) {
            return;
        }

        $definition = $container->getDefinition('routing.resolver');

        foreach ($this->findAndSortTaggedServices('routing.loader', $container) as $id) {
            $definition->addMethodCall('addLoader', [new Reference($id)]);
        }
    }
}
