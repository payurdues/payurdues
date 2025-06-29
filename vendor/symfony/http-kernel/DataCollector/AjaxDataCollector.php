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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Bart van den Burg <bart@burgov.nl>
 *
 * @final
 */
class AjaxDataCollector extends DataCollector
{
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
    public function collect(Request $request, Response $response, ?\Throwable $exception = null): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        // all collecting is done client side
    }

<<<<<<< HEAD
    public function reset()
=======
    public function reset(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        // all collecting is done client side
    }

    public function getName(): string
    {
        return 'ajax';
    }
}
