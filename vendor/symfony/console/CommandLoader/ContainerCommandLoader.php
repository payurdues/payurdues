<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\CommandLoader;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\CommandNotFoundException;

/**
 * Loads commands from a PSR-11 container.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class ContainerCommandLoader implements CommandLoaderInterface
{
<<<<<<< HEAD
    private $container;
=======
    private ContainerInterface $container;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    private array $commandMap;

    /**
     * @param array $commandMap An array with command names as keys and service ids as values
     */
    public function __construct(ContainerInterface $container, array $commandMap)
    {
        $this->container = $container;
        $this->commandMap = $commandMap;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function get(string $name): Command
    {
        if (!$this->has($name)) {
            throw new CommandNotFoundException(sprintf('Command "%s" does not exist.', $name));
        }

        return $this->container->get($this->commandMap[$name]);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function has(string $name): bool
    {
        return isset($this->commandMap[$name]) && $this->container->has($this->commandMap[$name]);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getNames(): array
    {
        return array_keys($this->commandMap);
    }
}
