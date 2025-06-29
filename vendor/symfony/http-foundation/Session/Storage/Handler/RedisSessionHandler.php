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

use Predis\Response\ErrorInterface;
<<<<<<< HEAD
use Symfony\Component\Cache\Traits\RedisClusterProxy;
use Symfony\Component\Cache\Traits\RedisProxy;
=======
use Relay\Relay;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

/**
 * Redis based session storage handler based on the Redis class
 * provided by the PHP redis extension.
 *
 * @author Dalibor Karlović <dalibor@flexolabs.io>
 */
class RedisSessionHandler extends AbstractSessionHandler
{
<<<<<<< HEAD
    private $redis;

=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    /**
     * Key prefix for shared environments.
     */
    private string $prefix;

    /**
     * Time to live in seconds.
     */
<<<<<<< HEAD
    private ?int $ttl;
=======
    private int|\Closure|null $ttl;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * List of available options:
     *  * prefix: The prefix to use for the keys in order to avoid collision on the Redis server
     *  * ttl: The time to live in seconds.
     *
     * @throws \InvalidArgumentException When unsupported client or options are passed
     */
<<<<<<< HEAD
    public function __construct(\Redis|\RedisArray|\RedisCluster|\Predis\ClientInterface|RedisProxy|RedisClusterProxy $redis, array $options = [])
    {
=======
    public function __construct(
        private \Redis|Relay|\RedisArray|\RedisCluster|\Predis\ClientInterface $redis,
        array $options = [],
    ) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if ($diff = array_diff(array_keys($options), ['prefix', 'ttl'])) {
            throw new \InvalidArgumentException(sprintf('The following options are not supported "%s".', implode(', ', $diff)));
        }

<<<<<<< HEAD
        $this->redis = $redis;
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        $this->prefix = $options['prefix'] ?? 'sf_s';
        $this->ttl = $options['ttl'] ?? null;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    protected function doRead(string $sessionId): string
=======
    protected function doRead(#[\SensitiveParameter] string $sessionId): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->redis->get($this->prefix.$sessionId) ?: '';
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    protected function doWrite(string $sessionId, string $data): bool
    {
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) ($this->ttl ?? \ini_get('session.gc_maxlifetime')), $data);
=======
    protected function doWrite(#[\SensitiveParameter] string $sessionId, string $data): bool
    {
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) $ttl, $data);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        return $result && !$result instanceof ErrorInterface;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    protected function doDestroy(string $sessionId): bool
=======
    protected function doDestroy(#[\SensitiveParameter] string $sessionId): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        static $unlink = true;

        if ($unlink) {
            try {
                $unlink = false !== $this->redis->unlink($this->prefix.$sessionId);
<<<<<<< HEAD
            } catch (\Throwable $e) {
=======
            } catch (\Throwable) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                $unlink = false;
            }
        }

        if (!$unlink) {
            $this->redis->del($this->prefix.$sessionId);
        }

        return true;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    #[\ReturnTypeWillChange]
    public function close(): bool
    {
        return true;
    }

    public function gc(int $maxlifetime): int|false
    {
        return 0;
    }

<<<<<<< HEAD
    public function updateTimestamp(string $sessionId, string $data): bool
    {
        return $this->redis->expire($this->prefix.$sessionId, (int) ($this->ttl ?? \ini_get('session.gc_maxlifetime')));
=======
    public function updateTimestamp(#[\SensitiveParameter] string $sessionId, string $data): bool
    {
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');

        return $this->redis->expire($this->prefix.$sessionId, (int) $ttl);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
