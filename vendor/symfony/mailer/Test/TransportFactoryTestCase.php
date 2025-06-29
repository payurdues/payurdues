<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Test;

use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\IncompleteDsnException;
use Symfony\Component\Mailer\Exception\UnsupportedSchemeException;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportFactoryInterface;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * A test case to ease testing Transport Factory.
 *
 * @author Konstantin Myakshin <molodchick@gmail.com>
 */
abstract class TransportFactoryTestCase extends TestCase
{
    protected const USER = 'u$er';
    protected const PASSWORD = 'pa$s';

    protected $dispatcher;
    protected $client;
    protected $logger;

    abstract public function getFactory(): TransportFactoryInterface;

<<<<<<< HEAD
    abstract public function supportsProvider(): iterable;

    abstract public function createProvider(): iterable;

    public function unsupportedSchemeProvider(): iterable
=======
    abstract public static function supportsProvider(): iterable;

    abstract public static function createProvider(): iterable;

    public static function unsupportedSchemeProvider(): iterable
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return [];
    }

<<<<<<< HEAD
    public function incompleteDsnProvider(): iterable
=======
    public static function incompleteDsnProvider(): iterable
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return [];
    }

    /**
     * @dataProvider supportsProvider
     */
    public function testSupports(Dsn $dsn, bool $supports)
    {
        $factory = $this->getFactory();

        $this->assertSame($supports, $factory->supports($dsn));
    }

    /**
     * @dataProvider createProvider
     */
    public function testCreate(Dsn $dsn, TransportInterface $transport)
    {
        $factory = $this->getFactory();

        $this->assertEquals($transport, $factory->create($dsn));
        if (str_contains('smtp', $dsn->getScheme())) {
            $this->assertStringMatchesFormat($dsn->getScheme().'://%S'.$dsn->getHost().'%S', (string) $transport);
        }
    }

    /**
     * @dataProvider unsupportedSchemeProvider
     */
<<<<<<< HEAD
    public function testUnsupportedSchemeException(Dsn $dsn, string $message = null)
=======
    public function testUnsupportedSchemeException(Dsn $dsn, ?string $message = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $factory = $this->getFactory();

        $this->expectException(UnsupportedSchemeException::class);
        if (null !== $message) {
            $this->expectExceptionMessage($message);
        }

        $factory->create($dsn);
    }

    /**
     * @dataProvider incompleteDsnProvider
     */
    public function testIncompleteDsnException(Dsn $dsn)
    {
        $factory = $this->getFactory();

        $this->expectException(IncompleteDsnException::class);
        $factory->create($dsn);
    }

    protected function getDispatcher(): EventDispatcherInterface
    {
<<<<<<< HEAD
        return $this->dispatcher ?? $this->dispatcher = $this->createMock(EventDispatcherInterface::class);
=======
        return $this->dispatcher ??= $this->createMock(EventDispatcherInterface::class);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    protected function getClient(): HttpClientInterface
    {
<<<<<<< HEAD
        return $this->client ?? $this->client = $this->createMock(HttpClientInterface::class);
=======
        return $this->client ??= $this->createMock(HttpClientInterface::class);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    protected function getLogger(): LoggerInterface
    {
<<<<<<< HEAD
        return $this->logger ?? $this->logger = $this->createMock(LoggerInterface::class);
=======
        return $this->logger ??= $this->createMock(LoggerInterface::class);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
