<?php

namespace Egulias\EmailValidator\Warning;

abstract class Warning
{
<<<<<<< HEAD
=======
    /**
     * @var int CODE
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public const CODE = 0;

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var int
     */
    protected $rfcNumber = 0;

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function code()
    {
        return self::CODE;
    }

    /**
     * @return int
     */
    public function RFCNumber()
    {
        return $this->rfcNumber;
    }

<<<<<<< HEAD
    public function __toString()
=======
    /**
     * @return string
     */
    public function __toString(): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->message() . " rfc: " .  $this->rfcNumber . "internal code: " . static::CODE;
    }
}
