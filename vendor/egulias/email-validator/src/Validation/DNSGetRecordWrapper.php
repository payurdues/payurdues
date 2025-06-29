<?php
<<<<<<< HEAD
=======

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
namespace Egulias\EmailValidator\Validation;

class DNSGetRecordWrapper
{
    /**
     * @param string $host
     * @param int $type
<<<<<<< HEAD
     */
    public function getRecords(string $host, int $type) : DNSRecords
    {
        // A workaround to fix https://bugs.php.net/bug.php?id=73149
        /** @psalm-suppress InvalidArgument */
        set_error_handler(
            static function (int $errorLevel, string $errorMessage): ?bool {
=======
     *
     * @return DNSRecords
     */
    public function getRecords(string $host, int $type): DNSRecords
    {
        // A workaround to fix https://bugs.php.net/bug.php?id=73149
        set_error_handler(
            static function (int $errorLevel, string $errorMessage): never {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                throw new \RuntimeException("Unable to get DNS record for the host: $errorMessage");
            }
        );
        try {
            // Get all MX, A and AAAA DNS records for host
            return new DNSRecords(dns_get_record($host, $type));
        } catch (\RuntimeException $exception) {
            return new DNSRecords([], true);
        } finally {
            restore_error_handler();
        }
    }
}
