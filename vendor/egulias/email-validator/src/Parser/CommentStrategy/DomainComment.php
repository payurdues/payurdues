<?php

namespace Egulias\EmailValidator\Parser\CommentStrategy;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Result\ValidEmail;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\ExpectingATEXT;

class DomainComment implements CommentStrategy
{
<<<<<<< HEAD
    public function exitCondition(EmailLexer $lexer, int $openedParenthesis) : bool
    {
        if (($openedParenthesis === 0 && $lexer->isNextToken(EmailLexer::S_DOT))){ // || !$internalLexer->moveNext()) {
            return false;
        }

        return true;
    }

    public function endOfLoopValidations(EmailLexer $lexer) : Result
    {
        //test for end of string
        if (!$lexer->isNextToken(EmailLexer::S_DOT)) {
            return new InvalidEmail(new ExpectingATEXT('DOT not found near CLOSEPARENTHESIS'), ((array) $lexer->token)['value']);
=======
    public function exitCondition(EmailLexer $lexer, int $openedParenthesis): bool
    {
        return !($openedParenthesis === 0 && $lexer->isNextToken(EmailLexer::S_DOT));
    }

    public function endOfLoopValidations(EmailLexer $lexer): Result
    {
        //test for end of string
        if (!$lexer->isNextToken(EmailLexer::S_DOT)) {
            return new InvalidEmail(new ExpectingATEXT('DOT not found near CLOSEPARENTHESIS'), $lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }
        //add warning
        //Address is valid within the message but cannot be used unmodified for the envelope
        return new ValidEmail();
    }

    public function getWarnings(): array
    {
        return [];
    }
}
