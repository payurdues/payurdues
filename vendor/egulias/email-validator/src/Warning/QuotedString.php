<?php

namespace Egulias\EmailValidator\Warning;

class QuotedString extends Warning
{
    public const CODE = 11;

    /**
<<<<<<< HEAD
     * @param scalar $prevToken
     * @param scalar $postToken
=======
     * @param string|int $prevToken
     * @param string|int $postToken
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function __construct($prevToken, $postToken)
    {
        $this->message = "Quoted String found between $prevToken and $postToken";
    }
}
