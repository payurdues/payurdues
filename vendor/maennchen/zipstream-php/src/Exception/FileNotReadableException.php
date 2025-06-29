<?php

declare(strict_types=1);

namespace ZipStream\Exception;

use ZipStream\Exception;

/**
 * This Exception gets invoked if a file wasn't found
 */
class FileNotReadableException extends Exception
{
    /**
<<<<<<< HEAD
     * Constructor of the Exception
     *
     * @param String $path - The path which wasn't found
     */
    public function __construct(string $path)
    {
=======
     * @internal
     */
    public function __construct(
        public readonly string $path
    ) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        parent::__construct("The file with the path $path isn't readable.");
    }
}
