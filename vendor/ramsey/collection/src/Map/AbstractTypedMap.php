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

use Ramsey\Collection\Exception\InvalidArgumentException;
use Ramsey\Collection\Tool\TypeTrait;
use Ramsey\Collection\Tool\ValueToStringTrait;

<<<<<<< HEAD
use function var_export;

=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
/**
 * This class provides a basic implementation of `TypedMapInterface`, to
 * minimize the effort required to implement this interface.
 *
 * @template K of array-key
 * @template T
<<<<<<< HEAD
 * @extends AbstractMap<T>
 * @implements TypedMapInterface<T>
=======
 * @extends AbstractMap<K, T>
 * @implements TypedMapInterface<K, T>
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
abstract class AbstractTypedMap extends AbstractMap implements TypedMapInterface
{
    use TypeTrait;
    use ValueToStringTrait;

    /**
<<<<<<< HEAD
     * @param K|null $offset
=======
     * @param K $offset
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * @param T $value
     *
     * @inheritDoc
     */
<<<<<<< HEAD
    public function offsetSet($offset, $value): void
    {
        if ($offset === null) {
            throw new InvalidArgumentException(
                'Map elements are key/value pairs; a key must be provided for '
                . 'value ' . var_export($value, true),
            );
        }

=======
    public function offsetSet(mixed $offset, mixed $value): void
    {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if ($this->checkType($this->getKeyType(), $offset) === false) {
            throw new InvalidArgumentException(
                'Key must be of type ' . $this->getKeyType() . '; key is '
                . $this->toolValueToString($offset),
            );
        }

        if ($this->checkType($this->getValueType(), $value) === false) {
            throw new InvalidArgumentException(
                'Value must be of type ' . $this->getValueType() . '; value is '
                . $this->toolValueToString($value),
            );
        }

        parent::offsetSet($offset, $value);
    }
}
