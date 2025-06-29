<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Test\Constraint;

use PHPUnit\Framework\Constraint\Constraint;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\RawMessage;

final class EmailHtmlBodyContains extends Constraint
{
    private string $expectedText;

    public function __construct(string $expectedText)
    {
        $this->expectedText = $expectedText;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function toString(): string
    {
        return sprintf('contains "%s"', $this->expectedText);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     *
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * @param RawMessage $message
     */
    protected function matches($message): bool
    {
<<<<<<< HEAD
        if (RawMessage::class === \get_class($message) || Message::class === \get_class($message)) {
            throw new \LogicException('Unable to test a message HTML body on a RawMessage or Message instance.');
        }

        return false !== mb_strpos($message->getHtmlBody(), $this->expectedText);
    }

    /**
     * {@inheritdoc}
     *
=======
        if (RawMessage::class === $message::class || Message::class === $message::class) {
            throw new \LogicException('Unable to test a message HTML body on a RawMessage or Message instance.');
        }

        return str_contains($message->getHtmlBody(), $this->expectedText);
    }

    /**
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * @param RawMessage $message
     */
    protected function failureDescription($message): string
    {
        return 'the Email HTML body '.$this->toString();
    }
}
