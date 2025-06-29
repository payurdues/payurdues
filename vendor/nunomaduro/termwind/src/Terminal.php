<?php

declare(strict_types=1);

namespace Termwind;

use Symfony\Component\Console\Terminal as ConsoleTerminal;

/**
 * @internal
 */
final class Terminal
{
    /**
     * An instance of Symfony's console terminal.
     */
    private ConsoleTerminal $terminal;

    /**
     * Creates a new terminal instance.
     */
<<<<<<< HEAD
    public function __construct(ConsoleTerminal $terminal = null)
    {
        $this->terminal = $terminal ?? new ConsoleTerminal();
=======
    public function __construct(?ConsoleTerminal $terminal = null)
    {
        $this->terminal = $terminal ?? new ConsoleTerminal;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Gets the terminal width.
     */
    public function width(): int
    {
        return $this->terminal->getWidth();
    }

    /**
     * Gets the terminal height.
     */
    public function height(): int
    {
        return $this->terminal->getHeight();
    }

    /**
     * Clears the terminal screen.
     */
    public function clear(): void
    {
        Termwind::getRenderer()->write("\ec");
    }
}
