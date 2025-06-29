<?php

namespace Egulias\EmailValidator\Parser;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\ConsecutiveDot;
use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Result\ValidEmail;
<<<<<<< HEAD
=======
use Egulias\EmailValidator\Warning\Warning;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

abstract class PartParser
{
    /**
<<<<<<< HEAD
     * @var array
=======
     * @var Warning[]
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected $warnings = [];

    /**
     * @var EmailLexer
     */
    protected $lexer;

    public function __construct(EmailLexer $lexer)
    {
        $this->lexer = $lexer;
    }

<<<<<<< HEAD
    abstract public function parse() : Result;

    /**
     * @return \Egulias\EmailValidator\Warning\Warning[]
=======
    abstract public function parse(): Result;

    /**
     * @return Warning[]
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

<<<<<<< HEAD
    protected function parseFWS() : Result
    {
        $foldingWS = new FoldingWhiteSpace($this->lexer);
        $resultFWS = $foldingWS->parse();
        $this->warnings = array_merge($this->warnings, $foldingWS->getWarnings());
        return $resultFWS;
    }

    protected function checkConsecutiveDots() : Result
    {
        if (((array) $this->lexer->token)['type'] === EmailLexer::S_DOT && $this->lexer->isNextToken(EmailLexer::S_DOT)) {
            return new InvalidEmail(new ConsecutiveDot(), ((array) $this->lexer->token)['value']);
=======
    protected function parseFWS(): Result
    {
        $foldingWS = new FoldingWhiteSpace($this->lexer);
        $resultFWS = $foldingWS->parse();
        $this->warnings = [...$this->warnings, ...$foldingWS->getWarnings()];
        return $resultFWS;
    }

    protected function checkConsecutiveDots(): Result
    {
        if ($this->lexer->current->isA(EmailLexer::S_DOT) && $this->lexer->isNextToken(EmailLexer::S_DOT)) {
            return new InvalidEmail(new ConsecutiveDot(), $this->lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        return new ValidEmail();
    }

<<<<<<< HEAD
    protected function escaped() : bool
    {
        $previous = $this->lexer->getPrevious();

        return $previous && $previous['type'] === EmailLexer::S_BACKSLASH
            &&
            ((array) $this->lexer->token)['type'] !== EmailLexer::GENERIC;
=======
    protected function escaped(): bool
    {
        $previous = $this->lexer->getPrevious();

        return $previous->isA(EmailLexer::S_BACKSLASH)
            && !$this->lexer->current->isA(EmailLexer::GENERIC);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
