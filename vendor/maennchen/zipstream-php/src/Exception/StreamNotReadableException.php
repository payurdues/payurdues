<?php

declare(strict_types=1);

namespace ZipStream\Exception;

use ZipStream\Exception;

/**
<<<<<<< HEAD
 * This Exception gets invoked if `fread` fails on a stream.
=======
 * This Exception gets invoked if a stream can't be read.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class StreamNotReadableException extends Exception
{
    /**
<<<<<<< HEAD
     * Constructor of the Exception
     *
     * @param string $fileName - The name of the file which the stream belongs to.
     */
    public function __construct(string $fileName)
    {
        parent::__construct("The stream for $fileName could not be read.");
=======
     * @internal
     */
    public function __construct()
    {
        parent::__construct('The stream could not be read.');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
