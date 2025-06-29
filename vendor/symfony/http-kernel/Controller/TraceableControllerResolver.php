<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class TraceableControllerResolver implements ControllerResolverInterface
{
<<<<<<< HEAD
    private $resolver;
    private $stopwatch;
=======
    private ControllerResolverInterface $resolver;
    private Stopwatch $stopwatch;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(ControllerResolverInterface $resolver, Stopwatch $stopwatch)
    {
        $this->resolver = $resolver;
        $this->stopwatch = $stopwatch;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getController(Request $request): callable|false
    {
        $e = $this->stopwatch->start('controller.get_callable');

<<<<<<< HEAD
        $ret = $this->resolver->getController($request);

        $e->stop();

        return $ret;
=======
        try {
            return $this->resolver->getController($request);
        } finally {
            $e->stop();
        }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
