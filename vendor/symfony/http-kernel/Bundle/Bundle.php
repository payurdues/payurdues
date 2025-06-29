<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Bundle;

use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\Container;
<<<<<<< HEAD
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
=======
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * An implementation of BundleInterface that adds a few conventions for DependencyInjection extensions.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class Bundle implements BundleInterface
{
<<<<<<< HEAD
    use ContainerAwareTrait;

=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected $name;
    protected $extension;
    protected $path;
    private string $namespace;

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @var ContainerInterface|null
     */
    protected $container;

    /**
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function boot()
    {
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function shutdown()
    {
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     *
     * This method can be overridden to register compilation passes,
     * other extensions, ...
=======
     * This method can be overridden to register compilation passes,
     * other extensions, ...
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function build(ContainerBuilder $container)
    {
    }

    /**
     * Returns the bundle's container extension.
     *
     * @throws \LogicException
     */
    public function getContainerExtension(): ?ExtensionInterface
    {
<<<<<<< HEAD
        if (null === $this->extension) {
=======
        if (!isset($this->extension)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $extension = $this->createContainerExtension();

            if (null !== $extension) {
                if (!$extension instanceof ExtensionInterface) {
                    throw new \LogicException(sprintf('Extension "%s" must implement Symfony\Component\DependencyInjection\Extension\ExtensionInterface.', get_debug_type($extension)));
                }

                // check naming convention
                $basename = preg_replace('/Bundle$/', '', $this->getName());
                $expectedAlias = Container::underscore($basename);

                if ($expectedAlias != $extension->getAlias()) {
                    throw new \LogicException(sprintf('Users will expect the alias of the default extension of a bundle to be the underscored version of the bundle name ("%s"). You can override "Bundle::getContainerExtension()" if you want to use "%s" or another alias.', $expectedAlias, $extension->getAlias()));
                }

                $this->extension = $extension;
            } else {
                $this->extension = false;
            }
        }

        return $this->extension ?: null;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getNamespace(): string
    {
        if (!isset($this->namespace)) {
            $this->parseClassName();
        }

        return $this->namespace;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getPath(): string
    {
        if (null === $this->path) {
=======
    public function getPath(): string
    {
        if (!isset($this->path)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $reflected = new \ReflectionObject($this);
            $this->path = \dirname($reflected->getFileName());
        }

        return $this->path;
    }

    /**
     * Returns the bundle name (the class short name).
     */
    final public function getName(): string
    {
<<<<<<< HEAD
        if (null === $this->name) {
=======
        if (!isset($this->name)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $this->parseClassName();
        }

        return $this->name;
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function registerCommands(Application $application)
    {
    }

    /**
     * Returns the bundle's container extension class.
     */
    protected function getContainerExtensionClass(): string
    {
        $basename = preg_replace('/Bundle$/', '', $this->getName());

        return $this->getNamespace().'\\DependencyInjection\\'.$basename.'Extension';
    }

    /**
     * Creates the bundle's container extension.
     */
    protected function createContainerExtension(): ?ExtensionInterface
    {
        return class_exists($class = $this->getContainerExtensionClass()) ? new $class() : null;
    }

<<<<<<< HEAD
    private function parseClassName()
    {
        $pos = strrpos(static::class, '\\');
        $this->namespace = false === $pos ? '' : substr(static::class, 0, $pos);
        if (null === $this->name) {
            $this->name = false === $pos ? static::class : substr(static::class, $pos + 1);
        }
=======
    private function parseClassName(): void
    {
        $pos = strrpos(static::class, '\\');
        $this->namespace = false === $pos ? '' : substr(static::class, 0, $pos);
        $this->name ??= false === $pos ? static::class : substr(static::class, $pos + 1);
    }

    public function setContainer(?ContainerInterface $container): void
    {
        $this->container = $container;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
