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
use Symfony\Contracts\Service\ResetInterface;

/**
 * DataCollectorInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface DataCollectorInterface extends ResetInterface
{
    /**
     * Collects data for the given Request and Response.
<<<<<<< HEAD
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null);
=======
     *
     * @return void
     */
    public function collect(Request $request, Response $response, ?\Throwable $exception = null);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Returns the name of the collector.
     *
     * @return string
     */
    public function getName();
}
