<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

/**
 * Migrating session handler for migrating from one handler to another. It reads
 * from the current handler and writes both the current and new ones.
 *
 * It ignores errors from the new handler.
 *
 * @author Ross Motley <ross.motley@amara.com>
 * @author Oliver Radwell <oliver.radwell@amara.com>
 */
class MigratingSessionHandler implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface
{
<<<<<<< HEAD
    /**
     * @var \SessionHandlerInterface&\SessionUpdateTimestampHandlerInterface
     */
    private \SessionHandlerInterface $currentHandler;

    /**
     * @var \SessionHandlerInterface&\SessionUpdateTimestampHandlerInterface
     */
    private \SessionHandlerInterface $writeOnlyHandler;
=======
    private \SessionHandlerInterface&\SessionUpdateTimestampHandlerInterface $currentHandler;
    private \SessionHandlerInterface&\SessionUpdateTimestampHandlerInterface $writeOnlyHandler;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(\SessionHandlerInterface $currentHandler, \SessionHandlerInterface $writeOnlyHandler)
    {
        if (!$currentHandler instanceof \SessionUpdateTimestampHandlerInterface) {
            $currentHandler = new StrictSessionHandler($currentHandler);
        }
        if (!$writeOnlyHandler instanceof \SessionUpdateTimestampHandlerInterface) {
            $writeOnlyHandler = new StrictSessionHandler($writeOnlyHandler);
        }

        $this->currentHandler = $currentHandler;
        $this->writeOnlyHandler = $writeOnlyHandler;
    }

    public function close(): bool
    {
        $result = $this->currentHandler->close();
        $this->writeOnlyHandler->close();

        return $result;
    }

<<<<<<< HEAD
    public function destroy(string $sessionId): bool
=======
    public function destroy(#[\SensitiveParameter] string $sessionId): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $result = $this->currentHandler->destroy($sessionId);
        $this->writeOnlyHandler->destroy($sessionId);

        return $result;
    }

    public function gc(int $maxlifetime): int|false
    {
        $result = $this->currentHandler->gc($maxlifetime);
        $this->writeOnlyHandler->gc($maxlifetime);

        return $result;
    }

    public function open(string $savePath, string $sessionName): bool
    {
        $result = $this->currentHandler->open($savePath, $sessionName);
        $this->writeOnlyHandler->open($savePath, $sessionName);

        return $result;
    }

<<<<<<< HEAD
    public function read(string $sessionId): string
=======
    public function read(#[\SensitiveParameter] string $sessionId): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        // No reading from new handler until switch-over
        return $this->currentHandler->read($sessionId);
    }

<<<<<<< HEAD
    public function write(string $sessionId, string $sessionData): bool
=======
    public function write(#[\SensitiveParameter] string $sessionId, string $sessionData): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $result = $this->currentHandler->write($sessionId, $sessionData);
        $this->writeOnlyHandler->write($sessionId, $sessionData);

        return $result;
    }

<<<<<<< HEAD
    public function validateId(string $sessionId): bool
=======
    public function validateId(#[\SensitiveParameter] string $sessionId): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        // No reading from new handler until switch-over
        return $this->currentHandler->validateId($sessionId);
    }

<<<<<<< HEAD
    public function updateTimestamp(string $sessionId, string $sessionData): bool
=======
    public function updateTimestamp(#[\SensitiveParameter] string $sessionId, string $sessionData): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $result = $this->currentHandler->updateTimestamp($sessionId, $sessionData);
        $this->writeOnlyHandler->updateTimestamp($sessionId, $sessionData);

        return $result;
    }
}
