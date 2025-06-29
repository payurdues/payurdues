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
 * @author Jan Schädlich <jan.schaedlich@sensiolabs.de>
 *
 * @final
 */
class MemcachedCaster
{
    private static array $optionConstants;
    private static array $defaultOptions;

<<<<<<< HEAD
=======
    /**
     * @return array
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public static function castMemcached(\Memcached $c, array $a, Stub $stub, bool $isNested)
    {
        $a += [
            Caster::PREFIX_VIRTUAL.'servers' => $c->getServerList(),
            Caster::PREFIX_VIRTUAL.'options' => new EnumStub(
                self::getNonDefaultOptions($c)
            ),
        ];

        return $a;
    }

    private static function getNonDefaultOptions(\Memcached $c): array
    {
<<<<<<< HEAD
        self::$defaultOptions = self::$defaultOptions ?? self::discoverDefaultOptions();
        self::$optionConstants = self::$optionConstants ?? self::getOptionConstants();
=======
        self::$defaultOptions ??= self::discoverDefaultOptions();
        self::$optionConstants ??= self::getOptionConstants();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        $nonDefaultOptions = [];
        foreach (self::$optionConstants as $constantKey => $value) {
            if (self::$defaultOptions[$constantKey] !== $option = $c->getOption($value)) {
                $nonDefaultOptions[$constantKey] = $option;
            }
        }

        return $nonDefaultOptions;
    }

    private static function discoverDefaultOptions(): array
    {
        $defaultMemcached = new \Memcached();
        $defaultMemcached->addServer('127.0.0.1', 11211);

        $defaultOptions = [];
<<<<<<< HEAD
        self::$optionConstants = self::$optionConstants ?? self::getOptionConstants();
=======
        self::$optionConstants ??= self::getOptionConstants();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        foreach (self::$optionConstants as $constantKey => $value) {
            $defaultOptions[$constantKey] = $defaultMemcached->getOption($value);
        }

        return $defaultOptions;
    }

    private static function getOptionConstants(): array
    {
        $reflectedMemcached = new \ReflectionClass(\Memcached::class);

        $optionConstants = [];
        foreach ($reflectedMemcached->getConstants() as $constantKey => $value) {
            if (str_starts_with($constantKey, 'OPT_')) {
                $optionConstants[$constantKey] = $value;
            }
        }

        return $optionConstants;
    }
}
