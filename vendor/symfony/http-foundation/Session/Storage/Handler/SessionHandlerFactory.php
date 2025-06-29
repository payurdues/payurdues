<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

<<<<<<< HEAD
use Doctrine\DBAL\DriverManager;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Component\Cache\Traits\RedisClusterProxy;
use Symfony\Component\Cache\Traits\RedisProxy;
=======
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\DefaultSchemaManagerFactory;
use Doctrine\DBAL\Tools\DsnParser;
use Relay\Relay;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class SessionHandlerFactory
{
<<<<<<< HEAD
    public static function createHandler(object|string $connection): AbstractSessionHandler
    {
        if ($options = \is_string($connection) ? parse_url($connection) : false) {
            parse_str($options['query'] ?? '', $options);
        }

        switch (true) {
            case $connection instanceof \Redis:
            case $connection instanceof \RedisArray:
            case $connection instanceof \RedisCluster:
            case $connection instanceof \Predis\ClientInterface:
            case $connection instanceof RedisProxy:
            case $connection instanceof RedisClusterProxy:
=======
    public static function createHandler(object|string $connection, array $options = []): AbstractSessionHandler
    {
        if ($query = \is_string($connection) ? parse_url($connection) : false) {
            parse_str($query['query'] ?? '', $query);

            if (($options['ttl'] ?? null) instanceof \Closure) {
                $query['ttl'] = $options['ttl'];
            }
        }
        $options = ($query ?: []) + $options;

        switch (true) {
            case $connection instanceof \Redis:
            case $connection instanceof Relay:
            case $connection instanceof \RedisArray:
            case $connection instanceof \RedisCluster:
            case $connection instanceof \Predis\ClientInterface:
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                return new RedisSessionHandler($connection);

            case $connection instanceof \Memcached:
                return new MemcachedSessionHandler($connection);

            case $connection instanceof \PDO:
                return new PdoSessionHandler($connection);

            case !\is_string($connection):
                throw new \InvalidArgumentException(sprintf('Unsupported Connection: "%s".', get_debug_type($connection)));
            case str_starts_with($connection, 'file://'):
                $savePath = substr($connection, 7);

                return new StrictSessionHandler(new NativeFileSessionHandler('' === $savePath ? null : $savePath));

            case str_starts_with($connection, 'redis:'):
            case str_starts_with($connection, 'rediss:'):
            case str_starts_with($connection, 'memcached:'):
                if (!class_exists(AbstractAdapter::class)) {
<<<<<<< HEAD
                    throw new \InvalidArgumentException(sprintf('Unsupported DSN "%s". Try running "composer require symfony/cache".', $connection));
=======
                    throw new \InvalidArgumentException('Unsupported Redis or Memcached DSN. Try running "composer require symfony/cache".');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                }
                $handlerClass = str_starts_with($connection, 'memcached:') ? MemcachedSessionHandler::class : RedisSessionHandler::class;
                $connection = AbstractAdapter::createConnection($connection, ['lazy' => true]);

<<<<<<< HEAD
                return new $handlerClass($connection, array_intersect_key($options ?: [], ['prefix' => 1, 'ttl' => 1]));

            case str_starts_with($connection, 'pdo_oci://'):
                if (!class_exists(DriverManager::class)) {
                    throw new \InvalidArgumentException(sprintf('Unsupported DSN "%s". Try running "composer require doctrine/dbal".', $connection));
                }
                $connection = DriverManager::getConnection(['url' => $connection])->getWrappedConnection();
=======
                return new $handlerClass($connection, array_intersect_key($options, ['prefix' => 1, 'ttl' => 1]));

            case str_starts_with($connection, 'pdo_oci://'):
                if (!class_exists(DriverManager::class)) {
                    throw new \InvalidArgumentException('Unsupported PDO OCI DSN. Try running "composer require doctrine/dbal".');
                }
                $connection[3] = '-';
                $params = class_exists(DsnParser::class) ? (new DsnParser())->parse($connection) : ['url' => $connection];
                $config = new Configuration();
                if (class_exists(DefaultSchemaManagerFactory::class)) {
                    $config->setSchemaManagerFactory(new DefaultSchemaManagerFactory());
                }

                $connection = DriverManager::getConnection($params, $config);
                // The condition should be removed once support for DBAL <3.3 is dropped
                $connection = method_exists($connection, 'getNativeConnection') ? $connection->getNativeConnection() : $connection->getWrappedConnection();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                // no break;

            case str_starts_with($connection, 'mssql://'):
            case str_starts_with($connection, 'mysql://'):
            case str_starts_with($connection, 'mysql2://'):
            case str_starts_with($connection, 'pgsql://'):
            case str_starts_with($connection, 'postgres://'):
            case str_starts_with($connection, 'postgresql://'):
            case str_starts_with($connection, 'sqlsrv://'):
            case str_starts_with($connection, 'sqlite://'):
            case str_starts_with($connection, 'sqlite3://'):
<<<<<<< HEAD
                return new PdoSessionHandler($connection, $options ?: []);
=======
                return new PdoSessionHandler($connection, $options);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        throw new \InvalidArgumentException(sprintf('Unsupported Connection: "%s".', $connection));
    }
}
