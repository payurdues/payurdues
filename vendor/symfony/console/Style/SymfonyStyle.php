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

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Helper\Helper;
<<<<<<< HEAD
=======
use Symfony\Component\Console\Helper\OutputWrapper;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\SymfonyQuestionHelper;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
<<<<<<< HEAD
=======
use Symfony\Component\Console\Output\ConsoleSectionOutput;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\TrimmedBufferOutput;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Terminal;

/**
 * Output decorator helpers for the Symfony Style Guide.
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class SymfonyStyle extends OutputStyle
{
    public const MAX_LINE_LENGTH = 120;

<<<<<<< HEAD
    private $input;
    private $output;
    private $questionHelper;
    private $progressBar;
    private int $lineLength;
    private $bufferedOutput;
=======
    private InputInterface $input;
    private OutputInterface $output;
    private SymfonyQuestionHelper $questionHelper;
    private ProgressBar $progressBar;
    private int $lineLength;
    private TrimmedBufferOutput $bufferedOutput;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->bufferedOutput = new TrimmedBufferOutput(\DIRECTORY_SEPARATOR === '\\' ? 4 : 2, $output->getVerbosity(), false, clone $output->getFormatter());
        // Windows cmd wraps lines as soon as the terminal width is reached, whether there are following chars or not.
        $width = (new Terminal())->getWidth() ?: self::MAX_LINE_LENGTH;
        $this->lineLength = min($width - (int) (\DIRECTORY_SEPARATOR === '\\'), self::MAX_LINE_LENGTH);

        parent::__construct($this->output = $output);
    }

    /**
     * Formats a message as a block of text.
<<<<<<< HEAD
     */
    public function block(string|array $messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = true)
=======
     *
     * @return void
     */
    public function block(string|array $messages, ?string $type = null, ?string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = true)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $messages = \is_array($messages) ? array_values($messages) : [$messages];

        $this->autoPrependBlock();
        $this->writeln($this->createBlock($messages, $type, $style, $prefix, $padding, $escape));
        $this->newLine();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function title(string $message)
    {
        $this->autoPrependBlock();
        $this->writeln([
            sprintf('<comment>%s</>', OutputFormatter::escapeTrailingBackslash($message)),
            sprintf('<comment>%s</>', str_repeat('=', Helper::width(Helper::removeDecoration($this->getFormatter(), $message)))),
        ]);
        $this->newLine();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function section(string $message)
    {
        $this->autoPrependBlock();
        $this->writeln([
            sprintf('<comment>%s</>', OutputFormatter::escapeTrailingBackslash($message)),
            sprintf('<comment>%s</>', str_repeat('-', Helper::width(Helper::removeDecoration($this->getFormatter(), $message)))),
        ]);
        $this->newLine();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function listing(array $elements)
    {
        $this->autoPrependText();
<<<<<<< HEAD
        $elements = array_map(function ($element) {
            return sprintf(' * %s', $element);
        }, $elements);
=======
        $elements = array_map(fn ($element) => sprintf(' * %s', $element), $elements);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        $this->writeln($elements);
        $this->newLine();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function text(string|array $message)
    {
        $this->autoPrependText();

        $messages = \is_array($message) ? array_values($message) : [$message];
        foreach ($messages as $message) {
            $this->writeln(sprintf(' %s', $message));
        }
    }

    /**
     * Formats a command comment.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function comment(string|array $message)
    {
        $this->block($message, null, null, '<fg=default;bg=default> // </>', false, false);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function success(string|array $message)
    {
        $this->block($message, 'OK', 'fg=black;bg=green', ' ', true);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function error(string|array $message)
    {
        $this->block($message, 'ERROR', 'fg=white;bg=red', ' ', true);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function warning(string|array $message)
    {
        $this->block($message, 'WARNING', 'fg=black;bg=yellow', ' ', true);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function note(string|array $message)
    {
        $this->block($message, 'NOTE', 'fg=yellow', ' ! ');
    }

    /**
     * Formats an info message.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function info(string|array $message)
    {
        $this->block($message, 'INFO', 'fg=green', ' ', true);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function caution(string|array $message)
    {
        $this->block($message, 'CAUTION', 'fg=white;bg=red', ' ! ', true);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function table(array $headers, array $rows)
    {
        $this->createTable()
            ->setHeaders($headers)
            ->setRows($rows)
            ->render()
        ;

        $this->newLine();
    }

    /**
     * Formats a horizontal table.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function horizontalTable(array $headers, array $rows)
    {
        $this->createTable()
            ->setHorizontal(true)
            ->setHeaders($headers)
            ->setRows($rows)
            ->render()
        ;

        $this->newLine();
    }

    /**
     * Formats a list of key/value horizontally.
     *
     * Each row can be one of:
     * * 'A title'
     * * ['key' => 'value']
     * * new TableSeparator()
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function definitionList(string|array|TableSeparator ...$list)
    {
        $headers = [];
        $row = [];
        foreach ($list as $value) {
            if ($value instanceof TableSeparator) {
                $headers[] = $value;
                $row[] = $value;
                continue;
            }
            if (\is_string($value)) {
                $headers[] = new TableCell($value, ['colspan' => 2]);
                $row[] = null;
                continue;
            }
            if (!\is_array($value)) {
                throw new InvalidArgumentException('Value should be an array, string, or an instance of TableSeparator.');
            }
            $headers[] = key($value);
            $row[] = current($value);
        }

        $this->horizontalTable($headers, [$row]);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function ask(string $question, string $default = null, callable $validator = null): mixed
=======
    public function ask(string $question, ?string $default = null, ?callable $validator = null): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $question = new Question($question, $default);
        $question->setValidator($validator);

        return $this->askQuestion($question);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function askHidden(string $question, callable $validator = null): mixed
=======
    public function askHidden(string $question, ?callable $validator = null): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $question = new Question($question);

        $question->setHidden(true);
        $question->setValidator($validator);

        return $this->askQuestion($question);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function confirm(string $question, bool $default = true): bool
    {
        return $this->askQuestion(new ConfirmationQuestion($question, $default));
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function choice(string $question, array $choices, mixed $default = null): mixed
=======
    public function choice(string $question, array $choices, mixed $default = null, bool $multiSelect = false): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (null !== $default) {
            $values = array_flip($choices);
            $default = $values[$default] ?? $default;
        }

<<<<<<< HEAD
        return $this->askQuestion(new ChoiceQuestion($question, $choices, $default));
    }

    /**
     * {@inheritdoc}
=======
        $questionChoice = new ChoiceQuestion($question, $choices, $default);
        $questionChoice->setMultiselect($multiSelect);

        return $this->askQuestion($questionChoice);
    }

    /**
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function progressStart(int $max = 0)
    {
        $this->progressBar = $this->createProgressBar($max);
        $this->progressBar->start();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function progressAdvance(int $step = 1)
    {
        $this->getProgressBar()->advance($step);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function progressFinish()
    {
        $this->getProgressBar()->finish();
        $this->newLine(2);
        unset($this->progressBar);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function createProgressBar(int $max = 0): ProgressBar
    {
        $progressBar = parent::createProgressBar($max);

        if ('\\' !== \DIRECTORY_SEPARATOR || 'Hyper' === getenv('TERM_PROGRAM')) {
            $progressBar->setEmptyBarCharacter('░'); // light shade character \u2591
            $progressBar->setProgressCharacter('');
            $progressBar->setBarCharacter('▓'); // dark shade character \u2593
        }

        return $progressBar;
    }

    /**
     * @see ProgressBar::iterate()
<<<<<<< HEAD
     */
    public function progressIterate(iterable $iterable, int $max = null): iterable
=======
     *
     * @template TKey
     * @template TValue
     *
     * @param iterable<TKey, TValue> $iterable
     * @param int|null               $max      Number of steps to complete the bar (0 if indeterminate), if null it will be inferred from $iterable
     *
     * @return iterable<TKey, TValue>
     */
    public function progressIterate(iterable $iterable, ?int $max = null): iterable
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        yield from $this->createProgressBar()->iterate($iterable, $max);

        $this->newLine(2);
    }

    public function askQuestion(Question $question): mixed
    {
        if ($this->input->isInteractive()) {
            $this->autoPrependBlock();
        }

        $this->questionHelper ??= new SymfonyQuestionHelper();

        $answer = $this->questionHelper->ask($this->input, $this, $question);

        if ($this->input->isInteractive()) {
<<<<<<< HEAD
=======
            if ($this->output instanceof ConsoleSectionOutput) {
                // add the new line of the `return` to submit the input to ConsoleSectionOutput, because ConsoleSectionOutput is holding all it's lines.
                // this is relevant when a `ConsoleSectionOutput::clear` is called.
                $this->output->addNewLineOfInputSubmit();
            }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $this->newLine();
            $this->bufferedOutput->write("\n");
        }

        return $answer;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function writeln(string|iterable $messages, int $type = self::OUTPUT_NORMAL)
    {
        if (!is_iterable($messages)) {
            $messages = [$messages];
        }

        foreach ($messages as $message) {
            parent::writeln($message, $type);
            $this->writeBuffer($message, true, $type);
        }
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function write(string|iterable $messages, bool $newline = false, int $type = self::OUTPUT_NORMAL)
    {
        if (!is_iterable($messages)) {
            $messages = [$messages];
        }

        foreach ($messages as $message) {
            parent::write($message, $newline, $type);
            $this->writeBuffer($message, $newline, $type);
        }
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function newLine(int $count = 1)
    {
        parent::newLine($count);
        $this->bufferedOutput->write(str_repeat("\n", $count));
    }

    /**
     * Returns a new instance which makes use of stderr if available.
     */
    public function getErrorStyle(): self
    {
        return new self($this->input, $this->getErrorOutput());
    }

    public function createTable(): Table
    {
        $output = $this->output instanceof ConsoleOutputInterface ? $this->output->section() : $this->output;
        $style = clone Table::getStyleDefinition('symfony-style-guide');
        $style->setCellHeaderFormat('<info>%s</info>');

        return (new Table($output))->setStyle($style);
    }

    private function getProgressBar(): ProgressBar
    {
        return $this->progressBar
            ?? throw new RuntimeException('The ProgressBar is not started.');
    }

    private function autoPrependBlock(): void
    {
        $chars = substr(str_replace(\PHP_EOL, "\n", $this->bufferedOutput->fetch()), -2);

        if (!isset($chars[0])) {
            $this->newLine(); // empty history, so we should start with a new line.

            return;
        }
        // Prepend new line for each non LF chars (This means no blank line was output before)
        $this->newLine(2 - substr_count($chars, "\n"));
    }

    private function autoPrependText(): void
    {
        $fetched = $this->bufferedOutput->fetch();
        // Prepend new line if last char isn't EOL:
<<<<<<< HEAD
        if (!str_ends_with($fetched, "\n")) {
=======
        if ($fetched && !str_ends_with($fetched, "\n")) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $this->newLine();
        }
    }

    private function writeBuffer(string $message, bool $newLine, int $type): void
    {
        // We need to know if the last chars are PHP_EOL
        $this->bufferedOutput->write($message, $newLine, $type);
    }

<<<<<<< HEAD
    private function createBlock(iterable $messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = false): array
=======
    private function createBlock(iterable $messages, ?string $type = null, ?string $style = null, string $prefix = ' ', bool $padding = false, bool $escape = false): array
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $indentLength = 0;
        $prefixLength = Helper::width(Helper::removeDecoration($this->getFormatter(), $prefix));
        $lines = [];

        if (null !== $type) {
            $type = sprintf('[%s] ', $type);
<<<<<<< HEAD
            $indentLength = \strlen($type);
=======
            $indentLength = Helper::width($type);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $lineIndentation = str_repeat(' ', $indentLength);
        }

        // wrap and add newlines for each element
<<<<<<< HEAD
=======
        $outputWrapper = new OutputWrapper();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        foreach ($messages as $key => $message) {
            if ($escape) {
                $message = OutputFormatter::escape($message);
            }

<<<<<<< HEAD
            $decorationLength = Helper::width($message) - Helper::width(Helper::removeDecoration($this->getFormatter(), $message));
            $messageLineLength = min($this->lineLength - $prefixLength - $indentLength + $decorationLength, $this->lineLength);
            $messageLines = explode(\PHP_EOL, wordwrap($message, $messageLineLength, \PHP_EOL, true));
            foreach ($messageLines as $messageLine) {
                $lines[] = $messageLine;
            }
=======
            $lines = array_merge(
                $lines,
                explode(\PHP_EOL, $outputWrapper->wrap(
                    $message,
                    $this->lineLength - $prefixLength - $indentLength,
                    \PHP_EOL
                ))
            );
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

            if (\count($messages) > 1 && $key < \count($messages) - 1) {
                $lines[] = '';
            }
        }

        $firstLineIndex = 0;
        if ($padding && $this->isDecorated()) {
            $firstLineIndex = 1;
            array_unshift($lines, '');
            $lines[] = '';
        }

        foreach ($lines as $i => &$line) {
            if (null !== $type) {
                $line = $firstLineIndex === $i ? $type.$line : $lineIndentation.$line;
            }

            $line = $prefix.$line;
            $line .= str_repeat(' ', max($this->lineLength - Helper::width(Helper::removeDecoration($this->getFormatter(), $line)), 0));

            if ($style) {
                $line = sprintf('<%s>%s</>', $style, $line);
            }
        }

        return $lines;
    }
}
