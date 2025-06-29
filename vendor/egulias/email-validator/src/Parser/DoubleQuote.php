<?php
<<<<<<< HEAD
=======

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
namespace Egulias\EmailValidator\Parser;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\ValidEmail;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Warning\CFWSWithFWS;
use Egulias\EmailValidator\Warning\QuotedString;
use Egulias\EmailValidator\Result\Reason\ExpectingATEXT;
use Egulias\EmailValidator\Result\Reason\UnclosedQuotedString;
use Egulias\EmailValidator\Result\Result;

class DoubleQuote extends PartParser
{
<<<<<<< HEAD
    public function parse() : Result
    {

        $validQuotedString = $this->checkDQUOTE();
        if($validQuotedString->isInvalid()) return $validQuotedString;
=======
    public function parse(): Result
    {

        $validQuotedString = $this->checkDQUOTE();
        if ($validQuotedString->isInvalid()) {
            return $validQuotedString;
        }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        $special = [
            EmailLexer::S_CR => true,
            EmailLexer::S_HTAB => true,
            EmailLexer::S_LF => true
        ];

        $invalid = [
            EmailLexer::C_NUL => true,
            EmailLexer::S_HTAB => true,
            EmailLexer::S_CR => true,
            EmailLexer::S_LF => true
        ];

        $setSpecialsWarning = true;

        $this->lexer->moveNext();

<<<<<<< HEAD
        while (((array) $this->lexer->token)['type'] !== EmailLexer::S_DQUOTE && null !== ((array) $this->lexer->token)['type']) {
            if (isset($special[((array) $this->lexer->token)['type']]) && $setSpecialsWarning) {
                $this->warnings[CFWSWithFWS::CODE] = new CFWSWithFWS();
                $setSpecialsWarning = false;
            }
            if (((array) $this->lexer->token)['type'] === EmailLexer::S_BACKSLASH && $this->lexer->isNextToken(EmailLexer::S_DQUOTE)) {
=======
        while (!$this->lexer->current->isA(EmailLexer::S_DQUOTE) && !$this->lexer->current->isA(EmailLexer::S_EMPTY)) {
            if (isset($special[$this->lexer->current->type]) && $setSpecialsWarning) {
                $this->warnings[CFWSWithFWS::CODE] = new CFWSWithFWS();
                $setSpecialsWarning = false;
            }
            if ($this->lexer->current->isA(EmailLexer::S_BACKSLASH) && $this->lexer->isNextToken(EmailLexer::S_DQUOTE)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                $this->lexer->moveNext();
            }

            $this->lexer->moveNext();

<<<<<<< HEAD
            if (!$this->escaped() && isset($invalid[((array) $this->lexer->token)['type']])) {
                return new InvalidEmail(new ExpectingATEXT("Expecting ATEXT between DQUOTE"), ((array) $this->lexer->token)['value']);
=======
            if (!$this->escaped() && isset($invalid[$this->lexer->current->type])) {
                return new InvalidEmail(new ExpectingATEXT("Expecting ATEXT between DQUOTE"), $this->lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            }
        }

        $prev = $this->lexer->getPrevious();

<<<<<<< HEAD
        if ($prev['type'] === EmailLexer::S_BACKSLASH) {
            $validQuotedString = $this->checkDQUOTE();
            if($validQuotedString->isInvalid()) return $validQuotedString;
        }

        if (!$this->lexer->isNextToken(EmailLexer::S_AT) && $prev['type'] !== EmailLexer::S_BACKSLASH) {
            return new InvalidEmail(new ExpectingATEXT("Expecting ATEXT between DQUOTE"), ((array) $this->lexer->token)['value']);
=======
        if ($prev->isA(EmailLexer::S_BACKSLASH)) {
            $validQuotedString = $this->checkDQUOTE();
            if ($validQuotedString->isInvalid()) {
                return $validQuotedString;
            }
        }

        if (!$this->lexer->isNextToken(EmailLexer::S_AT) && !$prev->isA(EmailLexer::S_BACKSLASH)) {
            return new InvalidEmail(new ExpectingATEXT("Expecting ATEXT between DQUOTE"), $this->lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        return new ValidEmail();
    }

<<<<<<< HEAD
    protected function checkDQUOTE() : Result
    {
        $previous = $this->lexer->getPrevious();

        if ($this->lexer->isNextToken(EmailLexer::GENERIC) && $previous['type'] === EmailLexer::GENERIC) {
            $description = 'https://tools.ietf.org/html/rfc5322#section-3.2.4 - quoted string should be a unit';
            return new InvalidEmail(new ExpectingATEXT($description), ((array) $this->lexer->token)['value']);
=======
    protected function checkDQUOTE(): Result
    {
        $previous = $this->lexer->getPrevious();

        if ($this->lexer->isNextToken(EmailLexer::GENERIC) && $previous->isA(EmailLexer::GENERIC)) {
            $description = 'https://tools.ietf.org/html/rfc5322#section-3.2.4 - quoted string should be a unit';
            return new InvalidEmail(new ExpectingATEXT($description), $this->lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        try {
            $this->lexer->find(EmailLexer::S_DQUOTE);
        } catch (\Exception $e) {
<<<<<<< HEAD
            return new InvalidEmail(new UnclosedQuotedString(), ((array) $this->lexer->token)['value']);
        }
        $this->warnings[QuotedString::CODE] = new QuotedString($previous['value'], ((array) $this->lexer->token)['value']);

        return new ValidEmail();
    }

=======
            return new InvalidEmail(new UnclosedQuotedString(), $this->lexer->current->value);
        }
        $this->warnings[QuotedString::CODE] = new QuotedString($previous->value, $this->lexer->current->value);

        return new ValidEmail();
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
