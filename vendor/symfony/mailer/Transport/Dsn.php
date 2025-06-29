<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Transport;

use Symfony\Component\Mailer\Exception\InvalidArgumentException;

/**
 * @author Konstantin Myakshin <molodchick@gmail.com>
 */
final class Dsn
{
    private string $scheme;
    private string $host;
    private ?string $user;
    private ?string $password;
    private ?int $port;
    private array $options;

<<<<<<< HEAD
    public function __construct(string $scheme, string $host, string $user = null, string $password = null, int $port = null, array $options = [])
=======
    public function __construct(string $scheme, string $host, ?string $user = null, #[\SensitiveParameter] ?string $password = null, ?int $port = null, array $options = [])
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->scheme = $scheme;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->port = $port;
        $this->options = $options;
    }

<<<<<<< HEAD
    public static function fromString(string $dsn): self
    {
        if (false === $parsedDsn = parse_url($dsn)) {
            throw new InvalidArgumentException(sprintf('The "%s" mailer DSN is invalid.', $dsn));
        }

        if (!isset($parsedDsn['scheme'])) {
            throw new InvalidArgumentException(sprintf('The "%s" mailer DSN must contain a scheme.', $dsn));
        }

        if (!isset($parsedDsn['host'])) {
            throw new InvalidArgumentException(sprintf('The "%s" mailer DSN must contain a host (use "default" by default).', $dsn));
        }

        $user = '' !== ($parsedDsn['user'] ?? '') ? urldecode($parsedDsn['user']) : null;
        $password = '' !== ($parsedDsn['pass'] ?? '') ? urldecode($parsedDsn['pass']) : null;
        $port = $parsedDsn['port'] ?? null;
        parse_str($parsedDsn['query'] ?? '', $query);

        return new self($parsedDsn['scheme'], $parsedDsn['host'], $user, $password, $port, $query);
=======
    public static function fromString(#[\SensitiveParameter] string $dsn): self
    {
        if (false === $params = parse_url($dsn)) {
            throw new InvalidArgumentException('The mailer DSN is invalid.');
        }

        if (!isset($params['scheme'])) {
            throw new InvalidArgumentException('The mailer DSN must contain a scheme.');
        }

        if (!isset($params['host'])) {
            throw new InvalidArgumentException('The mailer DSN must contain a host (use "default" by default).');
        }

        $user = '' !== ($params['user'] ?? '') ? rawurldecode($params['user']) : null;
        $password = '' !== ($params['pass'] ?? '') ? rawurldecode($params['pass']) : null;
        $port = $params['port'] ?? null;
        parse_str($params['query'] ?? '', $query);

        return new self($params['scheme'], $params['host'], $user, $password, $port, $query);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

<<<<<<< HEAD
    public function getPort(int $default = null): ?int
=======
    public function getPort(?int $default = null): ?int
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->port ?? $default;
    }

<<<<<<< HEAD
    public function getOption(string $key, mixed $default = null)
=======
    public function getOption(string $key, mixed $default = null): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->options[$key] ?? $default;
    }
}
