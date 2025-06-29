<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\EmailParser;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\ExceptionFound;
<<<<<<< HEAD
=======
use Egulias\EmailValidator\Warning\Warning;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

class RFCValidation implements EmailValidation
{
    /**
<<<<<<< HEAD
     * @var EmailParser|null
     */
    private $parser;

    /**
     * @var array
     */
    private $warnings = [];
=======
     * @var Warning[]
     */
    private array $warnings = [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * @var ?InvalidEmail
     */
    private $error;

<<<<<<< HEAD
    public function isValid(string $email, EmailLexer $emailLexer) : bool
    {
        $this->parser = new EmailParser($emailLexer);
        try {
            $result = $this->parser->parse($email);
            $this->warnings = $this->parser->getWarnings();
=======
    public function isValid(string $email, EmailLexer $emailLexer): bool
    {
        $parser = new EmailParser($emailLexer);
        try {
            $result = $parser->parse($email);
            $this->warnings = $parser->getWarnings();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
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
    public function getError() : ?InvalidEmail
=======
    public function getError(): ?InvalidEmail
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->error;
    }

<<<<<<< HEAD
    public function getWarnings() : array
=======
    /**
     * @return Warning[]
     */
    public function getWarnings(): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->warnings;
    }
}
