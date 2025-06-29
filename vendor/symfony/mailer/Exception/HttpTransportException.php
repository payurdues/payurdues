<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Exception;

use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class HttpTransportException extends TransportException
{
<<<<<<< HEAD
    private $response;

    public function __construct(string $message, ResponseInterface $response, int $code = 0, \Throwable $previous = null)
=======
    private ResponseInterface $response;

    public function __construct(string $message, ResponseInterface $response, int $code = 0, ?\Throwable $previous = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        parent::__construct($message, $code, $previous);

        $this->response = $response;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
