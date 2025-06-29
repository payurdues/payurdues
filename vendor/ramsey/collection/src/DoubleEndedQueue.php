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

namespace Ramsey\Collection;

use Ramsey\Collection\Exception\InvalidArgumentException;
use Ramsey\Collection\Exception\NoSuchElementException;

<<<<<<< HEAD
=======
use function array_key_last;
use function array_pop;
use function array_unshift;

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
/**
 * This class provides a basic implementation of `DoubleEndedQueueInterface`, to
 * minimize the effort required to implement this interface.
 *
 * @template T
 * @extends Queue<T>
 * @implements DoubleEndedQueueInterface<T>
 */
class DoubleEndedQueue extends Queue implements DoubleEndedQueueInterface
{
    /**
<<<<<<< HEAD
     * Index of the last element in the queue.
     */
    private int $tail = -1;

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value): void
    {
        if ($this->checkType($this->getType(), $value) === false) {
            throw new InvalidArgumentException(
                'Value must be of type ' . $this->getType() . '; value is '
                . $this->toolValueToString($value),
            );
        }

        $this->tail++;

        $this->data[$this->tail] = $value;
=======
     * Constructs a double-ended queue (dequeue) object of the specified type,
     * optionally with the specified data.
     *
     * @param string $queueType The type or class name associated with this dequeue.
     * @param array<array-key, T> $data The initial items to store in the dequeue.
     */
    public function __construct(private readonly string $queueType, array $data = [])
    {
        parent::__construct($this->queueType, $data);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @throws InvalidArgumentException if $element is of the wrong type
<<<<<<< HEAD
     *
     * @inheritDoc
     */
    public function addFirst($element): bool
=======
     */
    public function addFirst(mixed $element): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($this->checkType($this->getType(), $element) === false) {
            throw new InvalidArgumentException(
                'Value must be of type ' . $this->getType() . '; value is '
                . $this->toolValueToString($element),
            );
        }

<<<<<<< HEAD
        $this->index--;

        $this->data[$this->index] = $element;
=======
        array_unshift($this->data, $element);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        return true;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function addLast($element): bool
=======
     * @throws InvalidArgumentException if $element is of the wrong type
     */
    public function addLast(mixed $element): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->add($element);
    }

<<<<<<< HEAD
    /**
     * @inheritDoc
     */
    public function offerFirst($element): bool
    {
        try {
            return $this->addFirst($element);
        } catch (InvalidArgumentException $e) {
=======
    public function offerFirst(mixed $element): bool
    {
        try {
            return $this->addFirst($element);
        } catch (InvalidArgumentException) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            return false;
        }
    }

<<<<<<< HEAD
    /**
     * @inheritDoc
     */
    public function offerLast($element): bool
=======
    public function offerLast(mixed $element): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->offer($element);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function removeFirst()
=======
     * @return T the first element in this queue.
     *
     * @throws NoSuchElementException if the queue is empty
     */
    public function removeFirst(): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->remove();
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function removeLast()
    {
        $tail = $this->pollLast();

        if ($tail === null) {
            throw new NoSuchElementException('Can\'t return element from Queue. Queue is empty.');
        }

        return $tail;
    }

    /**
     * @inheritDoc
     */
    public function pollFirst()
=======
     * @return T the last element in this queue.
     *
     * @throws NoSuchElementException if this queue is empty.
     */
    public function removeLast(): mixed
    {
        return $this->pollLast() ?? throw new NoSuchElementException(
            'Can\'t return element from Queue. Queue is empty.',
        );
    }

    /**
     * @return T | null the head of this queue, or `null` if this queue is empty.
     */
    public function pollFirst(): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->poll();
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function pollLast()
    {
        if ($this->count() === 0) {
            return null;
        }

        $tail = $this[$this->tail];

        unset($this[$this->tail]);
        $this->tail--;

        return $tail;
    }

    /**
     * @inheritDoc
     */
    public function firstElement()
=======
     * @return T | null the tail of this queue, or `null` if this queue is empty.
     */
    public function pollLast(): mixed
    {
        return array_pop($this->data);
    }

    /**
     * @return T the head of this queue.
     *
     * @throws NoSuchElementException if this queue is empty.
     */
    public function firstElement(): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->element();
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function lastElement()
    {
        if ($this->count() === 0) {
            throw new NoSuchElementException('Can\'t return element from Queue. Queue is empty.');
        }

        return $this->data[$this->tail];
    }

    /**
     * @inheritDoc
     */
    public function peekFirst()
=======
     * @return T the tail of this queue.
     *
     * @throws NoSuchElementException if this queue is empty.
     */
    public function lastElement(): mixed
    {
        return $this->peekLast() ?? throw new NoSuchElementException(
            'Can\'t return element from Queue. Queue is empty.',
        );
    }

    /**
     * @return T | null the head of this queue, or `null` if this queue is empty.
     */
    public function peekFirst(): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->peek();
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function peekLast()
    {
        if ($this->count() === 0) {
            return null;
        }

        return $this->data[$this->tail];
=======
     * @return T | null the tail of this queue, or `null` if this queue is empty.
     */
    public function peekLast(): mixed
    {
        $lastIndex = array_key_last($this->data);

        if ($lastIndex === null) {
            return null;
        }

        return $this->data[$lastIndex];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
