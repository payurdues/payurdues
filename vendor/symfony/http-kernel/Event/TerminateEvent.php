<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * Allows to execute logic after a response was sent.
 *
 * Since it's only triggered on main requests, the `getRequestType()` method
 * will always return the value of `HttpKernelInterface::MAIN_REQUEST`.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
final class TerminateEvent extends KernelEvent
{
<<<<<<< HEAD
    private $response;
=======
    private Response $response;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(HttpKernelInterface $kernel, Request $request, Response $response)
    {
        parent::__construct($kernel, $request, HttpKernelInterface::MAIN_REQUEST);

        $this->response = $response;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
}
