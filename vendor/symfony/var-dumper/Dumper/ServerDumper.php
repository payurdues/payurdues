<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Dumper;

use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\Dumper\ContextProvider\ContextProviderInterface;
use Symfony\Component\VarDumper\Server\Connection;

/**
 * ServerDumper forwards serialized Data clones to a server.
 *
 * @author Maxime Steinhausser <maxime.steinhausser@gmail.com>
 */
class ServerDumper implements DataDumperInterface
{
<<<<<<< HEAD
    private $connection;
    private $wrappedDumper;
=======
    private Connection $connection;
    private ?DataDumperInterface $wrappedDumper;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * @param string                     $host             The server host
     * @param DataDumperInterface|null   $wrappedDumper    A wrapped instance used whenever we failed contacting the server
     * @param ContextProviderInterface[] $contextProviders Context providers indexed by context name
     */
<<<<<<< HEAD
    public function __construct(string $host, DataDumperInterface $wrappedDumper = null, array $contextProviders = [])
=======
    public function __construct(string $host, ?DataDumperInterface $wrappedDumper = null, array $contextProviders = [])
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->connection = new Connection($host, $contextProviders);
        $this->wrappedDumper = $wrappedDumper;
    }

    public function getContextProviders(): array
    {
        return $this->connection->getContextProviders();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return string|null
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function dump(Data $data)
    {
        if (!$this->connection->write($data) && $this->wrappedDumper) {
<<<<<<< HEAD
            $this->wrappedDumper->dump($data);
        }
=======
            return $this->wrappedDumper->dump($data);
        }

        return null;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
