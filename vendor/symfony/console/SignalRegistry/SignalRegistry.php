<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\SignalRegistry;

final class SignalRegistry
{
    private array $signalHandlers = [];

    public function __construct()
    {
        if (\function_exists('pcntl_async_signals')) {
            pcntl_async_signals(true);
        }
    }

    public function register(int $signal, callable $signalHandler): void
    {
        if (!isset($this->signalHandlers[$signal])) {
            $previousCallback = pcntl_signal_get_handler($signal);

            if (\is_callable($previousCallback)) {
                $this->signalHandlers[$signal][] = $previousCallback;
            }
        }

        $this->signalHandlers[$signal][] = $signalHandler;

<<<<<<< HEAD
        pcntl_signal($signal, [$this, 'handle']);
=======
        pcntl_signal($signal, $this->handle(...));
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    public static function isSupported(): bool
    {
<<<<<<< HEAD
        if (!\function_exists('pcntl_signal')) {
            return false;
        }

        if (\in_array('pcntl_signal', explode(',', \ini_get('disable_functions')))) {
            return false;
        }

        return true;
=======
        return \function_exists('pcntl_signal');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @internal
     */
    public function handle(int $signal): void
    {
        $count = \count($this->signalHandlers[$signal]);

        foreach ($this->signalHandlers[$signal] as $i => $signalHandler) {
            $hasNext = $i !== $count - 1;
            $signalHandler($signal, $hasNext);
        }
    }
}
