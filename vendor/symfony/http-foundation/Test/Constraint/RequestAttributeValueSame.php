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
use Symfony\Component\HttpFoundation\Request;

final class RequestAttributeValueSame extends Constraint
{
    private string $name;
    private string $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function toString(): string
    {
        return sprintf('has attribute "%s" with value "%s"', $this->name, $this->value);
    }

    /**
     * @param Request $request
<<<<<<< HEAD
     *
     * {@inheritdoc}
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function matches($request): bool
    {
        return $this->value === $request->attributes->get($this->name);
    }

    /**
     * @param Request $request
<<<<<<< HEAD
     *
     * {@inheritdoc}
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function failureDescription($request): string
    {
        return 'the Request '.$this->toString();
    }
}
