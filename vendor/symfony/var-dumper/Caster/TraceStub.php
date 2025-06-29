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
 * Represents a backtrace as returned by debug_backtrace() or Exception->getTrace().
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class TraceStub extends Stub
{
    public $keepArgs;
    public $sliceOffset;
    public $sliceLength;
    public $numberingOffset;

<<<<<<< HEAD
    public function __construct(array $trace, bool $keepArgs = true, int $sliceOffset = 0, int $sliceLength = null, int $numberingOffset = 0)
=======
    public function __construct(array $trace, bool $keepArgs = true, int $sliceOffset = 0, ?int $sliceLength = null, int $numberingOffset = 0)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->value = $trace;
        $this->keepArgs = $keepArgs;
        $this->sliceOffset = $sliceOffset;
        $this->sliceLength = $sliceLength;
        $this->numberingOffset = $numberingOffset;
    }
}
