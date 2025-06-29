<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher;

/**
 * A read-only proxy for an event dispatcher.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ImmutableEventDispatcher implements EventDispatcherInterface
{
<<<<<<< HEAD
    private $dispatcher;
=======
    private EventDispatcherInterface $dispatcher;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function dispatch(object $event, string $eventName = null): object
=======
    public function dispatch(object $event, ?string $eventName = null): object
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->dispatcher->dispatch($event, $eventName);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return never
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function addListener(string $eventName, callable|array $listener, int $priority = 0)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return never
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return never
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function removeListener(string $eventName, callable|array $listener)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return never
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function removeSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getListeners(string $eventName = null): array
=======
    public function getListeners(?string $eventName = null): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->dispatcher->getListeners($eventName);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getListenerPriority(string $eventName, callable|array $listener): ?int
    {
        return $this->dispatcher->getListenerPriority($eventName, $listener);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function hasListeners(string $eventName = null): bool
=======
    public function hasListeners(?string $eventName = null): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->dispatcher->hasListeners($eventName);
    }
}
