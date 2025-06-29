<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Style;

/**
 * Output style helpers.
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 */
interface StyleInterface
{
    /**
     * Formats a command title.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function title(string $message);

    /**
     * Formats a section title.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function section(string $message);

    /**
     * Formats a list.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function listing(array $elements);

    /**
     * Formats informational text.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function text(string|array $message);

    /**
     * Formats a success result bar.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function success(string|array $message);

    /**
     * Formats an error result bar.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function error(string|array $message);

    /**
     * Formats an warning result bar.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function warning(string|array $message);

    /**
     * Formats a note admonition.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function note(string|array $message);

    /**
     * Formats a caution admonition.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function caution(string|array $message);

    /**
     * Formats a table.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function table(array $headers, array $rows);

    /**
     * Asks a question.
     */
<<<<<<< HEAD
    public function ask(string $question, string $default = null, callable $validator = null): mixed;
=======
    public function ask(string $question, ?string $default = null, ?callable $validator = null): mixed;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Asks a question with the user input hidden.
     */
<<<<<<< HEAD
    public function askHidden(string $question, callable $validator = null): mixed;
=======
    public function askHidden(string $question, ?callable $validator = null): mixed;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Asks for confirmation.
     */
    public function confirm(string $question, bool $default = true): bool;

    /**
     * Asks a choice question.
     */
    public function choice(string $question, array $choices, mixed $default = null): mixed;

    /**
     * Add newline(s).
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function newLine(int $count = 1);

    /**
     * Starts the progress output.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function progressStart(int $max = 0);

    /**
     * Advances the progress output X steps.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function progressAdvance(int $step = 1);

    /**
     * Finishes the progress output.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function progressFinish();
}
