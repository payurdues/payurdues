<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime;

use Symfony\Component\Mime\Exception\LogicException;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class RawMessage
{
<<<<<<< HEAD
    private $message;

    public function __construct(iterable|string $message)
=======
    /** @var iterable<string>|string|resource */
    private $message;
    private bool $isGeneratorClosed;

    /**
     * @param iterable<string>|string|resource $message
     */
    public function __construct(mixed $message)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->message = $message;
    }

<<<<<<< HEAD
=======
    public function __destruct()
    {
        if (\is_resource($this->message)) {
            fclose($this->message);
        }
    }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function toString(): string
    {
        if (\is_string($this->message)) {
            return $this->message;
        }
<<<<<<< HEAD
        if ($this->message instanceof \Traversable) {
            $this->message = iterator_to_array($this->message, false);
        }

        return $this->message = implode('', $this->message);
=======

        if (\is_resource($this->message)) {
            return stream_get_contents($this->message, -1, 0);
        }

        $message = '';
        foreach ($this->message as $chunk) {
            $message .= $chunk;
        }

        return $this->message = $message;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    public function toIterable(): iterable
    {
<<<<<<< HEAD
=======
        if ($this->isGeneratorClosed ?? false) {
            trigger_deprecation('symfony/mime', '6.4', 'Sending an email with a closed generator is deprecated and will throw in 7.0.');
            // throw new LogicException('Unable to send the email as its generator is already closed.');
        }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if (\is_string($this->message)) {
            yield $this->message;

            return;
        }

<<<<<<< HEAD
        $message = '';
        foreach ($this->message as $chunk) {
            $message .= $chunk;
            yield $chunk;
        }
        $this->message = $message;
    }

    /**
=======
        if (\is_resource($this->message)) {
            rewind($this->message);
            while ($line = fgets($this->message)) {
                yield $line;
            }

            return;
        }

        if ($this->message instanceof \Generator) {
            $message = fopen('php://temp', 'w+');
            foreach ($this->message as $chunk) {
                fwrite($message, $chunk);
                yield $chunk;
            }
            $this->isGeneratorClosed = !$this->message->valid();
            $this->message = $message;

            return;
        }

        foreach ($this->message as $chunk) {
            yield $chunk;
        }
    }

    /**
     * @return void
     *
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * @throws LogicException if the message is not valid
     */
    public function ensureValidity()
    {
    }

    public function __serialize(): array
    {
        return [$this->toString()];
    }

    public function __unserialize(array $data): void
    {
        [$this->message] = $data;
    }
}
