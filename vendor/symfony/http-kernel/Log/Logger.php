<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Log;

use Psr\Log\AbstractLogger;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LogLevel;
<<<<<<< HEAD
=======
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

/**
 * Minimalist PSR-3 logger designed to write in stderr or any other stream.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
<<<<<<< HEAD
class Logger extends AbstractLogger
=======
class Logger extends AbstractLogger implements DebugLoggerInterface
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
{
    private const LEVELS = [
        LogLevel::DEBUG => 0,
        LogLevel::INFO => 1,
        LogLevel::NOTICE => 2,
        LogLevel::WARNING => 3,
        LogLevel::ERROR => 4,
        LogLevel::CRITICAL => 5,
        LogLevel::ALERT => 6,
        LogLevel::EMERGENCY => 7,
    ];
<<<<<<< HEAD

    private int $minLevelIndex;
    private \Closure $formatter;
=======
    private const PRIORITIES = [
        LogLevel::DEBUG => 100,
        LogLevel::INFO => 200,
        LogLevel::NOTICE => 250,
        LogLevel::WARNING => 300,
        LogLevel::ERROR => 400,
        LogLevel::CRITICAL => 500,
        LogLevel::ALERT => 550,
        LogLevel::EMERGENCY => 600,
    ];

    private int $minLevelIndex;
    private \Closure $formatter;
    private bool $debug = false;
    private array $logs = [];
    private array $errorCount = [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /** @var resource|null */
    private $handle;

    /**
     * @param string|resource|null $output
     */
<<<<<<< HEAD
    public function __construct(string $minLevel = null, $output = null, callable $formatter = null)
=======
    public function __construct(?string $minLevel = null, $output = null, ?callable $formatter = null, private readonly ?RequestStack $requestStack = null, bool $debug = false)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (null === $minLevel) {
            $minLevel = null === $output || 'php://stdout' === $output || 'php://stderr' === $output ? LogLevel::ERROR : LogLevel::WARNING;

            if (isset($_ENV['SHELL_VERBOSITY']) || isset($_SERVER['SHELL_VERBOSITY'])) {
<<<<<<< HEAD
                switch ((int) ($_ENV['SHELL_VERBOSITY'] ?? $_SERVER['SHELL_VERBOSITY'])) {
                    case -1: $minLevel = LogLevel::ERROR;
                        break;
                    case 1: $minLevel = LogLevel::NOTICE;
                        break;
                    case 2: $minLevel = LogLevel::INFO;
                        break;
                    case 3: $minLevel = LogLevel::DEBUG;
                        break;
                }
=======
                $minLevel = match ((int) ($_ENV['SHELL_VERBOSITY'] ?? $_SERVER['SHELL_VERBOSITY'])) {
                    -1 => LogLevel::ERROR,
                    1 => LogLevel::NOTICE,
                    2 => LogLevel::INFO,
                    3 => LogLevel::DEBUG,
                    default => $minLevel,
                };
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            }
        }

        if (!isset(self::LEVELS[$minLevel])) {
            throw new InvalidArgumentException(sprintf('The log level "%s" does not exist.', $minLevel));
        }

        $this->minLevelIndex = self::LEVELS[$minLevel];
<<<<<<< HEAD
        $this->formatter = $formatter instanceof \Closure ? $formatter : \Closure::fromCallable($formatter ?? [$this, 'format']);
        if ($output && false === $this->handle = \is_resource($output) ? $output : @fopen($output, 'a')) {
            throw new InvalidArgumentException(sprintf('Unable to open "%s".', $output));
        }
    }

    /**
     * {@inheritdoc}
     */
=======
        $this->formatter = null !== $formatter ? $formatter(...) : $this->format(...);
        if ($output && false === $this->handle = \is_string($output) ? @fopen($output, 'a') : $output) {
            throw new InvalidArgumentException(sprintf('Unable to open "%s".', $output));
        }
        $this->debug = $debug;
    }

    public function enableDebug(): void
    {
        $this->debug = true;
    }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function log($level, $message, array $context = []): void
    {
        if (!isset(self::LEVELS[$level])) {
            throw new InvalidArgumentException(sprintf('The log level "%s" does not exist.', $level));
        }

        if (self::LEVELS[$level] < $this->minLevelIndex) {
            return;
        }

        $formatter = $this->formatter;
        if ($this->handle) {
            @fwrite($this->handle, $formatter($level, $message, $context).\PHP_EOL);
        } else {
            error_log($formatter($level, $message, $context, false));
        }
<<<<<<< HEAD
=======

        if ($this->debug && $this->requestStack) {
            $this->record($level, $message, $context);
        }
    }

    public function getLogs(?Request $request = null): array
    {
        if ($request) {
            return $this->logs[spl_object_id($request)] ?? [];
        }

        return array_merge(...array_values($this->logs));
    }

    public function countErrors(?Request $request = null): int
    {
        if ($request) {
            return $this->errorCount[spl_object_id($request)] ?? 0;
        }

        return array_sum($this->errorCount);
    }

    public function clear(): void
    {
        $this->logs = [];
        $this->errorCount = [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    private function format(string $level, string $message, array $context, bool $prefixDate = true): string
    {
        if (str_contains($message, '{')) {
            $replacements = [];
            foreach ($context as $key => $val) {
                if (null === $val || \is_scalar($val) || $val instanceof \Stringable) {
                    $replacements["{{$key}}"] = $val;
                } elseif ($val instanceof \DateTimeInterface) {
<<<<<<< HEAD
                    $replacements["{{$key}}"] = $val->format(\DateTime::RFC3339);
                } elseif (\is_object($val)) {
                    $replacements["{{$key}}"] = '[object '.\get_class($val).']';
=======
                    $replacements["{{$key}}"] = $val->format(\DateTimeInterface::RFC3339);
                } elseif (\is_object($val)) {
                    $replacements["{{$key}}"] = '[object '.$val::class.']';
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                } else {
                    $replacements["{{$key}}"] = '['.\gettype($val).']';
                }
            }

            $message = strtr($message, $replacements);
        }

        $log = sprintf('[%s] %s', $level, $message);
        if ($prefixDate) {
<<<<<<< HEAD
            $log = date(\DateTime::RFC3339).' '.$log;
=======
            $log = date(\DateTimeInterface::RFC3339).' '.$log;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        return $log;
    }
<<<<<<< HEAD
=======

    private function record($level, $message, array $context): void
    {
        $request = $this->requestStack->getCurrentRequest();
        $key = $request ? spl_object_id($request) : '';

        $this->logs[$key][] = [
            'channel' => null,
            'context' => $context,
            'message' => $message,
            'priority' => self::PRIORITIES[$level],
            'priorityName' => $level,
            'timestamp' => time(),
            'timestamp_rfc3339' => date(\DATE_RFC3339_EXTENDED),
        ];

        $this->errorCount[$key] ??= 0;
        switch ($level) {
            case LogLevel::ERROR:
            case LogLevel::CRITICAL:
            case LogLevel::ALERT:
            case LogLevel::EMERGENCY:
                ++$this->errorCount[$key];
        }
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
