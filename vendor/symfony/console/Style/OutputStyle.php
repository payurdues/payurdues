<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Style;

use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Decorates output to add console style guide helpers.
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class OutputStyle implements OutputInterface, StyleInterface
{
<<<<<<< HEAD
    private $output;
=======
    private OutputInterface $output;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function newLine(int $count = 1)
    {
        $this->output->write(str_repeat(\PHP_EOL, $count));
    }

    public function createProgressBar(int $max = 0): ProgressBar
    {
        return new ProgressBar($this->output, $max);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function write(string|iterable $messages, bool $newline = false, int $type = self::OUTPUT_NORMAL)
    {
        $this->output->write($messages, $newline, $type);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function writeln(string|iterable $messages, int $type = self::OUTPUT_NORMAL)
    {
        $this->output->writeln($messages, $type);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setVerbosity(int $level)
    {
        $this->output->setVerbosity($level);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getVerbosity(): int
    {
        return $this->output->getVerbosity();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setDecorated(bool $decorated)
    {
        $this->output->setDecorated($decorated);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isDecorated(): bool
    {
        return $this->output->isDecorated();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setFormatter(OutputFormatterInterface $formatter)
    {
        $this->output->setFormatter($formatter);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getFormatter(): OutputFormatterInterface
    {
        return $this->output->getFormatter();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isQuiet(): bool
    {
        return $this->output->isQuiet();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isVerbose(): bool
    {
        return $this->output->isVerbose();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isVeryVerbose(): bool
    {
        return $this->output->isVeryVerbose();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isDebug(): bool
    {
        return $this->output->isDebug();
    }

<<<<<<< HEAD
=======
    /**
     * @return OutputInterface
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected function getErrorOutput()
    {
        if (!$this->output instanceof ConsoleOutputInterface) {
            return $this->output;
        }

        return $this->output->getErrorOutput();
    }
}
