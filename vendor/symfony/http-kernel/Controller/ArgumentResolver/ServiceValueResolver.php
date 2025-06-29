<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Controller\ArgumentResolver;

use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
<<<<<<< HEAD
=======
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

/**
 * Yields a service keyed by _controller and argument name.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
<<<<<<< HEAD
final class ServiceValueResolver implements ArgumentValueResolverInterface
{
    private $container;
=======
final class ServiceValueResolver implements ArgumentValueResolverInterface, ValueResolverInterface
{
    private ContainerInterface $container;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
=======
     * @deprecated since Symfony 6.2, use resolve() instead
     */
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        @trigger_deprecation('symfony/http-kernel', '6.2', 'The "%s()" method is deprecated, use "resolve()" instead.', __METHOD__);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        $controller = $request->attributes->get('_controller');

        if (\is_array($controller) && \is_callable($controller, true) && \is_string($controller[0])) {
            $controller = $controller[0].'::'.$controller[1];
        } elseif (!\is_string($controller) || '' === $controller) {
            return false;
        }

        if ('\\' === $controller[0]) {
            $controller = ltrim($controller, '\\');
        }

        if (!$this->container->has($controller) && false !== $i = strrpos($controller, ':')) {
            $controller = substr($controller, 0, $i).strtolower(substr($controller, $i));
        }

        return $this->container->has($controller) && $this->container->get($controller)->has($argument->getName());
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        if (\is_array($controller = $request->attributes->get('_controller'))) {
            $controller = $controller[0].'::'.$controller[1];
=======
    public function resolve(Request $request, ArgumentMetadata $argument): array
    {
        $controller = $request->attributes->get('_controller');

        if (\is_array($controller) && \is_callable($controller, true) && \is_string($controller[0])) {
            $controller = $controller[0].'::'.$controller[1];
        } elseif (!\is_string($controller) || '' === $controller) {
            return [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        if ('\\' === $controller[0]) {
            $controller = ltrim($controller, '\\');
        }

<<<<<<< HEAD
        if (!$this->container->has($controller)) {
            $i = strrpos($controller, ':');
            $controller = substr($controller, 0, $i).strtolower(substr($controller, $i));
        }

        try {
            yield $this->container->get($controller)->get($argument->getName());
=======
        if (!$this->container->has($controller) && false !== $i = strrpos($controller, ':')) {
            $controller = substr($controller, 0, $i).strtolower(substr($controller, $i));
        }

        if (!$this->container->has($controller) || !$this->container->get($controller)->has($argument->getName())) {
            return [];
        }

        try {
            return [$this->container->get($controller)->get($argument->getName())];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        } catch (RuntimeException $e) {
            $what = sprintf('argument $%s of "%s()"', $argument->getName(), $controller);
            $message = preg_replace('/service "\.service_locator\.[^"]++"/', $what, $e->getMessage());

            if ($e->getMessage() === $message) {
                $message = sprintf('Cannot resolve %s: %s', $what, $message);
            }

            $r = new \ReflectionProperty($e, 'message');
<<<<<<< HEAD
            $r->setAccessible(true);
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $r->setValue($e, $message);

            throw $e;
        }
    }
}
