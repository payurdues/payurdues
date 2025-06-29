<?php

namespace Egulias\EmailValidator\Warning;

<<<<<<< HEAD
=======
use UnitEnum;

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
class QuotedPart extends Warning
{
    public const CODE = 36;

    /**
<<<<<<< HEAD
     * @param scalar $prevToken
     * @param scalar $postToken
     */
    public function __construct($prevToken, $postToken)
    {
=======
     * @param UnitEnum|string|int|null $prevToken
     * @param UnitEnum|string|int|null $postToken
     */
    public function __construct($prevToken, $postToken)
    {
        if ($prevToken instanceof UnitEnum) {
            $prevToken = $prevToken->name;
        }

        if ($postToken instanceof UnitEnum) {
            $postToken = $postToken->name;
        }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        $this->message = "Deprecated Quoted String found between $prevToken and $postToken";
    }
}
