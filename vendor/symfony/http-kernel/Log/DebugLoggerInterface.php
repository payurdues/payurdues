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

use Symfony\Component\HttpFoundation\Request;

/**
 * DebugLoggerInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface DebugLoggerInterface
{
    /**
     * Returns an array of logs.
     *
<<<<<<< HEAD
     * A log is an array with the following mandatory keys:
     * timestamp, message, priority, and priorityName.
     * It can also have an optional context key containing an array.
     *
     * @return array
     */
    public function getLogs(Request $request = null);
=======
     * @return array<array{
     *     channel: ?string,
     *     context: array<string, mixed>,
     *     message: string,
     *     priority: int,
     *     priorityName: string,
     *     timestamp: int,
     *     timestamp_rfc3339: string,
     * }>
     */
    public function getLogs(?Request $request = null);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Returns the number of errors.
     *
     * @return int
     */
<<<<<<< HEAD
    public function countErrors(Request $request = null);

    /**
     * Removes all log records.
=======
    public function countErrors(?Request $request = null);

    /**
     * Removes all log records.
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function clear();
}
