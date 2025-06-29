<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
namespace Doctrine\Instantiator;

use Doctrine\Instantiator\Exception\ExceptionInterface;

/**
 * Instantiator provides utility methods to build objects without invoking their constructors
 */
interface InstantiatorInterface
{
    /**
<<<<<<< HEAD
     * @param string $className
     * @phpstan-param class-string<T> $className
     *
     * @return object
=======
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
    public function instantiate($className);
=======
    public function instantiate(string $className): object;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
