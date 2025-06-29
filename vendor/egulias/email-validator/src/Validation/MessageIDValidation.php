<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\MessageIDParser;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\ExceptionFound;
<<<<<<< HEAD
=======
use Egulias\EmailValidator\Warning\Warning;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

class MessageIDValidation implements EmailValidation
{

    /**
<<<<<<< HEAD
     * @var array
=======
     * @var Warning[]
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    private $warnings = [];

    /**
     * @var ?InvalidEmail
     */
    private $error;

    public function isValid(string $email, EmailLexer $emailLexer): bool
    {
        $parser = new MessageIDParser($emailLexer);
        try {
            $result = $parser->parse($email);
            $this->warnings = $parser->getWarnings();
            if ($result->isInvalid()) {
                /** @psalm-suppress PropertyTypeCoercion */
                $this->error = $result;
                return false;
            }
        } catch (\Exception $invalid) {
            $this->error = new InvalidEmail(new ExceptionFound($invalid), '');
            return false;
        }

        return true;
    }

<<<<<<< HEAD
=======
    /**
     * @return Warning[]
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    public function getError(): ?InvalidEmail
    {
        return $this->error;
    }
}
