<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Command;

/**
 * Interface for command reacting to signal.
 *
 * @author Grégoire Pineau <lyrixx@lyrix.info>
 */
interface SignalableCommandInterface
{
    /**
     * Returns the list of signals to subscribe.
     */
    public function getSubscribedSignals(): array;

    /**
     * The method will be called when the application is signaled.
<<<<<<< HEAD
     */
    public function handleSignal(int $signal): void;
=======
     *
     * @param int|false $previousExitCode
     *
     * @return int|false The exit code to return or false to continue the normal execution
     */
    public function handleSignal(int $signal, /* int|false $previousExitCode = 0 */);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
