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

<<<<<<< HEAD
/**
 * A collection represents a group of objects, known as its elements.
=======
use Ramsey\Collection\Exception\CollectionMismatchException;
use Ramsey\Collection\Exception\InvalidArgumentException;
use Ramsey\Collection\Exception\InvalidPropertyOrMethod;
use Ramsey\Collection\Exception\NoSuchElementException;
use Ramsey\Collection\Exception\UnsupportedOperationException;

/**
 * A collection represents a group of values, known as its elements.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 *
 * Some collections allow duplicate elements and others do not. Some are ordered
 * and others unordered.
 *
 * @template T
 * @extends ArrayInterface<T>
 */
interface CollectionInterface extends ArrayInterface
{
    /**
<<<<<<< HEAD
     * Ascending sort type.
     */
    public const SORT_ASC = 'asc';

    /**
     * Descending sort type.
     */
    public const SORT_DESC = 'desc';

    /**
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * Ensures that this collection contains the specified element (optional
     * operation).
     *
     * Returns `true` if this collection changed as a result of the call.
     * (Returns `false` if this collection does not permit duplicates and
     * already contains the specified element.)
     *
     * Collections that support this operation may place limitations on what
     * elements may be added to this collection. In particular, some
     * collections will refuse to add `null` elements, and others will impose
     * restrictions on the type of elements that may be added. Collection
     * classes should clearly specify in their documentation any restrictions
     * on what elements may be added.
     *
     * If a collection refuses to add a particular element for any reason other
     * than that it already contains the element, it must throw an exception
     * (rather than returning `false`). This preserves the invariant that a
     * collection always contains the specified element after this call returns.
     *
     * @param T $element The element to add to the collection.
     *
     * @return bool `true` if this collection changed as a result of the call.
<<<<<<< HEAD
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    public function add($element): bool;
=======
     *
     * @throws InvalidArgumentException if the collection refuses to add the
     *     $element for any reason other than that it already contains the element.
     */
    public function add(mixed $element): bool;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Returns `true` if this collection contains the specified element.
     *
     * @param T $element The element to check whether the collection contains.
     * @param bool $strict Whether to perform a strict type check on the value.
     */
<<<<<<< HEAD
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    public function contains($element, bool $strict = true): bool;
=======
    public function contains(mixed $element, bool $strict = true): bool;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Returns the type associated with this collection.
     */
    public function getType(): string;

    /**
     * Removes a single instance of the specified element from this collection,
     * if it is present.
     *
     * @param T $element The element to remove from the collection.
     *
     * @return bool `true` if an element was removed as a result of this call.
     */
<<<<<<< HEAD
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    public function remove($element): bool;

    /**
     * Returns the values from the given property or method.
     *
     * @param string $propertyOrMethod The property or method name to filter by.
     *
     * @return list<mixed>
=======
    public function remove(mixed $element): bool;

    /**
     * Returns the values from the given property, method, or array key.
     *
     * @param string $propertyOrMethod The name of the property, method, or
     *     array key to evaluate and return.
     *
     * @return list<mixed>
     *
     * @throws InvalidPropertyOrMethod if the $propertyOrMethod does not exist
     *     on the elements in this collection.
     * @throws UnsupportedOperationException if unable to call column() on this
     *     collection.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function column(string $propertyOrMethod): array;

    /**
     * Returns the first item of the collection.
     *
     * @return T
<<<<<<< HEAD
     */
    public function first();
=======
     *
     * @throws NoSuchElementException if this collection is empty.
     */
    public function first(): mixed;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Returns the last item of the collection.
     *
     * @return T
<<<<<<< HEAD
     */
    public function last();

    /**
     * Sort the collection by a property or method with the given sort order.
=======
     *
     * @throws NoSuchElementException if this collection is empty.
     */
    public function last(): mixed;

    /**
     * Sort the collection by a property, method, or array key with the given
     * sort order.
     *
     * If $propertyOrMethod is `null`, this will sort by comparing each element.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     *
     * This will always leave the original collection untouched and will return
     * a new one.
     *
<<<<<<< HEAD
     * @param string $propertyOrMethod The property or method to sort by.
     * @param string $order The sort order for the resulting collection (one of
     *     this interface's `SORT_*` constants).
     *
     * @return CollectionInterface<T>
     */
    public function sort(string $propertyOrMethod, string $order = self::SORT_ASC): self;
=======
     * @param string | null $propertyOrMethod The property, method, or array key
     *     to sort by.
     * @param Sort $order The sort order for the resulting collection.
     *
     * @return CollectionInterface<T>
     *
     * @throws InvalidPropertyOrMethod if the $propertyOrMethod does not exist
     *     on the elements in this collection.
     * @throws UnsupportedOperationException if unable to call sort() on this
     *     collection.
     */
    public function sort(?string $propertyOrMethod = null, Sort $order = Sort::Ascending): self;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Filter out items of the collection which don't match the criteria of
     * given callback.
     *
     * This will always leave the original collection untouched and will return
     * a new one.
     *
     * See the {@link http://php.net/manual/en/function.array-filter.php PHP array_filter() documentation}
     * for examples of how the `$callback` parameter works.
     *
<<<<<<< HEAD
     * @param callable(T):bool $callback A callable to use for filtering elements.
=======
     * @param callable(T): bool $callback A callable to use for filtering elements.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     *
     * @return CollectionInterface<T>
     */
    public function filter(callable $callback): self;

    /**
<<<<<<< HEAD
     * Create a new collection where items match the criteria of given callback.
=======
     * Create a new collection where the result of the given property, method,
     * or array key of each item in the collection equals the given value.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     *
     * This will always leave the original collection untouched and will return
     * a new one.
     *
<<<<<<< HEAD
     * @param string $propertyOrMethod The property or method to evaluate.
     * @param mixed $value The value to match.
     *
     * @return CollectionInterface<T>
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    public function where(string $propertyOrMethod, $value): self;
=======
     * @param string | null $propertyOrMethod The property, method, or array key
     *     to evaluate. If `null`, the element itself is compared to $value.
     * @param mixed $value The value to match.
     *
     * @return CollectionInterface<T>
     *
     * @throws InvalidPropertyOrMethod if the $propertyOrMethod does not exist
     *     on the elements in this collection.
     * @throws UnsupportedOperationException if unable to call where() on this
     *     collection.
     */
    public function where(?string $propertyOrMethod, mixed $value): self;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Apply a given callback method on each item of the collection.
     *
     * This will always leave the original collection untouched. The new
     * collection is created by mapping the callback to each item of the
     * original collection.
     *
     * See the {@link http://php.net/manual/en/function.array-map.php PHP array_map() documentation}
     * for examples of how the `$callback` parameter works.
     *
<<<<<<< HEAD
     * @param callable(T):TCallbackReturn $callback A callable to apply to each
=======
     * @param callable(T): TCallbackReturn $callback A callable to apply to each
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     *     item of the collection.
     *
     * @return CollectionInterface<TCallbackReturn>
     *
     * @template TCallbackReturn
     */
    public function map(callable $callback): self;

    /**
<<<<<<< HEAD
=======
     * Apply a given callback method on each item of the collection
     * to reduce it to a single value.
     *
     * See the {@link http://php.net/manual/en/function.array-reduce.php PHP array_reduce() documentation}
     * for examples of how the `$callback` and `$initial` parameters work.
     *
     * @param callable(TCarry, T): TCarry $callback A callable to apply to each
     *     item of the collection to reduce it to a single value.
     * @param TCarry $initial This is the initial value provided to the callback.
     *
     * @return TCarry
     *
     * @template TCarry
     */
    public function reduce(callable $callback, mixed $initial): mixed;

    /**
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * Create a new collection with divergent items between current and given
     * collection.
     *
     * @param CollectionInterface<T> $other The collection to check for divergent
     *     items.
     *
     * @return CollectionInterface<T>
<<<<<<< HEAD
=======
     *
     * @throws CollectionMismatchException if the compared collections are of
     *     differing types.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function diff(CollectionInterface $other): self;

    /**
     * Create a new collection with intersecting item between current and given
     * collection.
     *
     * @param CollectionInterface<T> $other The collection to check for
     *     intersecting items.
     *
     * @return CollectionInterface<T>
<<<<<<< HEAD
=======
     *
     * @throws CollectionMismatchException if the compared collections are of
     *     differing types.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function intersect(CollectionInterface $other): self;

    /**
     * Merge current items and items of given collections into a new one.
     *
     * @param CollectionInterface<T> ...$collections The collections to merge.
     *
     * @return CollectionInterface<T>
<<<<<<< HEAD
=======
     *
     * @throws CollectionMismatchException if unable to merge any of the given
     *     collections or items within the given collections due to type
     *     mismatch errors.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function merge(CollectionInterface ...$collections): self;
}
