<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Validation\Exception\EmptyValidationList;
use Egulias\EmailValidator\Result\MultipleErrors;
<<<<<<< HEAD
=======
use Egulias\EmailValidator\Warning\Warning;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

class MultipleValidationWithAnd implements EmailValidation
{
    /**
     * If one of validations fails, the remaining validations will be skipped.
     * This means MultipleErrors will only contain a single error, the first found.
     */
    public const STOP_ON_ERROR = 0;

    /**
     * All of validations will be invoked even if one of them got failure.
     * So MultipleErrors will contain all causes.
     */
    public const ALLOW_ALL_ERRORS = 1;

    /**
<<<<<<< HEAD
     * @var EmailValidation[]
     */
    private $validations = [];

    /**
     * @var array
=======
     * @var Warning[]
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    private $warnings = [];

    /**
     * @var MultipleErrors|null
     */
    private $error;

    /**
<<<<<<< HEAD
     * @var int
     */
    private $mode;

    /**
     * @param EmailValidation[] $validations The validations.
     * @param int               $mode        The validation mode (one of the constants).
     */
    public function __construct(array $validations, $mode = self::ALLOW_ALL_ERRORS)
=======
     * @param EmailValidation[] $validations The validations.
     * @param int               $mode        The validation mode (one of the constants).
     */
    public function __construct(private readonly array $validations, private readonly int $mode = self::ALLOW_ALL_ERRORS)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (count($validations) == 0) {
            throw new EmptyValidationList();
        }
<<<<<<< HEAD

        $this->validations = $validations;
        $this->mode = $mode;
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isValid(string $email, EmailLexer $emailLexer) : bool
=======
    public function isValid(string $email, EmailLexer $emailLexer): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $result = true;
        foreach ($this->validations as $validation) {
            $emailLexer->reset();
            $validationResult = $validation->isValid($email, $emailLexer);
            $result = $result && $validationResult;
<<<<<<< HEAD
            $this->warnings = array_merge($this->warnings, $validation->getWarnings());
=======
            $this->warnings = [...$this->warnings, ...$validation->getWarnings()];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            if (!$validationResult) {
                $this->processError($validation);
            }

            if ($this->shouldStop($result)) {
                break;
            }
        }

        return $result;
    }

<<<<<<< HEAD
    private function initErrorStorage() : void
=======
    private function initErrorStorage(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (null === $this->error) {
            $this->error = new MultipleErrors();
        }
    }

<<<<<<< HEAD
    private function processError(EmailValidation $validation) : void
=======
    private function processError(EmailValidation $validation): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (null !== $validation->getError()) {
            $this->initErrorStorage();
            /** @psalm-suppress PossiblyNullReference */
            $this->error->addReason($validation->getError()->reason());
        }
    }

<<<<<<< HEAD
    private function shouldStop(bool $result) : bool
=======
    private function shouldStop(bool $result): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return !$result && $this->mode === self::STOP_ON_ERROR;
    }

    /**
     * Returns the validation errors.
     */
<<<<<<< HEAD
    public function getError() : ?InvalidEmail
=======
    public function getError(): ?InvalidEmail
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->error;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function getWarnings() : array
=======
     * @return Warning[]
     */
    public function getWarnings(): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->warnings;
    }
}
