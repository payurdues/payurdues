<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Tester\Constraint;

use PHPUnit\Framework\Constraint\Constraint;
use Symfony\Component\Console\Command\Command;

final class CommandIsSuccessful extends Constraint
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function toString(): string
    {
        return 'is successful';
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected function matches($other): bool
    {
        return Command::SUCCESS === $other;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected function failureDescription($other): string
    {
        return 'the command '.$this->toString();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected function additionalFailureDescription($other): string
    {
        $mapping = [
            Command::FAILURE => 'Command failed.',
            Command::INVALID => 'Command was invalid.',
        ];

        return $mapping[$other] ?? sprintf('Command returned exit status %d.', $other);
    }
}
