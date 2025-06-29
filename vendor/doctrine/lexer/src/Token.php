<?php

declare(strict_types=1);

namespace Doctrine\Common\Lexer;

<<<<<<< HEAD
use ArrayAccess;
use Doctrine\Deprecations\Deprecation;
use ReturnTypeWillChange;
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use UnitEnum;

use function in_array;

/**
 * @template T of UnitEnum|string|int
 * @template V of string|int
<<<<<<< HEAD
 * @implements ArrayAccess<string,mixed>
 */
final class Token implements ArrayAccess
=======
 */
final class Token
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
{
    /**
     * The string value of the token in the input string
     *
     * @readonly
     * @var V
     */
<<<<<<< HEAD
    public $value;
=======
    public string|int $value;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * The type of the token (identifier, numeric, string, input parameter, none)
     *
     * @readonly
     * @var T|null
     */
    public $type;

    /**
     * The position of the token in the input string
     *
     * @readonly
<<<<<<< HEAD
     * @var int
     */
    public $position;
=======
     */
    public int $position;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * @param V      $value
     * @param T|null $type
     */
<<<<<<< HEAD
    public function __construct($value, $type, int $position)
=======
    public function __construct(string|int $value, $type, int $position)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->value    = $value;
        $this->type     = $type;
        $this->position = $position;
    }

    /** @param T ...$types */
    public function isA(...$types): bool
    {
        return in_array($this->type, $types, true);
    }
<<<<<<< HEAD

    /**
     * @deprecated Use the value, type or position property instead
     * {@inheritDoc}
     */
    public function offsetExists($offset): bool
    {
        Deprecation::trigger(
            'doctrine/lexer',
            'https://github.com/doctrine/lexer/pull/79',
            'Accessing %s properties via ArrayAccess is deprecated, use the value, type or position property instead',
            self::class
        );

        return in_array($offset, ['value', 'type', 'position'], true);
    }

    /**
     * @deprecated Use the value, type or position property instead
     * {@inheritDoc}
     *
     * @param O $offset
     *
     * @return mixed
     * @psalm-return (
     *     O is 'value'
     *     ? V
     *     : (
     *         O is 'type'
     *         ? T|null
     *         : (
     *             O is 'position'
     *             ? int
     *             : mixed
     *         )
     *     )
     * )
     *
     * @template O of array-key
     */
    #[ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        Deprecation::trigger(
            'doctrine/lexer',
            'https://github.com/doctrine/lexer/pull/79',
            'Accessing %s properties via ArrayAccess is deprecated, use the value, type or position property instead',
            self::class
        );

        return $this->$offset;
    }

    /**
     * @deprecated no replacement planned
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value): void
    {
        Deprecation::trigger(
            'doctrine/lexer',
            'https://github.com/doctrine/lexer/pull/79',
            'Setting %s properties via ArrayAccess is deprecated',
            self::class
        );

        $this->$offset = $value;
    }

    /**
     * @deprecated no replacement planned
     * {@inheritDoc}
     */
    public function offsetUnset($offset): void
    {
        Deprecation::trigger(
            'doctrine/lexer',
            'https://github.com/doctrine/lexer/pull/79',
            'Setting %s properties via ArrayAccess is deprecated',
            self::class
        );

        $this->$offset = null;
    }
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
