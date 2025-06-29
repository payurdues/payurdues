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
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

<<<<<<< HEAD
=======
trigger_deprecation('symfony/http-kernel', '6.1', 'The "%s" class is deprecated.', StreamedResponseListener::class);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
/**
 * StreamedResponseListener is responsible for sending the Response
 * to the client.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
<<<<<<< HEAD
=======
 *
 * @deprecated since Symfony 6.1
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class StreamedResponseListener implements EventSubscriberInterface
{
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

        $response = $event->getResponse();

        if ($response instanceof StreamedResponse) {
            $response->send();
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => ['onKernelResponse', -1024],
        ];
    }
}
