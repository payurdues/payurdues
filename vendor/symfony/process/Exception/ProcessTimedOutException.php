<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Process\Exception;

use Symfony\Component\Process\Process;

/**
 * Exception that is thrown when a process times out.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class ProcessTimedOutException extends RuntimeException
{
    public const TYPE_GENERAL = 1;
    public const TYPE_IDLE = 2;

<<<<<<< HEAD
    private $process;
    private $timeoutType;
=======
    private Process $process;
    private int $timeoutType;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(Process $process, int $timeoutType)
    {
        $this->process = $process;
        $this->timeoutType = $timeoutType;

        parent::__construct(sprintf(
            'The process "%s" exceeded the timeout of %s seconds.',
            $process->getCommandLine(),
            $this->getExceededTimeout()
        ));
    }

<<<<<<< HEAD
=======
    /**
     * @return Process
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getProcess()
    {
        return $this->process;
    }

<<<<<<< HEAD
=======
    /**
     * @return bool
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isGeneralTimeout()
    {
        return self::TYPE_GENERAL === $this->timeoutType;
    }

<<<<<<< HEAD
=======
    /**
     * @return bool
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isIdleTimeout()
    {
        return self::TYPE_IDLE === $this->timeoutType;
    }

<<<<<<< HEAD
    public function getExceededTimeout()
    {
        switch ($this->timeoutType) {
            case self::TYPE_GENERAL:
                return $this->process->getTimeout();

            case self::TYPE_IDLE:
                return $this->process->getIdleTimeout();

            default:
                throw new \LogicException(sprintf('Unknown timeout type "%d".', $this->timeoutType));
        }
=======
    public function getExceededTimeout(): ?float
    {
        return match ($this->timeoutType) {
            self::TYPE_GENERAL => $this->process->getTimeout(),
            self::TYPE_IDLE => $this->process->getIdleTimeout(),
            default => throw new \LogicException(sprintf('Unknown timeout type "%d".', $this->timeoutType)),
        };
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
