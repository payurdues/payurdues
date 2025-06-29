<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Symfony\Component\HttpKernel\Profiler\Profiler;

/**
 * ProfilerListener collects data for the current request by listening to the kernel events.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class ProfilerListener implements EventSubscriberInterface
{
<<<<<<< HEAD
    private $profiler;
    private $matcher;
=======
    private Profiler $profiler;
    private ?RequestMatcherInterface $matcher;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    private bool $onlyException;
    private bool $onlyMainRequests;
    private ?\Throwable $exception = null;
    /** @var \SplObjectStorage<Request, Profile> */
    private \SplObjectStorage $profiles;
<<<<<<< HEAD
    private $requestStack;
=======
    private RequestStack $requestStack;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    private ?string $collectParameter;
    /** @var \SplObjectStorage<Request, Request|null> */
    private \SplObjectStorage $parents;

    /**
     * @param bool $onlyException    True if the profiler only collects data when an exception occurs, false otherwise
     * @param bool $onlyMainRequests True if the profiler only collects data when the request is the main request, false otherwise
     */
<<<<<<< HEAD
    public function __construct(Profiler $profiler, RequestStack $requestStack, RequestMatcherInterface $matcher = null, bool $onlyException = false, bool $onlyMainRequests = false, string $collectParameter = null)
=======
    public function __construct(Profiler $profiler, RequestStack $requestStack, ?RequestMatcherInterface $matcher = null, bool $onlyException = false, bool $onlyMainRequests = false, ?string $collectParameter = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->profiler = $profiler;
        $this->matcher = $matcher;
        $this->onlyException = $onlyException;
        $this->onlyMainRequests = $onlyMainRequests;
        $this->profiles = new \SplObjectStorage();
        $this->parents = new \SplObjectStorage();
        $this->requestStack = $requestStack;
        $this->collectParameter = $collectParameter;
    }

    /**
     * Handles the onKernelException event.
     */
<<<<<<< HEAD
    public function onKernelException(ExceptionEvent $event)
=======
    public function onKernelException(ExceptionEvent $event): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($this->onlyMainRequests && !$event->isMainRequest()) {
            return;
        }

        $this->exception = $event->getThrowable();
    }

    /**
     * Handles the onKernelResponse event.
     */
<<<<<<< HEAD
    public function onKernelResponse(ResponseEvent $event)
=======
    public function onKernelResponse(ResponseEvent $event): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($this->onlyMainRequests && !$event->isMainRequest()) {
            return;
        }

        if ($this->onlyException && null === $this->exception) {
            return;
        }

        $request = $event->getRequest();
        if (null !== $this->collectParameter && null !== $collectParameterValue = $request->get($this->collectParameter)) {
<<<<<<< HEAD
            true === $collectParameterValue || filter_var($collectParameterValue, \FILTER_VALIDATE_BOOLEAN) ? $this->profiler->enable() : $this->profiler->disable();
=======
            true === $collectParameterValue || filter_var($collectParameterValue, \FILTER_VALIDATE_BOOL) ? $this->profiler->enable() : $this->profiler->disable();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $exception = $this->exception;
        $this->exception = null;

        if (null !== $this->matcher && !$this->matcher->matches($request)) {
            return;
        }

<<<<<<< HEAD
        $session = $request->hasPreviousSession() && $request->hasSession() ? $request->getSession() : null;
=======
        $session = !$request->attributes->getBoolean('_stateless') && $request->hasPreviousSession() ? $request->getSession() : null;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        if ($session instanceof Session) {
            $usageIndexValue = $usageIndexReference = &$session->getUsageIndex();
            $usageIndexReference = \PHP_INT_MIN;
        }

        try {
            if (!$profile = $this->profiler->collect($request, $event->getResponse(), $exception)) {
                return;
            }
        } finally {
            if ($session instanceof Session) {
                $usageIndexReference = $usageIndexValue;
            }
        }

        $this->profiles[$request] = $profile;

        $this->parents[$request] = $this->requestStack->getParentRequest();
    }

<<<<<<< HEAD
    public function onKernelTerminate(TerminateEvent $event)
=======
    public function onKernelTerminate(TerminateEvent $event): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        // attach children to parents
        foreach ($this->profiles as $request) {
            if (null !== $parentRequest = $this->parents[$request]) {
                if (isset($this->profiles[$parentRequest])) {
                    $this->profiles[$parentRequest]->addChild($this->profiles[$request]);
                }
            }
        }

        // save profiles
        foreach ($this->profiles as $request) {
            $this->profiler->saveProfile($this->profiles[$request]);
        }

        $this->profiles = new \SplObjectStorage();
        $this->parents = new \SplObjectStorage();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => ['onKernelResponse', -100],
            KernelEvents::EXCEPTION => ['onKernelException', 0],
            KernelEvents::TERMINATE => ['onKernelTerminate', -1024],
        ];
    }
}
