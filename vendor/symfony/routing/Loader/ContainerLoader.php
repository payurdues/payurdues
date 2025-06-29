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

use Psr\Container\ContainerInterface;

/**
 * A route loader that executes a service from a PSR-11 container to load the routes.
 *
 * @author Ryan Weaver <ryan@knpuniversity.com>
 */
class ContainerLoader extends ObjectLoader
{
<<<<<<< HEAD
    private $container;

    public function __construct(ContainerInterface $container, string $env = null)
=======
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container, ?string $env = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->container = $container;
        parent::__construct($env);
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
        return 'service' === $type && \is_string($resource);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected function getObject(string $id): object
    {
        return $this->container->get($id);
    }
}
