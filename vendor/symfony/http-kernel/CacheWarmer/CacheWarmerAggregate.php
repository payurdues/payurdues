<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\CacheWarmer;

<<<<<<< HEAD
=======
use Symfony\Component\Console\Style\SymfonyStyle;

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
/**
 * Aggregates several cache warmers into a single one.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class CacheWarmerAggregate implements CacheWarmerInterface
{
    private iterable $warmers;
    private bool $debug;
    private ?string $deprecationLogsFilepath;
    private bool $optionalsEnabled = false;
    private bool $onlyOptionalsEnabled = false;

    /**
     * @param iterable<mixed, CacheWarmerInterface> $warmers
     */
<<<<<<< HEAD
    public function __construct(iterable $warmers = [], bool $debug = false, string $deprecationLogsFilepath = null)
=======
    public function __construct(iterable $warmers = [], bool $debug = false, ?string $deprecationLogsFilepath = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->warmers = $warmers;
        $this->debug = $debug;
        $this->deprecationLogsFilepath = $deprecationLogsFilepath;
    }

<<<<<<< HEAD
    public function enableOptionalWarmers()
=======
    public function enableOptionalWarmers(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->optionalsEnabled = true;
    }

<<<<<<< HEAD
    public function enableOnlyOptionalWarmers()
=======
    public function enableOnlyOptionalWarmers(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->onlyOptionalsEnabled = $this->optionalsEnabled = true;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function warmUp(string $cacheDir): array
    {
=======
     * @param string|null $buildDir
     */
    public function warmUp(string $cacheDir, string|SymfonyStyle|null $buildDir = null, ?SymfonyStyle $io = null): array
    {
        if ($buildDir instanceof SymfonyStyle) {
            trigger_deprecation('symfony/http-kernel', '6.4', 'Passing a "%s" as second argument of "%s()" is deprecated, pass it as third argument instead, after the build directory.', SymfonyStyle::class, __METHOD__);
            $io = $buildDir;
            $buildDir = null;
        }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if ($collectDeprecations = $this->debug && !\defined('PHPUNIT_COMPOSER_INSTALL')) {
            $collectedLogs = [];
            $previousHandler = set_error_handler(function ($type, $message, $file, $line) use (&$collectedLogs, &$previousHandler) {
                if (\E_USER_DEPRECATED !== $type && \E_DEPRECATED !== $type) {
                    return $previousHandler ? $previousHandler($type, $message, $file, $line) : false;
                }

                if (isset($collectedLogs[$message])) {
                    ++$collectedLogs[$message]['count'];

                    return null;
                }

                $backtrace = debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 3);
                // Clean the trace by removing first frames added by the error handler itself.
                for ($i = 0; isset($backtrace[$i]); ++$i) {
                    if (isset($backtrace[$i]['file'], $backtrace[$i]['line']) && $backtrace[$i]['line'] === $line && $backtrace[$i]['file'] === $file) {
                        $backtrace = \array_slice($backtrace, 1 + $i);
                        break;
                    }
                }

                $collectedLogs[$message] = [
                    'type' => $type,
                    'message' => $message,
                    'file' => $file,
                    'line' => $line,
                    'trace' => $backtrace,
                    'count' => 1,
                ];

                return null;
            });
        }

        $preload = [];
        try {
            foreach ($this->warmers as $warmer) {
                if (!$this->optionalsEnabled && $warmer->isOptional()) {
                    continue;
                }
                if ($this->onlyOptionalsEnabled && !$warmer->isOptional()) {
                    continue;
                }

<<<<<<< HEAD
                $preload[] = array_values((array) $warmer->warmUp($cacheDir));
=======
                $start = microtime(true);
                foreach ((array) $warmer->warmUp($cacheDir, $buildDir) as $item) {
                    if (is_dir($item) || (str_starts_with($item, \dirname($cacheDir)) && !is_file($item)) || ($buildDir && str_starts_with($item, \dirname($buildDir)) && !is_file($item))) {
                        throw new \LogicException(sprintf('"%s::warmUp()" should return a list of files or classes but "%s" is none of them.', $warmer::class, $item));
                    }
                    $preload[] = $item;
                }

                if ($io?->isDebug()) {
                    $io->info(sprintf('"%s" completed in %0.2fms.', $warmer::class, 1000 * (microtime(true) - $start)));
                }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            }
        } finally {
            if ($collectDeprecations) {
                restore_error_handler();

                if (is_file($this->deprecationLogsFilepath)) {
                    $previousLogs = unserialize(file_get_contents($this->deprecationLogsFilepath));
                    if (\is_array($previousLogs)) {
                        $collectedLogs = array_merge($previousLogs, $collectedLogs);
                    }
                }

                file_put_contents($this->deprecationLogsFilepath, serialize(array_values($collectedLogs)));
            }
        }

<<<<<<< HEAD
        return array_values(array_unique(array_merge([], ...$preload)));
    }

    /**
     * {@inheritdoc}
     */
=======
        return array_values(array_unique($preload));
    }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isOptional(): bool
    {
        return false;
    }
}
