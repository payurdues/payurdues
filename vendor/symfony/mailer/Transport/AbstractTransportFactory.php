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

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\IncompleteDsnException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @author Konstantin Myakshin <molodchick@gmail.com>
 */
abstract class AbstractTransportFactory implements TransportFactoryInterface
{
    protected $dispatcher;
    protected $client;
    protected $logger;

<<<<<<< HEAD
    public function __construct(EventDispatcherInterface $dispatcher = null, HttpClientInterface $client = null, LoggerInterface $logger = null)
=======
    public function __construct(?EventDispatcherInterface $dispatcher = null, ?HttpClientInterface $client = null, ?LoggerInterface $logger = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->dispatcher = $dispatcher;
        $this->client = $client;
        $this->logger = $logger;
    }

    public function supports(Dsn $dsn): bool
    {
        return \in_array($dsn->getScheme(), $this->getSupportedSchemes());
    }

    abstract protected function getSupportedSchemes(): array;

    protected function getUser(Dsn $dsn): string
    {
<<<<<<< HEAD
        $user = $dsn->getUser();
        if (null === $user) {
            throw new IncompleteDsnException('User is not set.');
        }

        return $user;
=======
        return $dsn->getUser() ?? throw new IncompleteDsnException('User is not set.');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    protected function getPassword(Dsn $dsn): string
    {
<<<<<<< HEAD
        $password = $dsn->getPassword();
        if (null === $password) {
            throw new IncompleteDsnException('Password is not set.');
        }

        return $password;
=======
        return $dsn->getPassword() ?? throw new IncompleteDsnException('Password is not set.');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
