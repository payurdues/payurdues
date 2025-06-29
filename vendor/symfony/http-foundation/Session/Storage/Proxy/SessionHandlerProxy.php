<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Proxy;

use Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler;

/**
 * @author Drak <drak@zikula.org>
 */
class SessionHandlerProxy extends AbstractProxy implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface
{
    protected $handler;

    public function __construct(\SessionHandlerInterface $handler)
    {
        $this->handler = $handler;
        $this->wrapper = $handler instanceof \SessionHandler;
        $this->saveHandlerName = $this->wrapper || ($handler instanceof StrictSessionHandler && $handler->isWrapper()) ? \ini_get('session.save_handler') : 'user';
    }

    public function getHandler(): \SessionHandlerInterface
    {
        return $this->handler;
    }

    // \SessionHandlerInterface

    public function open(string $savePath, string $sessionName): bool
    {
        return $this->handler->open($savePath, $sessionName);
    }

    public function close(): bool
    {
        return $this->handler->close();
    }

<<<<<<< HEAD
    public function read(string $sessionId): string|false
=======
    public function read(#[\SensitiveParameter] string $sessionId): string|false
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->handler->read($sessionId);
    }

<<<<<<< HEAD
    public function write(string $sessionId, string $data): bool
=======
    public function write(#[\SensitiveParameter] string $sessionId, string $data): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->handler->write($sessionId, $data);
    }

<<<<<<< HEAD
    public function destroy(string $sessionId): bool
=======
    public function destroy(#[\SensitiveParameter] string $sessionId): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->handler->destroy($sessionId);
    }

    public function gc(int $maxlifetime): int|false
    {
        return $this->handler->gc($maxlifetime);
    }

<<<<<<< HEAD
    public function validateId(string $sessionId): bool
=======
    public function validateId(#[\SensitiveParameter] string $sessionId): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return !$this->handler instanceof \SessionUpdateTimestampHandlerInterface || $this->handler->validateId($sessionId);
    }

<<<<<<< HEAD
    public function updateTimestamp(string $sessionId, string $data): bool
=======
    public function updateTimestamp(#[\SensitiveParameter] string $sessionId, string $data): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->handler instanceof \SessionUpdateTimestampHandlerInterface ? $this->handler->updateTimestamp($sessionId, $data) : $this->write($sessionId, $data);
    }
}
