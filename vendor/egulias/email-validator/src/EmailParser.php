<?php

namespace Egulias\EmailValidator;

use Egulias\EmailValidator\Result\Result;
use Egulias\EmailValidator\Parser\LocalPart;
use Egulias\EmailValidator\Parser\DomainPart;
use Egulias\EmailValidator\Result\ValidEmail;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Warning\EmailTooLong;
use Egulias\EmailValidator\Result\Reason\NoLocalPart;

class EmailParser extends Parser
{
    public const EMAIL_MAX_LENGTH = 254;

    /**
     * @var string
     */
    protected $domainPart = '';

    /**
     * @var string
     */
    protected $localPart = '';

<<<<<<< HEAD
    public function parse(string $str) : Result
=======
    public function parse(string $str): Result
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $result = parent::parse($str);

        $this->addLongEmailWarning($this->localPart, $this->domainPart);

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
        return $this->processLocalPart();
    }

    protected function parseRightFromAt(): Result
    {
        return $this->processDomainPart();
    }

<<<<<<< HEAD
    private function processLocalPart() : Result
=======
    private function processLocalPart(): Result
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $localPartParser = new LocalPart($this->lexer);
        $localPartResult = $localPartParser->parse();
        $this->localPart = $localPartParser->localPart();
<<<<<<< HEAD
        $this->warnings = array_merge($localPartParser->getWarnings(), $this->warnings);
=======
        $this->warnings = [...$localPartParser->getWarnings(), ...$this->warnings];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        return $localPartResult;
    }

<<<<<<< HEAD
    private function processDomainPart() : Result
=======
    private function processDomainPart(): Result
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $domainPartParser = new DomainPart($this->lexer);
        $domainPartResult = $domainPartParser->parse();
        $this->domainPart = $domainPartParser->domainPart();
<<<<<<< HEAD
        $this->warnings = array_merge($domainPartParser->getWarnings(), $this->warnings);
        
        return $domainPartResult;
    }

    public function getDomainPart() : string
=======
        $this->warnings = [...$domainPartParser->getWarnings(), ...$this->warnings];

        return $domainPartResult;
    }

    public function getDomainPart(): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->domainPart;
    }

<<<<<<< HEAD
    public function getLocalPart() : string
=======
    public function getLocalPart(): string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->localPart;
    }

<<<<<<< HEAD
    private function addLongEmailWarning(string $localPart, string $parsedDomainPart) : void
=======
    private function addLongEmailWarning(string $localPart, string $parsedDomainPart): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (strlen($localPart . '@' . $parsedDomainPart) > self::EMAIL_MAX_LENGTH) {
            $this->warnings[EmailTooLong::CODE] = new EmailTooLong();
        }
    }
}
