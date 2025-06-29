<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\ErrorHandler\Error;

class ClassNotFoundError extends \Error
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function __construct(string $message, \Throwable $previous)
    {
        parent::__construct($message, $previous->getCode(), $previous->getPrevious());

        foreach ([
            'file' => $previous->getFile(),
            'line' => $previous->getLine(),
            'trace' => $previous->getTrace(),
        ] as $property => $value) {
            $refl = new \ReflectionProperty(\Error::class, $property);
<<<<<<< HEAD
            $refl->setAccessible(true);
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $refl->setValue($this, $value);
        }
    }
}
