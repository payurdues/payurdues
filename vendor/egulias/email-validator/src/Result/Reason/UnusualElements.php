<?php

namespace Egulias\EmailValidator\Result\Reason;

class UnusualElements implements Reason
{
    /**
     * @var string $element
     */
<<<<<<< HEAD
    private $element = '';
=======
    private $element;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(string $element)
    {
        $this->element = $element;
    }

    public function code() : int
    {
        return 201;
    }

    public function description() : string
    {
        return 'Unusual element found, wourld render invalid in majority of cases. Element found: ' . $this->element;
    }
}
