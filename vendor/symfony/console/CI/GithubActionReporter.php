<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\CI;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Utility class for Github actions.
 *
 * @author Maxime Steinhausser <maxime.steinhausser@gmail.com>
 */
class GithubActionReporter
{
<<<<<<< HEAD
    private $output;
=======
    private OutputInterface $output;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * @see https://github.com/actions/toolkit/blob/5e5e1b7aacba68a53836a34db4a288c3c1c1585b/packages/core/src/command.ts#L80-L85
     */
    private const ESCAPED_DATA = [
        '%' => '%25',
        "\r" => '%0D',
        "\n" => '%0A',
    ];

    /**
     * @see https://github.com/actions/toolkit/blob/5e5e1b7aacba68a53836a34db4a288c3c1c1585b/packages/core/src/command.ts#L87-L94
     */
    private const ESCAPED_PROPERTIES = [
        '%' => '%25',
        "\r" => '%0D',
        "\n" => '%0A',
        ':' => '%3A',
        ',' => '%2C',
    ];

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public static function isGithubActionEnvironment(): bool
    {
        return false !== getenv('GITHUB_ACTIONS');
    }

    /**
     * Output an error using the Github annotations format.
     *
     * @see https://docs.github.com/en/free-pro-team@latest/actions/reference/workflow-commands-for-github-actions#setting-an-error-message
     */
<<<<<<< HEAD
    public function error(string $message, string $file = null, int $line = null, int $col = null): void
=======
    public function error(string $message, ?string $file = null, ?int $line = null, ?int $col = null): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->log('error', $message, $file, $line, $col);
    }

    /**
     * Output a warning using the Github annotations format.
     *
     * @see https://docs.github.com/en/free-pro-team@latest/actions/reference/workflow-commands-for-github-actions#setting-a-warning-message
     */
<<<<<<< HEAD
    public function warning(string $message, string $file = null, int $line = null, int $col = null): void
=======
    public function warning(string $message, ?string $file = null, ?int $line = null, ?int $col = null): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->log('warning', $message, $file, $line, $col);
    }

    /**
     * Output a debug log using the Github annotations format.
     *
     * @see https://docs.github.com/en/free-pro-team@latest/actions/reference/workflow-commands-for-github-actions#setting-a-debug-message
     */
<<<<<<< HEAD
    public function debug(string $message, string $file = null, int $line = null, int $col = null): void
=======
    public function debug(string $message, ?string $file = null, ?int $line = null, ?int $col = null): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->log('debug', $message, $file, $line, $col);
    }

<<<<<<< HEAD
    private function log(string $type, string $message, string $file = null, int $line = null, int $col = null): void
=======
    private function log(string $type, string $message, ?string $file = null, ?int $line = null, ?int $col = null): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        // Some values must be encoded.
        $message = strtr($message, self::ESCAPED_DATA);

        if (!$file) {
            // No file provided, output the message solely:
            $this->output->writeln(sprintf('::%s::%s', $type, $message));

            return;
        }

        $this->output->writeln(sprintf('::%s file=%s,line=%s,col=%s::%s', $type, strtr($file, self::ESCAPED_PROPERTIES), strtr($line ?? 1, self::ESCAPED_PROPERTIES), strtr($col ?? 0, self::ESCAPED_PROPERTIES), $message));
    }
}
