<?php

namespace Egulias\EmailValidator\Parser\CommentStrategy;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Result\ValidEmail;
use Egulias\EmailValidator\Warning\CFWSNearAt;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\ExpectingATEXT;
<<<<<<< HEAD
=======
use Egulias\EmailValidator\Warning\Warning;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

class LocalComment implements CommentStrategy
{
    /**
<<<<<<< HEAD
     * @var array
     */
    private $warnings = [];

    public function exitCondition(EmailLexer $lexer, int $openedParenthesis) : bool
=======
     * @var array<int, Warning>
     */
    private $warnings = [];

    public function exitCondition(EmailLexer $lexer, int $openedParenthesis): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return !$lexer->isNextToken(EmailLexer::S_AT);
    }

<<<<<<< HEAD
    public function endOfLoopValidations(EmailLexer $lexer) : Result
    {
        if (!$lexer->isNextToken(EmailLexer::S_AT)) {
            return new InvalidEmail(new ExpectingATEXT('ATEX is not expected after closing comments'), ((array) $lexer->token)['value']);
=======
    public function endOfLoopValidations(EmailLexer $lexer): Result
    {
        if (!$lexer->isNextToken(EmailLexer::S_AT)) {
            return new InvalidEmail(new ExpectingATEXT('ATEX is not expected after closing comments'), $lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }
        $this->warnings[CFWSNearAt::CODE] = new CFWSNearAt();
        return new ValidEmail();
    }

    public function getWarnings(): array
    {
        return $this->warnings;
    }
}
