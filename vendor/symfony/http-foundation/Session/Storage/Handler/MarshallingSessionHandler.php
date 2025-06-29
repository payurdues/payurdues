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

use Symfony\Component\Cache\Marshaller\MarshallerInterface;

/**
 * @author Ahmed TAILOULOUTE <ahmed.tailouloute@gmail.com>
 */
class MarshallingSessionHandler implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface
{
<<<<<<< HEAD
    private $handler;
    private $marshaller;
=======
    private AbstractSessionHandler $handler;
    private MarshallerInterface $marshaller;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(AbstractSessionHandler $handler, MarshallerInterface $marshaller)
    {
        $this->handler = $handler;
        $this->marshaller = $marshaller;
    }

    public function open(string $savePath, string $name): bool
    {
        return $this->handler->open($savePath, $name);
    }

    public function close(): bool
    {
        return $this->handler->close();
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
    public function read(string $sessionId): string
=======
    public function read(#[\SensitiveParameter] string $sessionId): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->marshaller->unmarshall($this->handler->read($sessionId));
    }

<<<<<<< HEAD
    public function write(string $sessionId, string $data): bool
=======
    public function write(#[\SensitiveParameter] string $sessionId, string $data): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $failed = [];
        $marshalledData = $this->marshaller->marshall(['data' => $data], $failed);

        if (isset($failed['data'])) {
            return false;
        }

        return $this->handler->write($sessionId, $marshalledData['data']);
    }

<<<<<<< HEAD
    public function validateId(string $sessionId): bool
=======
    public function validateId(#[\SensitiveParameter] string $sessionId): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->handler->validateId($sessionId);
    }

<<<<<<< HEAD
    public function updateTimestamp(string $sessionId, string $data): bool
=======
    public function updateTimestamp(#[\SensitiveParameter] string $sessionId, string $data): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->handler->updateTimestamp($sessionId, $data);
    }
}
