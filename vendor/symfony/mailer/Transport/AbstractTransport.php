<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Transport;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
<<<<<<< HEAD
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\Event\MessageEvent;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mime\Address;
=======
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\Event\FailedMessageEvent;
use Symfony\Component\Mailer\Event\MessageEvent;
use Symfony\Component\Mailer\Event\SentMessageEvent;
use Symfony\Component\Mailer\Exception\LogicException;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\BodyRendererInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\Mime\RawMessage;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class AbstractTransport implements TransportInterface
{
<<<<<<< HEAD
    private $dispatcher;
    private $logger;
    private float $rate = 0;
    private float $lastSent = 0;

    public function __construct(EventDispatcherInterface $dispatcher = null, LoggerInterface $logger = null)
=======
    private ?EventDispatcherInterface $dispatcher;
    private LoggerInterface $logger;
    private float $rate = 0;
    private float $lastSent = 0;

    public function __construct(?EventDispatcherInterface $dispatcher = null, ?LoggerInterface $logger = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->dispatcher = $dispatcher;
        $this->logger = $logger ?? new NullLogger();
    }

    /**
     * Sets the maximum number of messages to send per second (0 to disable).
     *
     * @return $this
     */
    public function setMaxPerSecond(float $rate): static
    {
        if (0 >= $rate) {
            $rate = 0;
        }

        $this->rate = $rate;
        $this->lastSent = 0;

        return $this;
    }

<<<<<<< HEAD
    public function send(RawMessage $message, Envelope $envelope = null): ?SentMessage
=======
    public function send(RawMessage $message, ?Envelope $envelope = null): ?SentMessage
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $message = clone $message;
        $envelope = null !== $envelope ? clone $envelope : Envelope::create($message);

<<<<<<< HEAD
        if (null !== $this->dispatcher) {
            $event = new MessageEvent($message, $envelope, (string) $this);
            $this->dispatcher->dispatch($event);
            $envelope = $event->getEnvelope();
            $message = $event->getMessage();
        }

        $message = new SentMessage($message, $envelope);
        $this->doSend($message);

        $this->checkThrottling();

        return $message;
=======
        try {
            if (!$this->dispatcher) {
                $sentMessage = new SentMessage($message, $envelope);
                $this->doSend($sentMessage);

                return $sentMessage;
            }

            $event = new MessageEvent($message, $envelope, (string) $this);
            $this->dispatcher->dispatch($event);
            if ($event->isRejected()) {
                return null;
            }

            $envelope = $event->getEnvelope();
            $message = $event->getMessage();

            if ($message instanceof TemplatedEmail && !$message->isRendered()) {
                throw new LogicException(sprintf('You must configure a "%s" when a "%s" instance has a text or HTML template set.', BodyRendererInterface::class, get_debug_type($message)));
            }

            $sentMessage = new SentMessage($message, $envelope);

            try {
                $this->doSend($sentMessage);
            } catch (\Throwable $error) {
                $this->dispatcher->dispatch(new FailedMessageEvent($message, $error));
                $this->checkThrottling();

                throw $error;
            }

            $this->dispatcher->dispatch(new SentMessageEvent($sentMessage));

            return $sentMessage;
        } finally {
            $this->checkThrottling();
        }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    abstract protected function doSend(SentMessage $message): void;

    /**
     * @param Address[] $addresses
     *
     * @return string[]
     */
    protected function stringifyAddresses(array $addresses): array
    {
<<<<<<< HEAD
        return array_map(function (Address $a) {
            return $a->toString();
        }, $addresses);
=======
        return array_map(fn (Address $a) => $a->toString(), $addresses);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

<<<<<<< HEAD
    private function checkThrottling()
=======
    private function checkThrottling(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (0 == $this->rate) {
            return;
        }

        $sleep = (1 / $this->rate) - (microtime(true) - $this->lastSent);
        if (0 < $sleep) {
            $this->logger->debug(sprintf('Email transport "%s" sleeps for %.2f seconds', __CLASS__, $sleep));
<<<<<<< HEAD
            usleep($sleep * 1000000);
=======
            usleep((int) ($sleep * 1000000));
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }
        $this->lastSent = microtime(true);
    }
}
