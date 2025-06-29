<?php

namespace Egulias\EmailValidator\Parser\CommentStrategy;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\Result;
<<<<<<< HEAD
=======
use Egulias\EmailValidator\Warning\Warning;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

interface CommentStrategy
{
    /**
     * Return "true" to continue, "false" to exit
     */
<<<<<<< HEAD
    public function exitCondition(EmailLexer $lexer, int $openedParenthesis) : bool;

    public function endOfLoopValidations(EmailLexer $lexer) : Result;

    public function getWarnings() : array;
=======
    public function exitCondition(EmailLexer $lexer, int $openedParenthesis): bool;

    public function endOfLoopValidations(EmailLexer $lexer): Result;

    /**
     * @return Warning[]
     */
    public function getWarnings(): array;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
