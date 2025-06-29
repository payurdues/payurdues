<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Test\Constraint;

use PHPUnit\Framework\Constraint\Constraint;
use Symfony\Component\Mailer\Event\MessageEvents;

final class EmailCount extends Constraint
{
    private int $expectedValue;
    private ?string $transport;
    private bool $queued;

<<<<<<< HEAD
    public function __construct(int $expectedValue, string $transport = null, bool $queued = false)
=======
    public function __construct(int $expectedValue, ?string $transport = null, bool $queued = false)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->expectedValue = $expectedValue;
        $this->transport = $transport;
        $this->queued = $queued;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function toString(): string
    {
        return sprintf('%shas %s "%d" emails', $this->transport ? $this->transport.' ' : '', $this->queued ? 'queued' : 'sent', $this->expectedValue);
    }

    /**
     * @param MessageEvents $events
<<<<<<< HEAD
     *
     * {@inheritdoc}
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function matches($events): bool
    {
        return $this->expectedValue === $this->countEmails($events);
    }

    /**
     * @param MessageEvents $events
<<<<<<< HEAD
     *
     * {@inheritdoc}
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function failureDescription($events): string
    {
        return sprintf('the Transport %s (%d %s)', $this->toString(), $this->countEmails($events), $this->queued ? 'queued' : 'sent');
    }

    private function countEmails(MessageEvents $events): int
    {
        $count = 0;
        foreach ($events->getEvents($this->transport) as $event) {
            if (
                ($this->queued && $event->isQueued())
<<<<<<< HEAD
                ||
                (!$this->queued && !$event->isQueued())
=======
                || (!$this->queued && !$event->isQueued())
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            ) {
                ++$count;
            }
        }

        return $count;
    }
}
