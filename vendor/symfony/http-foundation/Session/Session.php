<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session;

use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;

// Help opcache.preload discover always-needed symbols
class_exists(AttributeBag::class);
class_exists(FlashBag::class);
class_exists(SessionBagProxy::class);

/**
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Drak <drak@zikula.org>
 *
 * @implements \IteratorAggregate<string, mixed>
 */
<<<<<<< HEAD
class Session implements SessionInterface, \IteratorAggregate, \Countable
=======
class Session implements FlashBagAwareSessionInterface, \IteratorAggregate, \Countable
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
{
    protected $storage;

    private string $flashName;
    private string $attributeName;
    private array $data = [];
    private int $usageIndex = 0;
    private ?\Closure $usageReporter;

<<<<<<< HEAD
    public function __construct(SessionStorageInterface $storage = null, AttributeBagInterface $attributes = null, FlashBagInterface $flashes = null, callable $usageReporter = null)
    {
        $this->storage = $storage ?? new NativeSessionStorage();
        $this->usageReporter = $usageReporter instanceof \Closure || !\is_callable($usageReporter) ? $usageReporter : \Closure::fromCallable($usageReporter);

        $attributes = $attributes ?? new AttributeBag();
        $this->attributeName = $attributes->getName();
        $this->registerBag($attributes);

        $flashes = $flashes ?? new FlashBag();
=======
    public function __construct(?SessionStorageInterface $storage = null, ?AttributeBagInterface $attributes = null, ?FlashBagInterface $flashes = null, ?callable $usageReporter = null)
    {
        $this->storage = $storage ?? new NativeSessionStorage();
        $this->usageReporter = null === $usageReporter ? null : $usageReporter(...);

        $attributes ??= new AttributeBag();
        $this->attributeName = $attributes->getName();
        $this->registerBag($attributes);

        $flashes ??= new FlashBag();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        $this->flashName = $flashes->getName();
        $this->registerBag($flashes);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function start(): bool
    {
        return $this->storage->start();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function has(string $name): bool
    {
        return $this->getAttributeBag()->has($name);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function get(string $name, mixed $default = null): mixed
    {
        return $this->getAttributeBag()->get($name, $default);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function set(string $name, mixed $value)
    {
        $this->getAttributeBag()->set($name, $value);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function all(): array
    {
        return $this->getAttributeBag()->all();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function replace(array $attributes)
    {
        $this->getAttributeBag()->replace($attributes);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function remove(string $name): mixed
    {
        return $this->getAttributeBag()->remove($name);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function clear()
    {
        $this->getAttributeBag()->clear();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isStarted(): bool
    {
        return $this->storage->isStarted();
    }

    /**
     * Returns an iterator for attributes.
     *
     * @return \ArrayIterator<string, mixed>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->getAttributeBag()->all());
    }

    /**
     * Returns the number of attributes.
     */
    public function count(): int
    {
        return \count($this->getAttributeBag()->all());
    }

    public function &getUsageIndex(): int
    {
        return $this->usageIndex;
    }

    /**
     * @internal
     */
    public function isEmpty(): bool
    {
        if ($this->isStarted()) {
            ++$this->usageIndex;
            if ($this->usageReporter && 0 <= $this->usageIndex) {
                ($this->usageReporter)();
            }
        }
        foreach ($this->data as &$data) {
            if (!empty($data)) {
                return false;
            }
        }

        return true;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function invalidate(int $lifetime = null): bool
=======
    public function invalidate(?int $lifetime = null): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->storage->clear();

        return $this->migrate(true, $lifetime);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function migrate(bool $destroy = false, int $lifetime = null): bool
=======
    public function migrate(bool $destroy = false, ?int $lifetime = null): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->storage->regenerate($destroy, $lifetime);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function save()
    {
        $this->storage->save();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getId(): string
    {
        return $this->storage->getId();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setId(string $id)
    {
        if ($this->storage->getId() !== $id) {
            $this->storage->setId($id);
        }
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getName(): string
    {
        return $this->storage->getName();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setName(string $name)
    {
        $this->storage->setName($name);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getMetadataBag(): MetadataBag
    {
        ++$this->usageIndex;
        if ($this->usageReporter && 0 <= $this->usageIndex) {
            ($this->usageReporter)();
        }

        return $this->storage->getMetadataBag();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function registerBag(SessionBagInterface $bag)
    {
        $this->storage->registerBag(new SessionBagProxy($bag, $this->data, $this->usageIndex, $this->usageReporter));
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getBag(string $name): SessionBagInterface
    {
        $bag = $this->storage->getBag($name);

        return method_exists($bag, 'getBag') ? $bag->getBag() : $bag;
    }

    /**
     * Gets the flashbag interface.
     */
    public function getFlashBag(): FlashBagInterface
    {
        return $this->getBag($this->flashName);
    }

    /**
     * Gets the attributebag interface.
     *
     * Note that this method was added to help with IDE autocompletion.
     */
    private function getAttributeBag(): AttributeBagInterface
    {
        return $this->getBag($this->attributeName);
    }
}
