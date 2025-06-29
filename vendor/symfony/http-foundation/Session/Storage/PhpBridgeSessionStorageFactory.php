<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Storage\Proxy\AbstractProxy;

// Help opcache.preload discover always-needed symbols
class_exists(PhpBridgeSessionStorage::class);

/**
 * @author Jérémy Derussé <jeremy@derusse.com>
 */
class PhpBridgeSessionStorageFactory implements SessionStorageFactoryInterface
{
<<<<<<< HEAD
    private $handler;
    private $metaBag;
    private bool $secure;

    public function __construct(AbstractProxy|\SessionHandlerInterface $handler = null, MetadataBag $metaBag = null, bool $secure = false)
=======
    private AbstractProxy|\SessionHandlerInterface|null $handler;
    private ?MetadataBag $metaBag;
    private bool $secure;

    public function __construct(AbstractProxy|\SessionHandlerInterface|null $handler = null, ?MetadataBag $metaBag = null, bool $secure = false)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->handler = $handler;
        $this->metaBag = $metaBag;
        $this->secure = $secure;
    }

    public function createStorage(?Request $request): SessionStorageInterface
    {
        $storage = new PhpBridgeSessionStorage($this->handler, $this->metaBag);
<<<<<<< HEAD
        if ($this->secure && $request && $request->isSecure()) {
=======
        if ($this->secure && $request?->isSecure()) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $storage->setOptions(['cookie_secure' => true]);
        }

        return $storage;
    }
}
