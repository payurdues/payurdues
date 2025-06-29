<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Uid;

/**
 * A v6 UUID is lexicographically sortable and contains a 60-bit timestamp and 62 extra unique bits.
 *
 * Unlike UUIDv1, this implementation of UUIDv6 doesn't leak the MAC address of the host.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
<<<<<<< HEAD
class UuidV6 extends Uuid
=======
class UuidV6 extends Uuid implements TimeBasedUidInterface
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
{
    protected const TYPE = 6;

    private static string $node;

<<<<<<< HEAD
    public function __construct(string $uuid = null)
=======
    public function __construct(?string $uuid = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (null === $uuid) {
            $this->uid = static::generate();
        } else {
            parent::__construct($uuid, true);
        }
    }

    public function getDateTime(): \DateTimeImmutable
    {
        return BinaryUtil::hexToDateTime('0'.substr($this->uid, 0, 8).substr($this->uid, 9, 4).substr($this->uid, 15, 3));
    }

    public function getNode(): string
    {
        return substr($this->uid, 24);
    }

<<<<<<< HEAD
    public static function generate(\DateTimeInterface $time = null, Uuid $node = null): string
=======
    public static function generate(?\DateTimeInterface $time = null, ?Uuid $node = null): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $uuidV1 = UuidV1::generate($time, $node);
        $uuid = substr($uuidV1, 15, 3).substr($uuidV1, 9, 4).$uuidV1[0].'-'.substr($uuidV1, 1, 4).'-6'.substr($uuidV1, 5, 3).substr($uuidV1, 18, 6);

        if ($node) {
            return $uuid.substr($uuidV1, 24);
        }

        // uuid_create() returns a stable "node" that can leak the MAC of the host, but
        // UUIDv6 prefers a truly random number here, let's XOR both to preserve the entropy

        if (!isset(self::$node)) {
            $seed = [random_int(0, 0xFFFFFF), random_int(0, 0xFFFFFF)];
            $node = unpack('N2', hex2bin('00'.substr($uuidV1, 24, 6)).hex2bin('00'.substr($uuidV1, 30)));
            self::$node = sprintf('%06x%06x', ($seed[0] ^ $node[1]) | 0x010000, $seed[1] ^ $node[2]);
        }

        return $uuid.self::$node;
    }
}
