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
use Symfony\Component\Mime\RawMessage;

final class EmailHasHeader extends Constraint
{
    private string $headerName;

    public function __construct(string $headerName)
    {
        $this->headerName = $headerName;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function toString(): string
    {
        return sprintf('has header "%s"', $this->headerName);
    }

    /**
     * @param RawMessage $message
<<<<<<< HEAD
     *
     * {@inheritdoc}
     */
    protected function matches($message): bool
    {
        if (RawMessage::class === \get_class($message)) {
=======
     */
    protected function matches($message): bool
    {
        if (RawMessage::class === $message::class) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            throw new \LogicException('Unable to test a message header on a RawMessage instance.');
        }

        return $message->getHeaders()->has($this->headerName);
    }

    /**
     * @param RawMessage $message
<<<<<<< HEAD
     *
     * {@inheritdoc}
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function failureDescription($message): string
    {
        return 'the Email '.$this->toString();
    }
}
