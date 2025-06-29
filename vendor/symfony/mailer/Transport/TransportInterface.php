<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Transport;

use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mime\RawMessage;

/**
 * Interface for all mailer transports.
 *
 * When sending emails, you should prefer MailerInterface implementations
 * as they allow asynchronous sending.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
<<<<<<< HEAD
interface TransportInterface
=======
interface TransportInterface extends \Stringable
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
{
    /**
     * @throws TransportExceptionInterface
     */
<<<<<<< HEAD
    public function send(RawMessage $message, Envelope $envelope = null): ?SentMessage;

    public function __toString(): string;
=======
    public function send(RawMessage $message, ?Envelope $envelope = null): ?SentMessage;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
