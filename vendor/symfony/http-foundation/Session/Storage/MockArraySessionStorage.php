<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

/**
 * MockArraySessionStorage mocks the session for unit tests.
 *
 * No PHP session is actually started since a session can be initialized
 * and shutdown only once per PHP execution cycle.
 *
 * When doing functional testing, you should use MockFileSessionStorage instead.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 * @author Drak <drak@zikula.org>
 */
class MockArraySessionStorage implements SessionStorageInterface
{
    /**
     * @var string
     */
    protected $id = '';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $started = false;

    /**
     * @var bool
     */
    protected $closed = false;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var MetadataBag
     */
    protected $metadataBag;

    /**
     * @var array|SessionBagInterface[]
     */
    protected $bags = [];

<<<<<<< HEAD
    public function __construct(string $name = 'MOCKSESSID', MetadataBag $metaBag = null)
=======
    public function __construct(string $name = 'MOCKSESSID', ?MetadataBag $metaBag = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->name = $name;
        $this->setMetadataBag($metaBag);
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setSessionData(array $array)
    {
        $this->data = $array;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function start(): bool
    {
        if ($this->started) {
            return true;
        }

        if (empty($this->id)) {
            $this->id = $this->generateId();
        }

        $this->loadSession();

        return true;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function regenerate(bool $destroy = false, int $lifetime = null): bool
=======
    public function regenerate(bool $destroy = false, ?int $lifetime = null): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (!$this->started) {
            $this->start();
        }

        $this->metadataBag->stampNew($lifetime);
        $this->id = $this->generateId();

        return true;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getId(): string
    {
        return $this->id;
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
        if ($this->started) {
            throw new \LogicException('Cannot set session ID after the session has started.');
        }

        $this->id = $id;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getName(): string
    {
        return $this->name;
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
        $this->name = $name;
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
        if (!$this->started || $this->closed) {
            throw new \RuntimeException('Trying to save a session that was not started yet or was already closed.');
        }
        // nothing to do since we don't persist the session data
        $this->closed = false;
        $this->started = false;
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
        // clear out the bags
        foreach ($this->bags as $bag) {
            $bag->clear();
        }

        // clear out the session
        $this->data = [];

        // reconnect the bags to the session
        $this->loadSession();
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
        $this->bags[$bag->getName()] = $bag;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getBag(string $name): SessionBagInterface
    {
        if (!isset($this->bags[$name])) {
            throw new \InvalidArgumentException(sprintf('The SessionBagInterface "%s" is not registered.', $name));
        }

        if (!$this->started) {
            $this->start();
        }

        return $this->bags[$name];
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isStarted(): bool
    {
        return $this->started;
    }

<<<<<<< HEAD
    public function setMetadataBag(MetadataBag $bag = null)
    {
        if (null === $bag) {
            $bag = new MetadataBag();
        }

        $this->metadataBag = $bag;
=======
    /**
     * @return void
     */
    public function setMetadataBag(?MetadataBag $bag = null)
    {
        if (1 > \func_num_args()) {
            trigger_deprecation('symfony/http-foundation', '6.2', 'Calling "%s()" without any arguments is deprecated, pass null explicitly instead.', __METHOD__);
        }
        $this->metadataBag = $bag ?? new MetadataBag();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Gets the MetadataBag.
     */
    public function getMetadataBag(): MetadataBag
    {
        return $this->metadataBag;
    }

    /**
     * Generates a session ID.
     *
     * This doesn't need to be particularly cryptographically secure since this is just
     * a mock.
     */
    protected function generateId(): string
    {
<<<<<<< HEAD
        return hash('sha256', uniqid('ss_mock_', true));
    }

=======
        return bin2hex(random_bytes(16));
    }

    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected function loadSession()
    {
        $bags = array_merge($this->bags, [$this->metadataBag]);

        foreach ($bags as $bag) {
            $key = $bag->getStorageKey();
<<<<<<< HEAD
            $this->data[$key] = $this->data[$key] ?? [];
=======
            $this->data[$key] ??= [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $bag->initialize($this->data[$key]);
        }

        $this->started = true;
        $this->closed = false;
    }
}
