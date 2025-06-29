<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Exception;

/**
 * @author Ben Ramsey <ben@benramsey.com>
 *
 * @see http://tools.ietf.org/html/rfc6585
 */
class TooManyRequestsHttpException extends HttpException
{
    /**
     * @param int|string|null $retryAfter The number of seconds or HTTP-date after which the request may be retried
     */
<<<<<<< HEAD
    public function __construct(int|string $retryAfter = null, string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
=======
    public function __construct(int|string|null $retryAfter = null, string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = [])
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($retryAfter) {
            $headers['Retry-After'] = $retryAfter;
        }

        parent::__construct(429, $message, $previous, $headers, $code);
    }
}
