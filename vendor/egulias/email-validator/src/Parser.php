<?php

namespace Egulias\EmailValidator;

use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Result\ValidEmail;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\ExpectingATEXT;

abstract class Parser
{
    /**
     * @var Warning\Warning[]
     */
    protected $warnings = [];

    /**
     * @var EmailLexer
     */
    protected $lexer;

    /**
     * id-left "@" id-right
     */
<<<<<<< HEAD
    abstract protected function parseRightFromAt() : Result;
    abstract protected function parseLeftFromAt() : Result;
    abstract protected function preLeftParsing() : Result;
=======
    abstract protected function parseRightFromAt(): Result;
    abstract protected function parseLeftFromAt(): Result;
    abstract protected function preLeftParsing(): Result;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5


    public function __construct(EmailLexer $lexer)
    {
        $this->lexer = $lexer;
    }

<<<<<<< HEAD
    public function parse(string $str) : Result
=======
    public function parse(string $str): Result
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->lexer->setInput($str);

        if ($this->lexer->hasInvalidTokens()) {
<<<<<<< HEAD
            return new InvalidEmail(new ExpectingATEXT("Invalid tokens found"), $this->lexer->token["value"]);
=======
            return new InvalidEmail(new ExpectingATEXT("Invalid tokens found"), $this->lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $preParsingResult = $this->preLeftParsing();
        if ($preParsingResult->isInvalid()) {
            return $preParsingResult;
        }

        $localPartResult = $this->parseLeftFromAt();

        if ($localPartResult->isInvalid()) {
            return $localPartResult;
        }

        $domainPartResult = $this->parseRightFromAt();

        if ($domainPartResult->isInvalid()) {
            return $domainPartResult;
        }

        return new ValidEmail();
    }

    /**
     * @return Warning\Warning[]
     */
<<<<<<< HEAD
    public function getWarnings() : array
=======
    public function getWarnings(): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->warnings;
    }

<<<<<<< HEAD
    protected function hasAtToken() : bool
=======
    protected function hasAtToken(): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->lexer->moveNext();
        $this->lexer->moveNext();

<<<<<<< HEAD
        return ((array) $this->lexer->token)['type'] !== EmailLexer::S_AT;
=======
        return !$this->lexer->current->isA(EmailLexer::S_AT);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
