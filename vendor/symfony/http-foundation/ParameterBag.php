<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;
<<<<<<< HEAD
=======
use Symfony\Component\HttpFoundation\Exception\UnexpectedValueException;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

/**
 * ParameterBag is a container for key/value pairs.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @implements \IteratorAggregate<string, mixed>
 */
class ParameterBag implements \IteratorAggregate, \Countable
{
    /**
     * Parameter storage.
     */
    protected $parameters;

    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * Returns the parameters.
     *
     * @param string|null $key The name of the parameter to return or null to get them all
     */
<<<<<<< HEAD
    public function all(string $key = null): array
=======
    public function all(?string $key = null): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (null === $key) {
            return $this->parameters;
        }

        if (!\is_array($value = $this->parameters[$key] ?? [])) {
            throw new BadRequestException(sprintf('Unexpected value for parameter "%s": expecting "array", got "%s".', $key, get_debug_type($value)));
        }

        return $value;
    }

    /**
     * Returns the parameter keys.
     */
    public function keys(): array
    {
        return array_keys($this->parameters);
    }

    /**
     * Replaces the current parameters by a new set.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function replace(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * Adds parameters.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function add(array $parameters = [])
    {
        $this->parameters = array_replace($this->parameters, $parameters);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return \array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function set(string $key, mixed $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * Returns true if the parameter is defined.
     */
    public function has(string $key): bool
    {
        return \array_key_exists($key, $this->parameters);
    }

    /**
     * Removes a parameter.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function remove(string $key)
    {
        unset($this->parameters[$key]);
    }

    /**
     * Returns the alphabetic characters of the parameter value.
     */
    public function getAlpha(string $key, string $default = ''): string
    {
<<<<<<< HEAD
        return preg_replace('/[^[:alpha:]]/', '', $this->get($key, $default));
=======
        return preg_replace('/[^[:alpha:]]/', '', $this->getString($key, $default));
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Returns the alphabetic characters and digits of the parameter value.
     */
    public function getAlnum(string $key, string $default = ''): string
    {
<<<<<<< HEAD
        return preg_replace('/[^[:alnum:]]/', '', $this->get($key, $default));
=======
        return preg_replace('/[^[:alnum:]]/', '', $this->getString($key, $default));
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Returns the digits of the parameter value.
     */
    public function getDigits(string $key, string $default = ''): string
    {
<<<<<<< HEAD
        // we need to remove - and + because they're allowed in the filter
        return str_replace(['-', '+'], '', $this->filter($key, $default, \FILTER_SANITIZE_NUMBER_INT));
=======
        return preg_replace('/[^[:digit:]]/', '', $this->getString($key, $default));
    }

    /**
     * Returns the parameter as string.
     */
    public function getString(string $key, string $default = ''): string
    {
        $value = $this->get($key, $default);
        if (!\is_scalar($value) && !$value instanceof \Stringable) {
            throw new UnexpectedValueException(sprintf('Parameter value "%s" cannot be converted to "string".', $key));
        }

        return (string) $value;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Returns the parameter value converted to integer.
     */
    public function getInt(string $key, int $default = 0): int
    {
<<<<<<< HEAD
        return (int) $this->get($key, $default);
=======
        // In 7.0 remove the fallback to 0, in case of failure an exception will be thrown
        return $this->filter($key, $default, \FILTER_VALIDATE_INT, ['flags' => \FILTER_REQUIRE_SCALAR]) ?: 0;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Returns the parameter value converted to boolean.
     */
    public function getBoolean(string $key, bool $default = false): bool
    {
<<<<<<< HEAD
        return $this->filter($key, $default, \FILTER_VALIDATE_BOOLEAN);
=======
        return $this->filter($key, $default, \FILTER_VALIDATE_BOOL, ['flags' => \FILTER_REQUIRE_SCALAR]);
    }

    /**
     * Returns the parameter value converted to an enum.
     *
     * @template T of \BackedEnum
     *
     * @param class-string<T> $class
     * @param ?T              $default
     *
     * @return ?T
     */
    public function getEnum(string $key, string $class, ?\BackedEnum $default = null): ?\BackedEnum
    {
        $value = $this->get($key);

        if (null === $value) {
            return $default;
        }

        try {
            return $class::from($value);
        } catch (\ValueError|\TypeError $e) {
            throw new UnexpectedValueException(sprintf('Parameter "%s" cannot be converted to enum: %s.', $key, $e->getMessage()), $e->getCode(), $e);
        }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Filter key.
     *
<<<<<<< HEAD
     * @param int $filter FILTER_* constant
=======
     * @param int                                     $filter  FILTER_* constant
     * @param int|array{flags?: int, options?: array} $options Flags from FILTER_* constants
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     *
     * @see https://php.net/filter-var
     */
    public function filter(string $key, mixed $default = null, int $filter = \FILTER_DEFAULT, mixed $options = []): mixed
    {
        $value = $this->get($key, $default);

        // Always turn $options into an array - this allows filter_var option shortcuts.
        if (!\is_array($options) && $options) {
            $options = ['flags' => $options];
        }

        // Add a convenience check for arrays.
        if (\is_array($value) && !isset($options['flags'])) {
            $options['flags'] = \FILTER_REQUIRE_ARRAY;
        }

<<<<<<< HEAD
=======
        if (\is_object($value) && !$value instanceof \Stringable) {
            throw new UnexpectedValueException(sprintf('Parameter value "%s" cannot be filtered.', $key));
        }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if ((\FILTER_CALLBACK & $filter) && !(($options['options'] ?? null) instanceof \Closure)) {
            throw new \InvalidArgumentException(sprintf('A Closure must be passed to "%s()" when FILTER_CALLBACK is used, "%s" given.', __METHOD__, get_debug_type($options['options'] ?? null)));
        }

<<<<<<< HEAD
        return filter_var($value, $filter, $options);
=======
        $options['flags'] ??= 0;
        $nullOnFailure = $options['flags'] & \FILTER_NULL_ON_FAILURE;
        $options['flags'] |= \FILTER_NULL_ON_FAILURE;

        $value = filter_var($value, $filter, $options);

        if (null !== $value || $nullOnFailure) {
            return $value;
        }

        $method = debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS | \DEBUG_BACKTRACE_PROVIDE_OBJECT, 2)[1];
        $method = ($method['object'] ?? null) === $this ? $method['function'] : 'filter';
        $hint = 'filter' === $method ? 'pass' : 'use method "filter()" with';

        trigger_deprecation('symfony/http-foundation', '6.3', 'Ignoring invalid values when using "%s::%s(\'%s\')" is deprecated and will throw an "%s" in 7.0; '.$hint.' flag "FILTER_NULL_ON_FAILURE" to keep ignoring them.', $this::class, $method, $key, UnexpectedValueException::class);

        return false;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Returns an iterator for parameters.
     *
     * @return \ArrayIterator<string, mixed>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->parameters);
    }

    /**
     * Returns the number of parameters.
     */
    public function count(): int
    {
        return \count($this->parameters);
    }
}
