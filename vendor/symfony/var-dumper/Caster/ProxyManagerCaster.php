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

use ProxyManager\Proxy\ProxyInterface;
use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @final
 */
class ProxyManagerCaster
{
<<<<<<< HEAD
=======
    /**
     * @return array
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public static function castProxy(ProxyInterface $c, array $a, Stub $stub, bool $isNested)
    {
        if ($parent = get_parent_class($c)) {
            $stub->class .= ' - '.$parent;
        }
        $stub->class .= '@proxy';

        return $a;
    }
}
