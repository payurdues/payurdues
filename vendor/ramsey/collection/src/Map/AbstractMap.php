<?php

/**
 * This file is part of the ramsey/collection library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Collection\Map;

use Ramsey\Collection\AbstractArray;
use Ramsey\Collection\Exception\InvalidArgumentException;
<<<<<<< HEAD
=======
use Traversable;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

use function array_key_exists;
use function array_keys;
use function in_array;
use function var_export;

/**
 * This class provides a basic implementation of `MapInterface`, to minimize the
 * effort required to implement this interface.
 *
<<<<<<< HEAD
 * @template T
 * @extends AbstractArray<T>
 * @implements MapInterface<T>
=======
 * @template K of array-key
 * @template T
 * @extends AbstractArray<T>
 * @implements MapInterface<K, T>
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
abstract class AbstractMap extends AbstractArray implements MapInterface
{
    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function offsetSet($offset, $value): void
=======
     * @param array<K, T> $data The initial items to add to this map.
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * @return Traversable<K, T>
     */
    public function getIterator(): Traversable
    {
        return parent::getIterator();
    }

    /**
     * @param K $offset The offset to set
     * @param T $value The value to set at the given offset.
     *
     * @inheritDoc
     */
    public function offsetSet(mixed $offset, mixed $value): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($offset === null) {
            throw new InvalidArgumentException(
                'Map elements are key/value pairs; a key must be provided for '
                . 'value ' . var_export($value, true),
            );
        }

        $this->data[$offset] = $value;
    }

<<<<<<< HEAD
    /**
     * @inheritDoc
     */
    public function containsKey($key): bool
=======
    public function containsKey(int | string $key): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return array_key_exists($key, $this->data);
    }

<<<<<<< HEAD
    /**
     * @inheritDoc
     */
    public function containsValue($value): bool
=======
    public function containsValue(mixed $value): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return in_array($value, $this->data, true);
    }

    /**
     * @inheritDoc
     */
    public function keys(): array
    {
<<<<<<< HEAD
=======
        /** @var list<K> */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        return array_keys($this->data);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function get($key, $defaultValue = null)
    {
        if (!$this->containsKey($key)) {
            return $defaultValue;
        }

        return $this[$key];
    }

    /**
     * @inheritDoc
     */
    public function put($key, $value)
=======
     * @param K $key The key to return from the map.
     * @param T | null $defaultValue The default value to use if `$key` is not found.
     *
     * @return T | null the value or `null` if the key could not be found.
     */
    public function get(int | string $key, mixed $defaultValue = null): mixed
    {
        return $this[$key] ?? $defaultValue;
    }

    /**
     * @param K $key The key to put or replace in the map.
     * @param T $value The value to store at `$key`.
     *
     * @return T | null the previous value associated with key, or `null` if
     *     there was no mapping for `$key`.
     */
    public function put(int | string $key, mixed $value): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $previousValue = $this->get($key);
        $this[$key] = $value;

        return $previousValue;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function putIfAbsent($key, $value)
=======
     * @param K $key The key to put in the map.
     * @param T $value The value to store at `$key`.
     *
     * @return T | null the previous value associated with key, or `null` if
     *     there was no mapping for `$key`.
     */
    public function putIfAbsent(int | string $key, mixed $value): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $currentValue = $this->get($key);

        if ($currentValue === null) {
            $this[$key] = $value;
        }

        return $currentValue;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function remove($key)
=======
     * @param K $key The key to remove from the map.
     *
     * @return T | null the previous value associated with key, or `null` if
     *     there was no mapping for `$key`.
     */
    public function remove(int | string $key): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $previousValue = $this->get($key);
        unset($this[$key]);

        return $previousValue;
    }

<<<<<<< HEAD
    /**
     * @inheritDoc
     */
    public function removeIf($key, $value): bool
=======
    public function removeIf(int | string $key, mixed $value): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($this->get($key) === $value) {
            unset($this[$key]);

            return true;
        }

        return false;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function replace($key, $value)
=======
     * @param K $key The key to replace.
     * @param T $value The value to set at `$key`.
     *
     * @return T | null the previous value associated with key, or `null` if
     *     there was no mapping for `$key`.
     */
    public function replace(int | string $key, mixed $value): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $currentValue = $this->get($key);

        if ($this->containsKey($key)) {
            $this[$key] = $value;
        }

        return $currentValue;
    }

<<<<<<< HEAD
    /**
     * @inheritDoc
     */
    public function replaceIf($key, $oldValue, $newValue): bool
=======
    public function replaceIf(int | string $key, mixed $oldValue, mixed $newValue): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($this->get($key) === $oldValue) {
            $this[$key] = $newValue;

            return true;
        }

        return false;
    }
<<<<<<< HEAD
=======

    /**
     * @return array<K, T>
     */
    public function __serialize(): array
    {
        /** @var array<K, T> */
        return parent::__serialize();
    }

    /**
     * @return array<K, T>
     */
    public function toArray(): array
    {
        /** @var array<K, T> */
        return parent::toArray();
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
