<?php

namespace Egulias\EmailValidator\Validation;

class DNSRecords
{
<<<<<<< HEAD
    
    /**
     * @var array $records
     */
    private $records = [];

    /**
     * @var bool $error
     */
    private $error = false;

    public function __construct(array $records, bool $error = false)
    {
        $this->records = $records;
        $this->error = $error;
    }

    public function getRecords() : array
=======
    /**
     * @param list<array<array-key, mixed>> $records
     * @param bool $error
     */
    public function __construct(private readonly array $records, private readonly bool $error = false)
    {
    }

    /**
     * @return list<array<array-key, mixed>>
     */
    public function getRecords(): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->records;
    }

<<<<<<< HEAD
    public function withError() : bool
    {
        return $this->error;
    }


=======
    public function withError(): bool
    {
        return $this->error;
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
