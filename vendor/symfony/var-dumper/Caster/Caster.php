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
 * Helper for filtering out properties in casters.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @final
 */
class Caster
{
    public const EXCLUDE_VERBOSE = 1;
    public const EXCLUDE_VIRTUAL = 2;
    public const EXCLUDE_DYNAMIC = 4;
    public const EXCLUDE_PUBLIC = 8;
    public const EXCLUDE_PROTECTED = 16;
    public const EXCLUDE_PRIVATE = 32;
    public const EXCLUDE_NULL = 64;
    public const EXCLUDE_EMPTY = 128;
    public const EXCLUDE_NOT_IMPORTANT = 256;
    public const EXCLUDE_STRICT = 512;
<<<<<<< HEAD
=======
    public const EXCLUDE_UNINITIALIZED = 1024;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public const PREFIX_VIRTUAL = "\0~\0";
    public const PREFIX_DYNAMIC = "\0+\0";
    public const PREFIX_PROTECTED = "\0*\0";
<<<<<<< HEAD
=======
    // usage: sprintf(Caster::PATTERN_PRIVATE, $class, $property)
    public const PATTERN_PRIVATE = "\0%s\0%s";

    private static array $classProperties = [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Casts objects to arrays and adds the dynamic property prefix.
     *
     * @param bool $hasDebugInfo Whether the __debugInfo method exists on $obj or not
     */
<<<<<<< HEAD
    public static function castObject(object $obj, string $class, bool $hasDebugInfo = false, string $debugClass = null): array
=======
    public static function castObject(object $obj, string $class, bool $hasDebugInfo = false, ?string $debugClass = null): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if ($hasDebugInfo) {
            try {
                $debugInfo = $obj->__debugInfo();
<<<<<<< HEAD
            } catch (\Throwable $e) {
=======
            } catch (\Throwable) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                // ignore failing __debugInfo()
                $hasDebugInfo = false;
            }
        }

        $a = $obj instanceof \Closure ? [] : (array) $obj;

        if ($obj instanceof \__PHP_Incomplete_Class) {
            return $a;
        }

<<<<<<< HEAD
        if ($a) {
            static $publicProperties = [];
            $debugClass = $debugClass ?? get_debug_type($obj);
=======
        $classProperties = self::$classProperties[$class] ??= self::getClassProperties(new \ReflectionClass($class));
        $a = array_replace($classProperties, $a);

        if ($a) {
            $debugClass ??= get_debug_type($obj);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

            $i = 0;
            $prefixedKeys = [];
            foreach ($a as $k => $v) {
                if ("\0" !== ($k[0] ?? '')) {
<<<<<<< HEAD
                    if (!isset($publicProperties[$class])) {
                        foreach ((new \ReflectionClass($class))->getProperties(\ReflectionProperty::IS_PUBLIC) as $prop) {
                            $publicProperties[$class][$prop->name] = true;
                        }
                    }
                    if (!isset($publicProperties[$class][$k])) {
=======
                    if (!isset($classProperties[$k])) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                        $prefixedKeys[$i] = self::PREFIX_DYNAMIC.$k;
                    }
                } elseif ($debugClass !== $class && 1 === strpos($k, $class)) {
                    $prefixedKeys[$i] = "\0".$debugClass.strrchr($k, "\0");
                }
                ++$i;
            }
            if ($prefixedKeys) {
                $keys = array_keys($a);
                foreach ($prefixedKeys as $i => $k) {
                    $keys[$i] = $k;
                }
                $a = array_combine($keys, $a);
            }
        }

        if ($hasDebugInfo && \is_array($debugInfo)) {
            foreach ($debugInfo as $k => $v) {
                if (!isset($k[0]) || "\0" !== $k[0]) {
                    if (\array_key_exists(self::PREFIX_DYNAMIC.$k, $a)) {
                        continue;
                    }
                    $k = self::PREFIX_VIRTUAL.$k;
                }

                unset($a[$k]);
                $a[$k] = $v;
            }
        }

        return $a;
    }

    /**
     * Filters out the specified properties.
     *
     * By default, a single match in the $filter bit field filters properties out, following an "or" logic.
     * When EXCLUDE_STRICT is set, an "and" logic is applied: all bits must match for a property to be removed.
     *
     * @param array    $a                The array containing the properties to filter
     * @param int      $filter           A bit field of Caster::EXCLUDE_* constants specifying which properties to filter out
     * @param string[] $listedProperties List of properties to exclude when Caster::EXCLUDE_VERBOSE is set, and to preserve when Caster::EXCLUDE_NOT_IMPORTANT is set
<<<<<<< HEAD
     * @param int      &$count           Set to the number of removed properties
=======
     * @param int|null &$count           Set to the number of removed properties
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public static function filter(array $a, int $filter, array $listedProperties = [], ?int &$count = 0): array
    {
        $count = 0;

        foreach ($a as $k => $v) {
            $type = self::EXCLUDE_STRICT & $filter;

            if (null === $v) {
                $type |= self::EXCLUDE_NULL & $filter;
                $type |= self::EXCLUDE_EMPTY & $filter;
            } elseif (false === $v || '' === $v || '0' === $v || 0 === $v || 0.0 === $v || [] === $v) {
                $type |= self::EXCLUDE_EMPTY & $filter;
<<<<<<< HEAD
=======
            } elseif ($v instanceof UninitializedStub) {
                $type |= self::EXCLUDE_UNINITIALIZED & $filter;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            }
            if ((self::EXCLUDE_NOT_IMPORTANT & $filter) && !\in_array($k, $listedProperties, true)) {
                $type |= self::EXCLUDE_NOT_IMPORTANT;
            }
            if ((self::EXCLUDE_VERBOSE & $filter) && \in_array($k, $listedProperties, true)) {
                $type |= self::EXCLUDE_VERBOSE;
            }

            if (!isset($k[1]) || "\0" !== $k[0]) {
                $type |= self::EXCLUDE_PUBLIC & $filter;
            } elseif ('~' === $k[1]) {
                $type |= self::EXCLUDE_VIRTUAL & $filter;
            } elseif ('+' === $k[1]) {
                $type |= self::EXCLUDE_DYNAMIC & $filter;
            } elseif ('*' === $k[1]) {
                $type |= self::EXCLUDE_PROTECTED & $filter;
            } else {
                $type |= self::EXCLUDE_PRIVATE & $filter;
            }

            if ((self::EXCLUDE_STRICT & $filter) ? $type === $filter : $type) {
                unset($a[$k]);
                ++$count;
            }
        }

        return $a;
    }

    public static function castPhpIncompleteClass(\__PHP_Incomplete_Class $c, array $a, Stub $stub, bool $isNested): array
    {
        if (isset($a['__PHP_Incomplete_Class_Name'])) {
            $stub->class .= '('.$a['__PHP_Incomplete_Class_Name'].')';
            unset($a['__PHP_Incomplete_Class_Name']);
        }

        return $a;
    }
<<<<<<< HEAD
=======

    private static function getClassProperties(\ReflectionClass $class): array
    {
        $classProperties = [];
        $className = $class->name;

        if ($parent = $class->getParentClass()) {
            $classProperties += self::$classProperties[$parent->name] ??= self::getClassProperties($parent);
        }

        foreach ($class->getProperties() as $p) {
            if ($p->isStatic()) {
                continue;
            }

            $classProperties[match (true) {
                $p->isPublic() => $p->name,
                $p->isProtected() => self::PREFIX_PROTECTED.$p->name,
                default => "\0".$className."\0".$p->name,
            }] = new UninitializedStub($p);
        }

        return $classProperties;
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
