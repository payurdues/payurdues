<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Test\Constraint;

use PHPUnit\Framework\Constraint\Constraint;
use Symfony\Component\HttpFoundation\Response;

final class ResponseIsUnprocessable extends Constraint
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function toString(): string
    {
        return 'is unprocessable';
    }

    /**
     * @param Response $other
<<<<<<< HEAD
     *
     * {@inheritdoc}
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function matches($other): bool
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY === $other->getStatusCode();
    }

    /**
     * @param Response $other
<<<<<<< HEAD
     *
     * {@inheritdoc}
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function failureDescription($other): string
    {
        return 'the Response '.$this->toString();
    }

    /**
     * @param Response $other
<<<<<<< HEAD
     *
     * {@inheritdoc}
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function additionalFailureDescription($other): string
    {
        return (string) $other;
    }
}
