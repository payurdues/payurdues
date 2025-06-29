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
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\HttpCache\HttpCache;
use Symfony\Component\HttpKernel\HttpCache\SurrogateInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * SurrogateListener adds a Surrogate-Control HTTP header when the Response needs to be parsed for Surrogates.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class SurrogateListener implements EventSubscriberInterface
{
<<<<<<< HEAD
    private $surrogate;

    public function __construct(SurrogateInterface $surrogate = null)
=======
    private ?SurrogateInterface $surrogate;

    public function __construct(?SurrogateInterface $surrogate = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->surrogate = $surrogate;
    }

    /**
     * Filters the Response.
     */
<<<<<<< HEAD
    public function onKernelResponse(ResponseEvent $event)
=======
    public function onKernelResponse(ResponseEvent $event): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $kernel = $event->getKernel();
        $surrogate = $this->surrogate;
        if ($kernel instanceof HttpCache) {
            $surrogate = $kernel->getSurrogate();
            if (null !== $this->surrogate && $this->surrogate->getName() !== $surrogate->getName()) {
                $surrogate = $this->surrogate;
            }
        }

        if (null === $surrogate) {
            return;
        }

        $surrogate->addSurrogateControl($event->getResponse());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }
}
