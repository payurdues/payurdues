<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageFactoryInterface;

// Help opcache.preload discover always-needed symbols
class_exists(Session::class);

/**
 * @author Jérémy Derussé <jeremy@derusse.com>
 */
class SessionFactory implements SessionFactoryInterface
{
<<<<<<< HEAD
    private $requestStack;
    private $storageFactory;
    private ?\Closure $usageReporter;

    public function __construct(RequestStack $requestStack, SessionStorageFactoryInterface $storageFactory, callable $usageReporter = null)
    {
        $this->requestStack = $requestStack;
        $this->storageFactory = $storageFactory;
        $this->usageReporter = $usageReporter instanceof \Closure || !\is_callable($usageReporter) ? $usageReporter : \Closure::fromCallable($usageReporter);
=======
    private RequestStack $requestStack;
    private SessionStorageFactoryInterface $storageFactory;
    private ?\Closure $usageReporter;

    public function __construct(RequestStack $requestStack, SessionStorageFactoryInterface $storageFactory, ?callable $usageReporter = null)
    {
        $this->requestStack = $requestStack;
        $this->storageFactory = $storageFactory;
        $this->usageReporter = null === $usageReporter ? null : $usageReporter(...);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    public function createSession(): SessionInterface
    {
        return new Session($this->storageFactory->createStorage($this->requestStack->getMainRequest()), null, null, $this->usageReporter);
    }
}
