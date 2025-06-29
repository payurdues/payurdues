<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

use Symfony\Component\VarDumper\Caster\CutStub;
use Symfony\Component\VarDumper\Caster\ReflectionCaster;
<<<<<<< HEAD
=======
use Symfony\Component\VarDumper\Cloner\ClonerInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\Cloner\Stub;
use Symfony\Component\VarDumper\Cloner\VarCloner;

/**
 * DataCollector.
 *
 * Children of this class must store the collected data in the data property.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bernhard Schussek <bschussek@symfony.com>
 */
abstract class DataCollector implements DataCollectorInterface
{
    /**
     * @var array|Data
     */
    protected $data = [];

<<<<<<< HEAD
    private $cloner;
=======
    private ClonerInterface $cloner;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Converts the variable into a serializable Data instance.
     *
     * This array can be displayed in the template using
     * the VarDumper component.
     */
    protected function cloneVar(mixed $var): Data
    {
        if ($var instanceof Data) {
            return $var;
        }
        if (!isset($this->cloner)) {
            $this->cloner = new VarCloner();
            $this->cloner->setMaxItems(-1);
            $this->cloner->addCasters($this->getCasters());
        }

        return $this->cloner->cloneVar($var);
    }

    /**
     * @return callable[] The casters to add to the cloner
     */
    protected function getCasters()
    {
        $casters = [
            '*' => function ($v, array $a, Stub $s, $isNested) {
                if (!$v instanceof Stub) {
<<<<<<< HEAD
                    foreach ($a as $k => $v) {
                        if (\is_object($v) && !$v instanceof \DateTimeInterface && !$v instanceof Stub) {
                            $a[$k] = new CutStub($v);
=======
                    $b = $a;
                    foreach ($a as $k => $v) {
                        if (!\is_object($v) || $v instanceof \DateTimeInterface || $v instanceof Stub) {
                            continue;
                        }

                        try {
                            $a[$k] = $s = new CutStub($v);

                            if ($b[$k] === $s) {
                                // we've hit a non-typed reference
                                $a[$k] = $v;
                            }
                        } catch (\TypeError $e) {
                            // we've hit a typed reference
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                        }
                    }
                }

                return $a;
            },
        ] + ReflectionCaster::UNSET_CLOSURE_FILE_INFO;

        return $casters;
    }

    public function __sleep(): array
    {
        return ['data'];
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function __wakeup()
    {
    }

    /**
     * @internal to prevent implementing \Serializable
     */
<<<<<<< HEAD
    final protected function serialize()
=======
    final protected function serialize(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
    }

    /**
     * @internal to prevent implementing \Serializable
     */
<<<<<<< HEAD
    final protected function unserialize(string $data)
    {
    }
=======
    final protected function unserialize(string $data): void
    {
    }

    /**
     * @return void
     */
    public function reset()
    {
        $this->data = [];
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
