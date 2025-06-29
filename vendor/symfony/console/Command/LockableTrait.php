<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Command;

use Symfony\Component\Console\Exception\LogicException;
use Symfony\Component\Lock\LockFactory;
<<<<<<< HEAD
=======
use Symfony\Component\Lock\LockInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\Lock\Store\FlockStore;
use Symfony\Component\Lock\Store\SemaphoreStore;

/**
 * Basic lock feature for commands.
 *
 * @author Geoffrey Brier <geoffrey.brier@gmail.com>
 */
trait LockableTrait
{
<<<<<<< HEAD
    private $lock = null;
=======
    private ?LockInterface $lock = null;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Locks a command.
     */
<<<<<<< HEAD
    private function lock(string $name = null, bool $blocking = false): bool
    {
        if (!class_exists(SemaphoreStore::class)) {
            throw new LogicException('To enable the locking feature you must install the symfony/lock component.');
=======
    private function lock(?string $name = null, bool $blocking = false): bool
    {
        if (!class_exists(SemaphoreStore::class)) {
            throw new LogicException('To enable the locking feature you must install the symfony/lock component. Try running "composer require symfony/lock".');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        if (null !== $this->lock) {
            throw new LogicException('A lock is already in place.');
        }

        if (SemaphoreStore::isSupported()) {
            $store = new SemaphoreStore();
        } else {
            $store = new FlockStore();
        }

        $this->lock = (new LockFactory($store))->createLock($name ?: $this->getName());
        if (!$this->lock->acquire($blocking)) {
            $this->lock = null;

            return false;
        }

        return true;
    }

    /**
     * Releases the command lock if there is one.
     */
<<<<<<< HEAD
    private function release()
=======
    private function release(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($this->lock) {
            $this->lock->release();
            $this->lock = null;
        }
    }
}
