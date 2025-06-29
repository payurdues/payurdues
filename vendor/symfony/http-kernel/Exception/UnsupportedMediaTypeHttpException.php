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
 */
class UnsupportedMediaTypeHttpException extends HttpException
{
<<<<<<< HEAD
    public function __construct(string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
=======
    public function __construct(string $message = '', ?\Throwable $previous = null, int $code = 0, array $headers = [])
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        parent::__construct(415, $message, $previous, $headers, $code);
    }
}
