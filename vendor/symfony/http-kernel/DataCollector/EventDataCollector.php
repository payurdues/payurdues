<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\Service\ResetInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @see TraceableEventDispatcher
 *
 * @final
 */
class EventDataCollector extends DataCollector implements LateDataCollectorInterface
{
<<<<<<< HEAD
    private $dispatcher;
    private $requestStack;
    private $currentRequest = null;

    public function __construct(EventDispatcherInterface $dispatcher = null, RequestStack $requestStack = null)
    {
        $this->dispatcher = $dispatcher;
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null)
    {
        $this->currentRequest = $this->requestStack && $this->requestStack->getMainRequest() !== $request ? $request : null;
        $this->data = [
            'called_listeners' => [],
            'not_called_listeners' => [],
            'orphaned_events' => [],
        ];
    }

    public function reset()
    {
        $this->data = [];

        if ($this->dispatcher instanceof ResetInterface) {
            $this->dispatcher->reset();
        }
    }

    public function lateCollect()
    {
        if ($this->dispatcher instanceof TraceableEventDispatcher) {
            $this->setCalledListeners($this->dispatcher->getCalledListeners($this->currentRequest));
            $this->setNotCalledListeners($this->dispatcher->getNotCalledListeners($this->currentRequest));
            $this->setOrphanedEvents($this->dispatcher->getOrphanedEvents($this->currentRequest));
=======
    /** @var iterable<EventDispatcherInterface> */
    private iterable $dispatchers;
    private ?Request $currentRequest = null;

    /**
     * @param iterable<EventDispatcherInterface>|EventDispatcherInterface|null $dispatchers
     */
    public function __construct(
        iterable|EventDispatcherInterface|null $dispatchers = null,
        private ?RequestStack $requestStack = null,
        private string $defaultDispatcher = 'event_dispatcher',
    ) {
        if ($dispatchers instanceof EventDispatcherInterface) {
            $dispatchers = [$this->defaultDispatcher => $dispatchers];
        }
        $this->dispatchers = $dispatchers ?? [];
    }

    public function collect(Request $request, Response $response, ?\Throwable $exception = null): void
    {
        $this->currentRequest = $this->requestStack && $this->requestStack->getMainRequest() !== $request ? $request : null;
        $this->data = [];
    }

    public function reset(): void
    {
        parent::reset();

        foreach ($this->dispatchers as $dispatcher) {
            if ($dispatcher instanceof ResetInterface) {
                $dispatcher->reset();
            }
        }
    }

    public function lateCollect(): void
    {
        foreach ($this->dispatchers as $name => $dispatcher) {
            if (!$dispatcher instanceof TraceableEventDispatcher) {
                continue;
            }

            $this->setCalledListeners($dispatcher->getCalledListeners($this->currentRequest), $name);
            $this->setNotCalledListeners($dispatcher->getNotCalledListeners($this->currentRequest), $name);
            $this->setOrphanedEvents($dispatcher->getOrphanedEvents($this->currentRequest), $name);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $this->data = $this->cloneVar($this->data);
    }

<<<<<<< HEAD
    /**
     * @see TraceableEventDispatcher
     */
    public function setCalledListeners(array $listeners)
    {
        $this->data['called_listeners'] = $listeners;
=======
    public function getData(): array|Data
    {
        return $this->data;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function getCalledListeners(): array|Data
    {
        return $this->data['called_listeners'];
=======
    public function setCalledListeners(array $listeners, ?string $dispatcher = null): void
    {
        $this->data[$dispatcher ?? $this->defaultDispatcher]['called_listeners'] = $listeners;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function setNotCalledListeners(array $listeners)
    {
        $this->data['not_called_listeners'] = $listeners;
=======
    public function getCalledListeners(?string $dispatcher = null): array|Data
    {
        return $this->data[$dispatcher ?? $this->defaultDispatcher]['called_listeners'] ?? [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function getNotCalledListeners(): array|Data
    {
        return $this->data['not_called_listeners'];
=======
    public function setNotCalledListeners(array $listeners, ?string $dispatcher = null): void
    {
        $this->data[$dispatcher ?? $this->defaultDispatcher]['not_called_listeners'] = $listeners;
    }

    /**
     * @see TraceableEventDispatcher
     */
    public function getNotCalledListeners(?string $dispatcher = null): array|Data
    {
        return $this->data[$dispatcher ?? $this->defaultDispatcher]['not_called_listeners'] ?? [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @param array $events An array of orphaned events
     *
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function setOrphanedEvents(array $events)
    {
        $this->data['orphaned_events'] = $events;
=======
    public function setOrphanedEvents(array $events, ?string $dispatcher = null): void
    {
        $this->data[$dispatcher ?? $this->defaultDispatcher]['orphaned_events'] = $events;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function getOrphanedEvents(): array|Data
    {
        return $this->data['orphaned_events'];
    }

    /**
     * {@inheritdoc}
     */
=======
    public function getOrphanedEvents(?string $dispatcher = null): array|Data
    {
        return $this->data[$dispatcher ?? $this->defaultDispatcher]['orphaned_events'] ?? [];
    }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getName(): string
    {
        return 'events';
    }
}
