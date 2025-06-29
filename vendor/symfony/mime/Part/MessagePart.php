<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Part;

use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\RawMessage;

/**
 * @final
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class MessagePart extends DataPart
{
<<<<<<< HEAD
    private $message;
=======
    private RawMessage $message;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(RawMessage $message)
    {
        if ($message instanceof Message) {
            $name = $message->getHeaders()->getHeaderBody('Subject').'.eml';
        } else {
            $name = 'email.eml';
        }
        parent::__construct('', $name);

        $this->message = $message;
    }

    public function getMediaType(): string
    {
        return 'message';
    }

    public function getMediaSubtype(): string
    {
        return 'rfc822';
    }

    public function getBody(): string
    {
        return $this->message->toString();
    }

    public function bodyToString(): string
    {
        return $this->getBody();
    }

    public function bodyToIterable(): iterable
    {
        return $this->message->toIterable();
    }

    public function __sleep(): array
    {
        return ['message'];
    }

<<<<<<< HEAD
    public function __wakeup()
=======
    public function __wakeup(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->__construct($this->message);
    }
}
