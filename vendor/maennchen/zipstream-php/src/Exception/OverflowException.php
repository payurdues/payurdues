<?php

declare(strict_types=1);

namespace ZipStream\Exception;

use ZipStream\Exception;

/**
 * This Exception gets invoked if a counter value exceeds storage size
 */
class OverflowException extends Exception
{
<<<<<<< HEAD
=======
    /**
     * @internal
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function __construct()
    {
        parent::__construct('File size exceeds limit of 32 bit integer. Please enable "zip64" option.');
    }
}
