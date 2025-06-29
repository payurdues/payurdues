<?php

namespace Egulias\EmailValidator\Parser;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Warning\QuotedPart;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Parser\CommentStrategy\CommentStrategy;
use Egulias\EmailValidator\Result\Reason\UnclosedComment;
use Egulias\EmailValidator\Result\Reason\UnOpenedComment;
use Egulias\EmailValidator\Warning\Comment as WarningComment;

class Comment extends PartParser
{
    /**
     * @var int
     */
    private $openedParenthesis = 0;

    /**
     * @var CommentStrategy
     */
    private $commentStrategy;

    public function __construct(EmailLexer $lexer, CommentStrategy $commentStrategy)
    {
        $this->lexer = $lexer;
        $this->commentStrategy = $commentStrategy;
    }

<<<<<<< HEAD
    public function parse() : Result
    {
        if (((array) $this->lexer->token)['type'] === EmailLexer::S_OPENPARENTHESIS) {
            $this->openedParenthesis++;
            if($this->noClosingParenthesis()) {
                return new InvalidEmail(new UnclosedComment(), ((array) $this->lexer->token)['value']);
            }
        }

        if (((array) $this->lexer->token)['type'] === EmailLexer::S_CLOSEPARENTHESIS) {
            return new InvalidEmail(new UnOpenedComment(), ((array) $this->lexer->token)['value']);
=======
    public function parse(): Result
    {
        if ($this->lexer->current->isA(EmailLexer::S_OPENPARENTHESIS)) {
            $this->openedParenthesis++;
            if ($this->noClosingParenthesis()) {
                return new InvalidEmail(new UnclosedComment(), $this->lexer->current->value);
            }
        }

        if ($this->lexer->current->isA(EmailLexer::S_CLOSEPARENTHESIS)) {
            return new InvalidEmail(new UnOpenedComment(), $this->lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $this->warnings[WarningComment::CODE] = new WarningComment();

        $moreTokens = true;
<<<<<<< HEAD
        while ($this->commentStrategy->exitCondition($this->lexer, $this->openedParenthesis) && $moreTokens){
=======
        while ($this->commentStrategy->exitCondition($this->lexer, $this->openedParenthesis) && $moreTokens) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

            if ($this->lexer->isNextToken(EmailLexer::S_OPENPARENTHESIS)) {
                $this->openedParenthesis++;
            }
            $this->warnEscaping();
<<<<<<< HEAD
            if($this->lexer->isNextToken(EmailLexer::S_CLOSEPARENTHESIS)) {
=======
            if ($this->lexer->isNextToken(EmailLexer::S_CLOSEPARENTHESIS)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                $this->openedParenthesis--;
            }
            $moreTokens = $this->lexer->moveNext();
        }

<<<<<<< HEAD
        if($this->openedParenthesis >= 1) {
            return new InvalidEmail(new UnclosedComment(), ((array) $this->lexer->token)['value']);
        }
        if ($this->openedParenthesis < 0) {
            return new InvalidEmail(new UnOpenedComment(), ((array) $this->lexer->token)['value']);
=======
        if ($this->openedParenthesis >= 1) {
            return new InvalidEmail(new UnclosedComment(), $this->lexer->current->value);
        }
        if ($this->openedParenthesis < 0) {
            return new InvalidEmail(new UnOpenedComment(), $this->lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $finalValidations = $this->commentStrategy->endOfLoopValidations($this->lexer);

<<<<<<< HEAD
        $this->warnings = array_merge($this->warnings, $this->commentStrategy->getWarnings());
=======
        $this->warnings = [...$this->warnings, ...$this->commentStrategy->getWarnings()];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        return $finalValidations;
    }


    /**
<<<<<<< HEAD
     * @return bool
     */
    private function warnEscaping() : bool
    {
        //Backslash found
        if (((array) $this->lexer->token)['type'] !== EmailLexer::S_BACKSLASH) {
            return false;
        }

        if (!$this->lexer->isNextTokenAny(array(EmailLexer::S_SP, EmailLexer::S_HTAB, EmailLexer::C_DEL))) {
            return false;
        }

        $this->warnings[QuotedPart::CODE] =
            new QuotedPart($this->lexer->getPrevious()['type'], ((array) $this->lexer->token)['type']);
        return true;

    }

    private function noClosingParenthesis() : bool
=======
     * @return void
     */
    private function warnEscaping(): void
    {
        //Backslash found
        if (!$this->lexer->current->isA(EmailLexer::S_BACKSLASH)) {
            return;
        }

        if (!$this->lexer->isNextTokenAny(array(EmailLexer::S_SP, EmailLexer::S_HTAB, EmailLexer::C_DEL))) {
            return;
        }

        $this->warnings[QuotedPart::CODE] =
            new QuotedPart($this->lexer->getPrevious()->type, $this->lexer->current->type);
    }

    private function noClosingParenthesis(): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        try {
            $this->lexer->find(EmailLexer::S_CLOSEPARENTHESIS);
            return false;
        } catch (\RuntimeException $e) {
            return true;
        }
    }
}
