<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Messenger;

use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mime\RawMessage;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class SendEmailMessage
{
<<<<<<< HEAD
    private $message;
    private $envelope;

    public function __construct(RawMessage $message, Envelope $envelope = null)
=======
    private RawMessage $message;
    private ?Envelope $envelope;

    public function __construct(RawMessage $message, ?Envelope $envelope = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->message = $message;
        $this->envelope = $envelope;
    }

    public function getMessage(): RawMessage
    {
        return $this->message;
    }

    public function getEnvelope(): ?Envelope
    {
        return $this->envelope;
    }
}
