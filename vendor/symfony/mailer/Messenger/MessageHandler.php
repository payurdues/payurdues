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

use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\TransportInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class MessageHandler
{
<<<<<<< HEAD
    private $transport;
=======
    private TransportInterface $transport;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    public function __invoke(SendEmailMessage $message): ?SentMessage
    {
        return $this->transport->send($message->getMessage(), $message->getEnvelope());
    }
}
