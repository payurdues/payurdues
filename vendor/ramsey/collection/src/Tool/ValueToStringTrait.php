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

namespace Ramsey\Collection\Tool;

use DateTimeInterface;

<<<<<<< HEAD
use function get_class;
=======
use function assert;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use function get_resource_type;
use function is_array;
use function is_bool;
use function is_callable;
use function is_object;
use function is_resource;
use function is_scalar;
<<<<<<< HEAD
use function var_export;
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

/**
 * Provides functionality to express a value as string
 */
trait ValueToStringTrait
{
    /**
     * Returns a string representation of the value.
     *
     * - null value: `'NULL'`
     * - boolean: `'TRUE'`, `'FALSE'`
     * - array: `'Array'`
     * - scalar: converted-value
     * - resource: `'(type resource #number)'`
     * - object with `__toString()`: result of `__toString()`
     * - object DateTime: ISO 8601 date
     * - object: `'(className Object)'`
     * - anonymous function: same as object
     *
     * @param mixed $value the value to return as a string.
     */
<<<<<<< HEAD
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    protected function toolValueToString($value): string
=======
    protected function toolValueToString(mixed $value): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        // null
        if ($value === null) {
            return 'NULL';
        }

        // boolean constants
        if (is_bool($value)) {
            return $value ? 'TRUE' : 'FALSE';
        }

        // array
        if (is_array($value)) {
            return 'Array';
        }

        // scalar types (integer, float, string)
        if (is_scalar($value)) {
            return (string) $value;
        }

        // resource
        if (is_resource($value)) {
            return '(' . get_resource_type($value) . ' resource #' . (int) $value . ')';
        }

<<<<<<< HEAD
        // If we don't know what it is, use var_export().
        if (!is_object($value)) {
            return '(' . var_export($value, true) . ')';
        }

        // From here, $value should be an object.

        // __toString() is implemented
        if (is_callable([$value, '__toString'])) {
            return (string) $value->__toString();
=======
        // From here, $value should be an object.
        assert(is_object($value));

        // __toString() is implemented
        if (is_callable([$value, '__toString'])) {
            /** @var string */
            return $value->__toString();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        // object of type \DateTime
        if ($value instanceof DateTimeInterface) {
            return $value->format('c');
        }

        // unknown type
<<<<<<< HEAD
        // phpcs:ignore SlevomatCodingStandard.Classes.ModernClassNameReference.ClassNameReferencedViaFunctionCall
        return '(' . get_class($value) . ' Object)';
=======
        return '(' . $value::class . ' Object)';
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
