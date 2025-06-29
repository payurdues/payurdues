<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Profiler;

use Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface;

/**
 * Profile.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Profile
{
    private string $token;

    /**
     * @var DataCollectorInterface[]
     */
    private array $collectors = [];

    private ?string $ip = null;
    private ?string $method = null;
    private ?string $url = null;
    private ?int $time = null;
    private ?int $statusCode = null;
    private ?self $parent = null;
<<<<<<< HEAD
=======
    private ?string $virtualType = null;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * @var Profile[]
     */
    private array $children = [];

    public function __construct(string $token)
    {
        $this->token = $token;
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * Gets the token.
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Sets the parent token.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setParent(self $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Returns the parent profile.
     */
    public function getParent(): ?self
    {
        return $this->parent;
    }

    /**
     * Returns the parent token.
     */
    public function getParentToken(): ?string
    {
<<<<<<< HEAD
        return $this->parent ? $this->parent->getToken() : null;
=======
        return $this->parent?->getToken();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Returns the IP.
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setIp(?string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * Returns the request method.
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    /**
     * Returns the URL.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setUrl(?string $url)
    {
        $this->url = $url;
    }

    public function getTime(): int
    {
        return $this->time ?? 0;
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setTime(int $time)
    {
        $this->time = $time;
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
<<<<<<< HEAD
=======
     * @internal
     */
    public function setVirtualType(?string $virtualType): void
    {
        $this->virtualType = $virtualType;
    }

    /**
     * @internal
     */
    public function getVirtualType(): ?string
    {
        return $this->virtualType;
    }

    /**
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * Finds children profilers.
     *
     * @return self[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * Sets children profiler.
     *
     * @param Profile[] $children
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setChildren(array $children)
    {
        $this->children = [];
        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * Adds the child token.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function addChild(self $child)
    {
        $this->children[] = $child;
        $child->setParent($this);
    }

    public function getChildByToken(string $token): ?self
    {
        foreach ($this->children as $child) {
            if ($token === $child->getToken()) {
                return $child;
            }
        }

        return null;
    }

    /**
     * Gets a Collector by name.
     *
     * @throws \InvalidArgumentException if the collector does not exist
     */
    public function getCollector(string $name): DataCollectorInterface
    {
        if (!isset($this->collectors[$name])) {
            throw new \InvalidArgumentException(sprintf('Collector "%s" does not exist.', $name));
        }

        return $this->collectors[$name];
    }

    /**
     * Gets the Collectors associated with this profile.
     *
     * @return DataCollectorInterface[]
     */
    public function getCollectors(): array
    {
        return $this->collectors;
    }

    /**
     * Sets the Collectors associated with this profile.
     *
     * @param DataCollectorInterface[] $collectors
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setCollectors(array $collectors)
    {
        $this->collectors = [];
        foreach ($collectors as $collector) {
            $this->addCollector($collector);
        }
    }

    /**
     * Adds a Collector.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function addCollector(DataCollectorInterface $collector)
    {
        $this->collectors[$collector->getName()] = $collector;
    }

    public function hasCollector(string $name): bool
    {
        return isset($this->collectors[$name]);
    }

    public function __sleep(): array
    {
<<<<<<< HEAD
        return ['token', 'parent', 'children', 'collectors', 'ip', 'method', 'url', 'time', 'statusCode'];
=======
        return ['token', 'parent', 'children', 'collectors', 'ip', 'method', 'url', 'time', 'statusCode', 'virtualType'];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
