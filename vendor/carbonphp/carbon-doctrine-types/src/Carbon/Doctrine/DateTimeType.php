<?php

<<<<<<< HEAD
namespace Carbon\Doctrine;

use Carbon\Carbon;
=======
declare(strict_types=1);

namespace Carbon\Doctrine;

use Carbon\Carbon;
use DateTime;
use Doctrine\DBAL\Platforms\AbstractPlatform;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Doctrine\DBAL\Types\VarDateTimeType;

class DateTimeType extends VarDateTimeType implements CarbonDoctrineType
{
    /** @use CarbonTypeConverter<Carbon> */
    use CarbonTypeConverter;
<<<<<<< HEAD
=======

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): ?Carbon
    {
        return $this->doConvertToPHPValue($value);
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
