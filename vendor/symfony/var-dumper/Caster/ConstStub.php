<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Caster;

use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * Represents a PHP constant and its value.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ConstStub extends Stub
{
<<<<<<< HEAD
    public function __construct(string $name, string|int|float $value = null)
=======
    public function __construct(string $name, string|int|float|null $value = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->class = $name;
        $this->value = 1 < \func_num_args() ? $value : $name;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
