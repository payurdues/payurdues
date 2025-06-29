<?php

namespace Egulias\EmailValidator\Result;

use Egulias\EmailValidator\Result\Reason\Reason;

class InvalidEmail implements Result
{
<<<<<<< HEAD
    private $token;
    /**
     * @var Reason
     */
    protected $reason;
=======
    /**
     * @var string
     */
    private string $token;

    /**
     * @var Reason
     */
    protected Reason $reason;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(Reason $reason, string $token)
    {
        $this->token = $token;
        $this->reason = $reason;
    }

    public function isValid(): bool
    {
        return false;
    }

    public function isInvalid(): bool
    {
        return true;
    }

    public function description(): string
    {
        return $this->reason->description() . " in char " . $this->token;
    }

    public function code(): int
    {
        return $this->reason->code();
    }

<<<<<<< HEAD
    public function reason() : Reason
    {
        return $this->reason;
    }

=======
    public function reason(): Reason
    {
        return $this->reason;
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
