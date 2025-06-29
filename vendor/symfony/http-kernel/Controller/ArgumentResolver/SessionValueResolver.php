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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
<<<<<<< HEAD
=======
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

/**
 * Yields the Session.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
<<<<<<< HEAD
final class SessionValueResolver implements ArgumentValueResolverInterface
{
    /**
     * {@inheritdoc}
     */
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
=======
final class SessionValueResolver implements ArgumentValueResolverInterface, ValueResolverInterface
{
    /**
     * @deprecated since Symfony 6.2, use resolve() instead
     */
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        @trigger_deprecation('symfony/http-kernel', '6.2', 'The "%s()" method is deprecated, use "resolve()" instead.', __METHOD__);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if (!$request->hasSession()) {
            return false;
        }

        $type = $argument->getType();
        if (SessionInterface::class !== $type && !is_subclass_of($type, SessionInterface::class)) {
            return false;
        }

        return $request->getSession() instanceof $type;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        yield $request->getSession();
=======
    public function resolve(Request $request, ArgumentMetadata $argument): array
    {
        if (!$request->hasSession()) {
            return [];
        }

        $type = $argument->getType();
        if (SessionInterface::class !== $type && !is_subclass_of($type, SessionInterface::class)) {
            return [];
        }

        return $request->getSession() instanceof $type ? [$request->getSession()] : [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
