<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\RawMessage;

/**
<<<<<<< HEAD
 * Interface for mailers able to send emails synchronous and/or asynchronous.
=======
 * Interface for mailers able to send emails synchronously and/or asynchronously.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 *
 * Implementations must support synchronous and asynchronous sending.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface MailerInterface
{
    /**
     * @throws TransportExceptionInterface
     */
<<<<<<< HEAD
    public function send(RawMessage $message, Envelope $envelope = null): void;
=======
    public function send(RawMessage $message, ?Envelope $envelope = null): void;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
