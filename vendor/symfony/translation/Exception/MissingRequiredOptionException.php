<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Exception;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
class MissingRequiredOptionException extends IncompleteDsnException
{
<<<<<<< HEAD
    public function __construct(string $option, string $dsn = null, \Throwable $previous = null)
=======
    public function __construct(string $option, ?string $dsn = null, ?\Throwable $previous = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $message = sprintf('The option "%s" is required but missing.', $option);

        parent::__construct($message, $dsn, $previous);
    }
}
