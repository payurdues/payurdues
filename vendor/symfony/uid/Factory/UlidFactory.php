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

use Symfony\Component\Uid\Ulid;

class UlidFactory
{
<<<<<<< HEAD
    public function create(\DateTimeInterface $time = null): Ulid
=======
    public function create(?\DateTimeInterface $time = null): Ulid
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return new Ulid(null === $time ? null : Ulid::generate($time));
    }
}
