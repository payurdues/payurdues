<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
namespace Doctrine\Instantiator;

use ArrayIterator;
use Doctrine\Instantiator\Exception\ExceptionInterface;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Doctrine\Instantiator\Exception\UnexpectedValueException;
use Exception;
use ReflectionClass;
use ReflectionException;
use Serializable;

use function class_exists;
use function enum_exists;
use function is_subclass_of;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;
use function strlen;
use function unserialize;

<<<<<<< HEAD
use const PHP_VERSION_ID;

=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
final class Instantiator implements InstantiatorInterface
{
    /**
     * Markers used internally by PHP to define whether {@see \unserialize} should invoke
     * the method {@see \Serializable::unserialize()} when dealing with classes implementing
     * the {@see \Serializable} interface.
     *
     * @deprecated This constant will be private in 2.0
     */
<<<<<<< HEAD
    public const SERIALIZATION_FORMAT_USE_UNSERIALIZER = 'C';

    /** @deprecated This constant will be private in 2.0 */
    public const SERIALIZATION_FORMAT_AVOID_UNSERIALIZER = 'O';
=======
    private const SERIALIZATION_FORMAT_USE_UNSERIALIZER   = 'C';
    private const SERIALIZATION_FORMAT_AVOID_UNSERIALIZER = 'O';
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Used to instantiate specific classes, indexed by class name.
     *
     * @var callable[]
     */
<<<<<<< HEAD
    private static $cachedInstantiators = [];
=======
    private static array $cachedInstantiators = [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Array of objects that can directly be cloned, indexed by class name.
     *
     * @var object[]
     */
<<<<<<< HEAD
    private static $cachedCloneables = [];

    /**
     * @param string $className
     * @phpstan-param class-string<T> $className
     *
     * @return object
=======
    private static array $cachedCloneables = [];

    /**
     * @phpstan-param class-string<T> $className
     *
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * @phpstan-return T
     *
     * @throws ExceptionInterface
     *
     * @template T of object
     */
<<<<<<< HEAD
    public function instantiate($className)
=======
    public function instantiate(string $className): object
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (isset(self::$cachedCloneables[$className])) {
            /** @phpstan-var T */
            $cachedCloneable = self::$cachedCloneables[$className];

            return clone $cachedCloneable;
        }

        if (isset(self::$cachedInstantiators[$className])) {
            $factory = self::$cachedInstantiators[$className];

            return $factory();
        }

        return $this->buildAndCacheFromFactory($className);
    }

    /**
     * Builds the requested object and caches it in static properties for performance
     *
     * @phpstan-param class-string<T> $className
     *
<<<<<<< HEAD
     * @return object
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * @phpstan-return T
     *
     * @template T of object
     */
<<<<<<< HEAD
    private function buildAndCacheFromFactory(string $className)
=======
    private function buildAndCacheFromFactory(string $className): object
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $factory  = self::$cachedInstantiators[$className] = $this->buildFactory($className);
        $instance = $factory();

        if ($this->isSafeToClone(new ReflectionClass($instance))) {
            self::$cachedCloneables[$className] = clone $instance;
        }

        return $instance;
    }

    /**
     * Builds a callable capable of instantiating the given $className without
     * invoking its constructor.
     *
     * @phpstan-param class-string<T> $className
     *
     * @phpstan-return callable(): T
     *
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
     * @throws ReflectionException
     *
     * @template T of object
     */
    private function buildFactory(string $className): callable
    {
        $reflectionClass = $this->getReflectionClass($className);

        if ($this->isInstantiableViaReflection($reflectionClass)) {
            return [$reflectionClass, 'newInstanceWithoutConstructor'];
        }

        $serializedString = sprintf(
            '%s:%d:"%s":0:{}',
            is_subclass_of($className, Serializable::class) ? self::SERIALIZATION_FORMAT_USE_UNSERIALIZER : self::SERIALIZATION_FORMAT_AVOID_UNSERIALIZER,
            strlen($className),
<<<<<<< HEAD
            $className
=======
            $className,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        );

        $this->checkIfUnSerializationIsSupported($reflectionClass, $serializedString);

<<<<<<< HEAD
        return static function () use ($serializedString) {
            return unserialize($serializedString);
        };
=======
        return static fn () => unserialize($serializedString);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @phpstan-param class-string<T> $className
     *
     * @phpstan-return ReflectionClass<T>
     *
     * @throws InvalidArgumentException
     * @throws ReflectionException
     *
     * @template T of object
     */
    private function getReflectionClass(string $className): ReflectionClass
    {
        if (! class_exists($className)) {
            throw InvalidArgumentException::fromNonExistingClass($className);
        }

<<<<<<< HEAD
        if (PHP_VERSION_ID >= 80100 && enum_exists($className, false)) {
=======
        if (enum_exists($className, false)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            throw InvalidArgumentException::fromEnum($className);
        }

        $reflection = new ReflectionClass($className);

        if ($reflection->isAbstract()) {
            throw InvalidArgumentException::fromAbstractClass($reflection);
        }

        return $reflection;
    }

    /**
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @throws UnexpectedValueException
     *
     * @template T of object
     */
    private function checkIfUnSerializationIsSupported(ReflectionClass $reflectionClass, string $serializedString): void
    {
        set_error_handler(static function (int $code, string $message, string $file, int $line) use ($reflectionClass, &$error): bool {
            $error = UnexpectedValueException::fromUncleanUnSerialization(
                $reflectionClass,
                $message,
                $code,
                $file,
<<<<<<< HEAD
                $line
=======
                $line,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            );

            return true;
        });

        try {
            $this->attemptInstantiationViaUnSerialization($reflectionClass, $serializedString);
        } finally {
            restore_error_handler();
        }

        if ($error) {
            throw $error;
        }
    }

    /**
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @throws UnexpectedValueException
     *
     * @template T of object
     */
    private function attemptInstantiationViaUnSerialization(ReflectionClass $reflectionClass, string $serializedString): void
    {
        try {
            unserialize($serializedString);
        } catch (Exception $exception) {
            throw UnexpectedValueException::fromSerializationTriggeredException($reflectionClass, $exception);
        }
    }

    /**
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
     */
    private function isInstantiableViaReflection(ReflectionClass $reflectionClass): bool
    {
        return ! ($this->hasInternalAncestors($reflectionClass) && $reflectionClass->isFinal());
    }

    /**
     * Verifies whether the given class is to be considered internal
     *
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
     */
    private function hasInternalAncestors(ReflectionClass $reflectionClass): bool
    {
        do {
            if ($reflectionClass->isInternal()) {
                return true;
            }

            $reflectionClass = $reflectionClass->getParentClass();
        } while ($reflectionClass);

        return false;
    }

    /**
     * Checks if a class is cloneable
     *
     * Classes implementing `__clone` cannot be safely cloned, as that may cause side-effects.
     *
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
     */
    private function isSafeToClone(ReflectionClass $reflectionClass): bool
    {
        return $reflectionClass->isCloneable()
            && ! $reflectionClass->hasMethod('__clone')
            && ! $reflectionClass->isSubclassOf(ArrayIterator::class);
    }
}
