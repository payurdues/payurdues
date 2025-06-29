<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Transport\Smtp\Stream;

use Symfony\Component\Mailer\Exception\TransportException;

/**
 * A stream supporting local processes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Chris Corbyn
 *
 * @internal
 */
final class ProcessStream extends AbstractStream
{
    private string $command;
<<<<<<< HEAD

    public function setCommand(string $command)
=======
    private bool $interactive = false;

    public function setCommand(string $command): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->command = $command;
    }

<<<<<<< HEAD
=======
    public function setInteractive(bool $interactive): void
    {
        $this->interactive = $interactive;
    }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function initialize(): void
    {
        $descriptorSpec = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
<<<<<<< HEAD
            2 => ['pipe', 'w'],
=======
            2 => ['pipe', '\\' === \DIRECTORY_SEPARATOR ? 'a' : 'w'],
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        ];
        $pipes = [];
        $this->stream = proc_open($this->command, $descriptorSpec, $pipes);
        stream_set_blocking($pipes[2], false);
        if ($err = stream_get_contents($pipes[2])) {
            throw new TransportException('Process could not be started: '.$err);
        }
        $this->in = &$pipes[0];
        $this->out = &$pipes[1];
<<<<<<< HEAD
=======
        $this->err = &$pipes[2];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    public function terminate(): void
    {
        if (null !== $this->stream) {
            fclose($this->in);
<<<<<<< HEAD
            fclose($this->out);
            proc_close($this->stream);
        }

        parent::terminate();
=======
            $out = stream_get_contents($this->out);
            fclose($this->out);
            $err = stream_get_contents($this->err);
            fclose($this->err);
            if (0 !== $exitCode = proc_close($this->stream)) {
                $errorMessage = 'Process failed with exit code '.$exitCode.': '.$out.$err;
            }
        }

        parent::terminate();

        if (!$this->interactive && isset($errorMessage)) {
            throw new TransportException($errorMessage);
        }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    protected function getReadConnectionDescription(): string
    {
        return 'process '.$this->command;
    }
}
