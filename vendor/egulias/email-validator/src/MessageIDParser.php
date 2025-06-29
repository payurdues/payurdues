<?php

namespace Egulias\EmailValidator;

use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Parser\IDLeftPart;
use Egulias\EmailValidator\Parser\IDRightPart;
use Egulias\EmailValidator\Result\ValidEmail;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Warning\EmailTooLong;
use Egulias\EmailValidator\Result\Reason\NoLocalPart;

class MessageIDParser extends Parser
{

    public const EMAILID_MAX_LENGTH = 254;

    /**
     * @var string
     */
    protected $idLeft = '';

    /**
     * @var string
     */
    protected $idRight = '';

<<<<<<< HEAD
    public function parse(string $str) : Result
=======
    public function parse(string $str): Result
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $result = parent::parse($str);

        $this->addLongEmailWarning($this->idLeft, $this->idRight);

        return $result;
    }
<<<<<<< HEAD
    
    protected function preLeftParsing(): Result
    {
        if (!$this->hasAtToken()) {
            return new InvalidEmail(new NoLocalPart(), $this->lexer->token["value"]);
=======

    protected function preLeftParsing(): Result
    {
        if (!$this->hasAtToken()) {
            return new InvalidEmail(new NoLocalPart(), $this->lexer->current->value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }
        return new ValidEmail();
    }

    protected function parseLeftFromAt(): Result
    {
        return $this->processIDLeft();
    }

    protected function parseRightFromAt(): Result
    {
        return $this->processIDRight();
    }

<<<<<<< HEAD
    private function processIDLeft() : Result
=======
    private function processIDLeft(): Result
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $localPartParser = new IDLeftPart($this->lexer);
        $localPartResult = $localPartParser->parse();
        $this->idLeft = $localPartParser->localPart();
<<<<<<< HEAD
        $this->warnings = array_merge($localPartParser->getWarnings(), $this->warnings);
=======
        $this->warnings = [...$localPartParser->getWarnings(), ...$this->warnings];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        return $localPartResult;
    }

<<<<<<< HEAD
    private function processIDRight() : Result
=======
    private function processIDRight(): Result
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $domainPartParser = new IDRightPart($this->lexer);
        $domainPartResult = $domainPartParser->parse();
        $this->idRight = $domainPartParser->domainPart();
<<<<<<< HEAD
        $this->warnings = array_merge($domainPartParser->getWarnings(), $this->warnings);
        
        return $domainPartResult;
    }

    public function getLeftPart() : string
=======
        $this->warnings = [...$domainPartParser->getWarnings(), ...$this->warnings];

        return $domainPartResult;
    }

    public function getLeftPart(): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->idLeft;
    }

<<<<<<< HEAD
    public function getRightPart() : string
=======
    public function getRightPart(): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->idRight;
    }

<<<<<<< HEAD
    private function addLongEmailWarning(string $localPart, string $parsedDomainPart) : void
=======
    private function addLongEmailWarning(string $localPart, string $parsedDomainPart): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (strlen($localPart . '@' . $parsedDomainPart) > self::EMAILID_MAX_LENGTH) {
            $this->warnings[EmailTooLong::CODE] = new EmailTooLong();
        }
    }
}
