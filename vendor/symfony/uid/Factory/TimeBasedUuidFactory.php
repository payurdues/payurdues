<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Uid\Factory;

<<<<<<< HEAD
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV1;
use Symfony\Component\Uid\UuidV6;

class TimeBasedUuidFactory
{
    private string $class;
    private $node;

    public function __construct(string $class, Uuid $node = null)
=======
use Symfony\Component\Uid\TimeBasedUidInterface;
use Symfony\Component\Uid\Uuid;

class TimeBasedUuidFactory
{
    /**
     * @var class-string<Uuid&TimeBasedUidInterface>
     */
    private string $class;
    private ?Uuid $node;

    /**
     * @param class-string<Uuid&TimeBasedUidInterface> $class
     */
    public function __construct(string $class, ?Uuid $node = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->class = $class;
        $this->node = $node;
    }

<<<<<<< HEAD
    public function create(\DateTimeInterface $time = null): UuidV6|UuidV1
=======
    public function create(?\DateTimeInterface $time = null): Uuid&TimeBasedUidInterface
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $class = $this->class;

        if (null === $time && null === $this->node) {
            return new $class();
        }

        return new $class($class::generate($time, $this->node));
    }
}
