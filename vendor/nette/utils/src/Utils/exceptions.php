<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette\Utils;


/**
<<<<<<< HEAD
 * The exception that is thrown when an image error occurs.
=======
 * An error occurred while working with the image.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class ImageException extends \Exception
{
}


/**
<<<<<<< HEAD
 * The exception that indicates invalid image file.
=======
 * The image file is invalid or in an unsupported format.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class UnknownImageFileException extends ImageException
{
}


/**
<<<<<<< HEAD
 * The exception that indicates error of JSON encoding/decoding.
=======
 * JSON encoding or decoding failed.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class JsonException extends \JsonException
{
}


/**
<<<<<<< HEAD
 * The exception that indicates error of the last Regexp execution.
=======
 * Regular expression pattern or execution failed.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class RegexpException extends \Exception
{
}


/**
<<<<<<< HEAD
 * The exception that indicates assertion error.
=======
 * Type validation failed. The value doesn't match the expected type constraints.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class AssertionException extends \Exception
{
}
