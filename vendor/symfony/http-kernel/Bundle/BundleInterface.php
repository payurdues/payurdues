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

<<<<<<< HEAD
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
=======
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * BundleInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
<<<<<<< HEAD
interface BundleInterface extends ContainerAwareInterface
{
    /**
     * Boots the Bundle.
=======
interface BundleInterface
{
    /**
     * Boots the Bundle.
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function boot();

    /**
     * Shutdowns the Bundle.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function shutdown();

    /**
     * Builds the bundle.
     *
     * It is only ever called once when the cache is empty.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function build(ContainerBuilder $container);

    /**
     * Returns the container extension that should be implicitly loaded.
     */
    public function getContainerExtension(): ?ExtensionInterface;

    /**
     * Returns the bundle name (the class short name).
     */
    public function getName(): string;

    /**
     * Gets the Bundle namespace.
     */
    public function getNamespace(): string;

    /**
     * Gets the Bundle directory path.
     *
     * The path should always be returned as a Unix path (with /).
     */
    public function getPath(): string;
<<<<<<< HEAD
=======

    /**
     * @return void
     */
    public function setContainer(?ContainerInterface $container);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
