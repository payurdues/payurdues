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
class_exists(NativeSessionStorage::class);

/**
 * @author Jérémy Derussé <jeremy@derusse.com>
 */
class NativeSessionStorageFactory implements SessionStorageFactoryInterface
{
    private array $options;
<<<<<<< HEAD
    private $handler;
    private $metaBag;
=======
    private AbstractProxy|\SessionHandlerInterface|null $handler;
    private ?MetadataBag $metaBag;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    private bool $secure;

    /**
     * @see NativeSessionStorage constructor.
     */
<<<<<<< HEAD
    public function __construct(array $options = [], AbstractProxy|\SessionHandlerInterface $handler = null, MetadataBag $metaBag = null, bool $secure = false)
=======
    public function __construct(array $options = [], AbstractProxy|\SessionHandlerInterface|null $handler = null, ?MetadataBag $metaBag = null, bool $secure = false)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->options = $options;
        $this->handler = $handler;
        $this->metaBag = $metaBag;
        $this->secure = $secure;
    }

    public function createStorage(?Request $request): SessionStorageInterface
    {
        $storage = new NativeSessionStorage($this->options, $this->handler, $this->metaBag);
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
