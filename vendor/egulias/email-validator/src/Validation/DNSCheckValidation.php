<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Result\InvalidEmail;
use Egulias\EmailValidator\Result\Reason\DomainAcceptsNoMail;
use Egulias\EmailValidator\Result\Reason\LocalOrReservedDomain;
use Egulias\EmailValidator\Result\Reason\NoDNSRecord as ReasonNoDNSRecord;
use Egulias\EmailValidator\Result\Reason\UnableToGetDNSRecord;
use Egulias\EmailValidator\Warning\NoDNSMXRecord;
<<<<<<< HEAD

class DNSCheckValidation implements EmailValidation
{
    /**
     * @var int
     */
    protected const DNS_RECORD_TYPES_TO_CHECK = DNS_MX + DNS_A + DNS_AAAA;
=======
use Egulias\EmailValidator\Warning\Warning;

class DNSCheckValidation implements EmailValidation
{
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Reserved Top Level DNS Names (https://tools.ietf.org/html/rfc2606#section-2),
     * mDNS and private DNS Namespaces (https://tools.ietf.org/html/rfc6762#appendix-G)
<<<<<<< HEAD
=======
     * 
     * @var string[]
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public const RESERVED_DNS_TOP_LEVEL_NAMES = [
        // Reserved Top Level DNS Names
        'test',
        'example',
        'invalid',
        'localhost',

        // mDNS
        'local',

        // Private DNS Namespaces
        'intranet',
        'internal',
        'private',
        'corp',
        'home',
        'lan',
    ];
<<<<<<< HEAD
    
    /**
     * @var array
=======

    /**
     * @var Warning[]
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    private $warnings = [];

    /**
     * @var InvalidEmail|null
     */
    private $error;

    /**
     * @var array
     */
    private $mxRecords = [];

    /**
     * @var DNSGetRecordWrapper
     */
    private $dnsGetRecord;

    public function __construct(?DNSGetRecordWrapper $dnsGetRecord = null)
    {
        if (!function_exists('idn_to_ascii')) {
            throw new \LogicException(sprintf('The %s class requires the Intl extension.', __CLASS__));
        }

        if ($dnsGetRecord == null) {
            $dnsGetRecord = new DNSGetRecordWrapper();
        }

        $this->dnsGetRecord = $dnsGetRecord;
    }

<<<<<<< HEAD
    public function isValid(string $email, EmailLexer $emailLexer) : bool
=======
    public function isValid(string $email, EmailLexer $emailLexer): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        // use the input to check DNS if we cannot extract something similar to a domain
        $host = $email;

        // Arguable pattern to extract the domain. Not aiming to validate the domain nor the email
        if (false !== $lastAtPos = strrpos($email, '@')) {
            $host = substr($email, $lastAtPos + 1);
        }

        // Get the domain parts
        $hostParts = explode('.', $host);

        $isLocalDomain = count($hostParts) <= 1;
        $isReservedTopLevel = in_array($hostParts[(count($hostParts) - 1)], self::RESERVED_DNS_TOP_LEVEL_NAMES, true);

        // Exclude reserved top level DNS names
        if ($isLocalDomain || $isReservedTopLevel) {
            $this->error = new InvalidEmail(new LocalOrReservedDomain(), $host);
            return false;
        }

        return $this->checkDns($host);
    }

<<<<<<< HEAD
    public function getError() : ?InvalidEmail
=======
    public function getError(): ?InvalidEmail
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->error;
    }

<<<<<<< HEAD
    public function getWarnings() : array
=======
    /**
     * @return Warning[]
     */
    public function getWarnings(): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->warnings;
    }

    /**
     * @param string $host
     *
     * @return bool
     */
    protected function checkDns($host)
    {
        $variant = INTL_IDNA_VARIANT_UTS46;

<<<<<<< HEAD
        $host = rtrim(idn_to_ascii($host, IDNA_DEFAULT, $variant), '.') . '.';

        return $this->validateDnsRecords($host);
=======
        $host = rtrim(idn_to_ascii($host, IDNA_DEFAULT, $variant), '.');

        $hostParts = explode('.', $host);
        $host = array_pop($hostParts);

        while (count($hostParts) > 0) {
            $host = array_pop($hostParts) . '.' . $host;

            if ($this->validateDnsRecords($host)) {
                return true;
            }
        }

        return false;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }


    /**
     * Validate the DNS records for given host.
     *
     * @param string $host A set of DNS records in the format returned by dns_get_record.
     *
     * @return bool True on success.
     */
<<<<<<< HEAD
    private function validateDnsRecords($host) : bool
    {
        $dnsRecordsResult = $this->dnsGetRecord->getRecords($host, static::DNS_RECORD_TYPES_TO_CHECK);
=======
    private function validateDnsRecords($host): bool
    {
        $dnsRecordsResult = $this->dnsGetRecord->getRecords($host, DNS_A + DNS_MX);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        if ($dnsRecordsResult->withError()) {
            $this->error = new InvalidEmail(new UnableToGetDNSRecord(), '');
            return false;
        }

        $dnsRecords = $dnsRecordsResult->getRecords();

<<<<<<< HEAD
=======
        // Combined check for A+MX+AAAA can fail with SERVFAIL, even in the presence of valid A/MX records
        $aaaaRecordsResult = $this->dnsGetRecord->getRecords($host, DNS_AAAA);

        if (! $aaaaRecordsResult->withError()) {
            $dnsRecords = array_merge($dnsRecords, $aaaaRecordsResult->getRecords());
        }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        // No MX, A or AAAA DNS records
        if ($dnsRecords === []) {
            $this->error = new InvalidEmail(new ReasonNoDNSRecord(), '');
            return false;
        }

        // For each DNS record
        foreach ($dnsRecords as $dnsRecord) {
            if (!$this->validateMXRecord($dnsRecord)) {
                // No MX records (fallback to A or AAAA records)
                if (empty($this->mxRecords)) {
                    $this->warnings[NoDNSMXRecord::CODE] = new NoDNSMXRecord();
                }
                return false;
            }
        }
        return true;
    }

    /**
     * Validate an MX record
     *
     * @param array $dnsRecord Given DNS record.
     *
     * @return bool True if valid.
     */
<<<<<<< HEAD
    private function validateMxRecord($dnsRecord) : bool
=======
    private function validateMxRecord($dnsRecord): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (!isset($dnsRecord['type'])) {
            $this->error = new InvalidEmail(new ReasonNoDNSRecord(), '');
            return false;
        }

        if ($dnsRecord['type'] !== 'MX') {
            return true;
        }

        // "Null MX" record indicates the domain accepts no mail (https://tools.ietf.org/html/rfc7505)
        if (empty($dnsRecord['target']) || $dnsRecord['target'] === '.') {
            $this->error = new InvalidEmail(new DomainAcceptsNoMail(), "");
            return false;
        }

        $this->mxRecords[] = $dnsRecord;

        return true;
    }
}
