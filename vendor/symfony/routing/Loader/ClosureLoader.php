<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

/**
 * ClosureLoader loads routes from a PHP closure.
 *
 * The Closure must return a RouteCollection instance.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ClosureLoader extends Loader
{
    /**
     * Loads a Closure.
     */
<<<<<<< HEAD
    public function load(mixed $closure, string $type = null): RouteCollection
=======
    public function load(mixed $closure, ?string $type = null): RouteCollection
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $closure($this->env);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function supports(mixed $resource, string $type = null): bool
=======
    public function supports(mixed $resource, ?string $type = null): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $resource instanceof \Closure && (!$type || 'closure' === $type);
    }
}
