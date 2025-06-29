<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette;


/**
<<<<<<< HEAD
 * The exception that is thrown when the value of an argument is
 * outside the allowable range of values as defined by the invoked method.
=======
 * The value is outside the allowed range.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class ArgumentOutOfRangeException extends \InvalidArgumentException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when a method call is invalid for the object's
 * current state, method has been invoked at an illegal or inappropriate time.
=======
 * The object is in a state that does not allow the requested operation.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class InvalidStateException extends \RuntimeException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when a requested method or operation is not implemented.
=======
 * The requested feature is not implemented.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class NotImplementedException extends \LogicException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when an invoked method is not supported. For scenarios where
 * it is sometimes possible to perform the requested operation, see InvalidStateException.
=======
 * The requested operation is not supported.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class NotSupportedException extends \LogicException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when a requested method or operation is deprecated.
=======
 * The requested feature is deprecated and no longer available.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class DeprecatedException extends NotSupportedException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when accessing a class member (property or method) fails.
=======
 * Cannot access the requested class property or method.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class MemberAccessException extends \Error
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when an I/O error occurs.
=======
 * Failed to read from or write to a file or stream.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class IOException extends \RuntimeException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when accessing a file that does not exist on disk.
=======
 * The requested file does not exist.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class FileNotFoundException extends IOException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when part of a file or directory cannot be found.
=======
 * The requested directory does not exist.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class DirectoryNotFoundException extends IOException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when an argument does not match with the expected value.
=======
 * The provided argument has invalid type or format.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class InvalidArgumentException extends \InvalidArgumentException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when an illegal index was requested.
=======
 * The requested array or collection index does not exist.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class OutOfRangeException extends \OutOfRangeException
{
}


/**
<<<<<<< HEAD
 * The exception that is thrown when a value (typically returned by function) does not match with the expected value.
=======
 * The returned value has unexpected type or format.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class UnexpectedValueException extends \UnexpectedValueException
{
}
<<<<<<< HEAD
=======


/**
 * Houston, we have a problem.
 */
class ShouldNotHappenException extends \LogicException
{
}
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
