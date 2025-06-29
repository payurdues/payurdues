<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Completion;

/**
 * Represents a single suggested value.
 *
 * @author Wouter de Jong <wouter@wouterj.nl>
 */
<<<<<<< HEAD
class Suggestion
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
=======
class Suggestion implements \Stringable
{
    public function __construct(
        private readonly string $value,
        private readonly string $description = ''
    ) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    public function getValue(): string
    {
        return $this->value;
    }

<<<<<<< HEAD
=======
    public function getDescription(): string
    {
        return $this->description;
    }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function __toString(): string
    {
        return $this->getValue();
    }
}
