<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
namespace Doctrine\Instantiator\Exception;

use Exception;
use ReflectionClass;
use UnexpectedValueException as BaseUnexpectedValueException;

use function sprintf;

/**
 * Exception for given parameters causing invalid/unexpected state on instantiation
 */
class UnexpectedValueException extends BaseUnexpectedValueException implements ExceptionInterface
{
    /**
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
     */
    public static function fromSerializationTriggeredException(
        ReflectionClass $reflectionClass,
<<<<<<< HEAD
        Exception $exception
=======
        Exception $exception,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    ): self {
        return new self(
            sprintf(
                'An exception was raised while trying to instantiate an instance of "%s" via un-serialization',
<<<<<<< HEAD
                $reflectionClass->getName()
            ),
            0,
            $exception
=======
                $reflectionClass->getName(),
            ),
            0,
            $exception,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        );
    }

    /**
     * @phpstan-param ReflectionClass<T> $reflectionClass
     *
     * @template T of object
     */
    public static function fromUncleanUnSerialization(
        ReflectionClass $reflectionClass,
        string $errorString,
        int $errorCode,
        string $errorFile,
<<<<<<< HEAD
        int $errorLine
=======
        int $errorLine,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    ): self {
        return new self(
            sprintf(
                'Could not produce an instance of "%s" via un-serialization, since an error was triggered '
                . 'in file "%s" at line "%d"',
                $reflectionClass->getName(),
                $errorFile,
<<<<<<< HEAD
                $errorLine
            ),
            0,
            new Exception($errorString, $errorCode)
=======
                $errorLine,
            ),
            0,
            new Exception($errorString, $errorCode),
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        );
    }
}
