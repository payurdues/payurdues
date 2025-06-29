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
 * Can be used in unit testing or in a situations where persisted sessions are not desired.
 *
 * @author Drak <drak@zikula.org>
 */
class NullSessionHandler extends AbstractSessionHandler
{
    public function close(): bool
    {
        return true;
    }

<<<<<<< HEAD
    public function validateId(string $sessionId): bool
=======
    public function validateId(#[\SensitiveParameter] string $sessionId): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return true;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    protected function doRead(string $sessionId): string
=======
    protected function doRead(#[\SensitiveParameter] string $sessionId): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return '';
    }

<<<<<<< HEAD
    public function updateTimestamp(string $sessionId, string $data): bool
=======
    public function updateTimestamp(#[\SensitiveParameter] string $sessionId, string $data): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return true;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    protected function doWrite(string $sessionId, string $data): bool
=======
    protected function doWrite(#[\SensitiveParameter] string $sessionId, string $data): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return true;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    protected function doDestroy(string $sessionId): bool
=======
    protected function doDestroy(#[\SensitiveParameter] string $sessionId): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return true;
    }

    public function gc(int $maxlifetime): int|false
    {
        return 0;
    }
}
