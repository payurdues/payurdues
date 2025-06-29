<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
namespace Carbon\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;

interface CarbonDoctrineType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform);

<<<<<<< HEAD
    public function convertToPHPValue($value, AbstractPlatform $platform);
=======
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function convertToDatabaseValue($value, AbstractPlatform $platform);
}
