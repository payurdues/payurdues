<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DependencyInjection;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
<<<<<<< HEAD
=======
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\RequestStack;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\HttpKernel\Log\Logger;

/**
 * Registers the default logger if necessary.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class LoggerPass implements CompilerPassInterface
{
    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $container->setAlias(LoggerInterface::class, 'logger')
            ->setPublic(false);
=======
     * @return void
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(LoggerInterface::class)) {
            $container->setAlias(LoggerInterface::class, 'logger');
        }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        if ($container->has('logger')) {
            return;
        }

<<<<<<< HEAD
        $container->register('logger', Logger::class)
            ->setPublic(false);
=======
        if ($debug = $container->getParameter('kernel.debug')) {
            $debug = $container->hasParameter('kernel.runtime_mode.web')
                ? $container->getParameter('kernel.runtime_mode.web')
                : !\in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true);
        }

        $container->register('logger', Logger::class)
            ->setArguments([null, null, null, new Reference(RequestStack::class), $debug]);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
