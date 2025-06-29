<?php

namespace Egulias\EmailValidator\Result;

interface Result
{
    /**
     * Is validation result valid?
<<<<<<< HEAD
     */
    public function isValid() : bool;
=======
     * 
     */
    public function isValid(): bool;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Is validation result invalid?
     * Usually the inverse of isValid()
<<<<<<< HEAD
     */
    public function isInvalid() : bool;

    /**
     * Short description of the result, human readable.
     */
    public function description() : string;

    /**
     * Code for user land to act upon.
     */
    public function code() : int;
=======
     * 
     */
    public function isInvalid(): bool;

    /**
     * Short description of the result, human readable.
     * 
     */
    public function description(): string;

    /**
     * Code for user land to act upon.
     * 
     */
    public function code(): int;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
