<?php

declare(strict_types=1);

namespace Doctrine\Common\Lexer;

use ReflectionClass;
use UnitEnum;

<<<<<<< HEAD
use function get_class;
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use function implode;
use function preg_split;
use function sprintf;
use function substr;

use const PREG_SPLIT_DELIM_CAPTURE;
use const PREG_SPLIT_NO_EMPTY;
use const PREG_SPLIT_OFFSET_CAPTURE;

/**
 * Base class for writing simple lexers, i.e. for creating small DSLs.
 *
 * @template T of UnitEnum|string|int
 * @template V of string|int
 */
abstract class AbstractLexer
{
    /**
     * Lexer original input string.
<<<<<<< HEAD
     *
     * @var string
     */
    private $input;
=======
     */
    private string $input;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Array of scanned tokens.
     *
     * @var list<Token<T, V>>
     */
<<<<<<< HEAD
    private $tokens = [];

    /**
     * Current lexer position in input string.
     *
     * @var int
     */
    private $position = 0;

    /**
     * Current peek of current lexer position.
     *
     * @var int
     */
    private $peek = 0;
=======
    private array $tokens = [];

    /**
     * Current lexer position in input string.
     */
    private int $position = 0;

    /**
     * Current peek of current lexer position.
     */
    private int $peek = 0;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * The next token in the input.
     *
     * @var Token<T, V>|null
     */
<<<<<<< HEAD
    public $lookahead;
=======
    public Token|null $lookahead;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * The last matched/seen token.
     *
     * @var Token<T, V>|null
     */
<<<<<<< HEAD
    public $token;
=======
    public Token|null $token;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Composed regex for input parsing.
     *
     * @var non-empty-string|null
     */
<<<<<<< HEAD
    private $regex;
=======
    private string|null $regex = null;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Sets the input data to be tokenized.
     *
     * The Lexer is immediately reset and the new input tokenized.
     * Any unprocessed tokens from any previous input are lost.
     *
     * @param string $input The input to be tokenized.
     *
     * @return void
     */
<<<<<<< HEAD
    public function setInput($input)
=======
    public function setInput(string $input)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->input  = $input;
        $this->tokens = [];

        $this->reset();
        $this->scan($input);
    }

    /**
     * Resets the lexer.
     *
     * @return void
     */
    public function reset()
    {
        $this->lookahead = null;
        $this->token     = null;
        $this->peek      = 0;
        $this->position  = 0;
    }

    /**
     * Resets the peek pointer to 0.
     *
     * @return void
     */
    public function resetPeek()
    {
        $this->peek = 0;
    }

    /**
     * Resets the lexer position on the input to the given position.
     *
     * @param int $position Position to place the lexical scanner.
     *
     * @return void
     */
<<<<<<< HEAD
    public function resetPosition($position = 0)
=======
    public function resetPosition(int $position = 0)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->position = $position;
    }

    /**
     * Retrieve the original lexer's input until a given position.
     *
<<<<<<< HEAD
     * @param int $position
     *
     * @return string
     */
    public function getInputUntilPosition($position)
=======
     * @return string
     */
    public function getInputUntilPosition(int $position)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return substr($this->input, 0, $position);
    }

    /**
     * Checks whether a given token matches the current lookahead.
     *
     * @param T $type
     *
     * @return bool
     *
     * @psalm-assert-if-true !=null $this->lookahead
     */
<<<<<<< HEAD
    public function isNextToken($type)
=======
    public function isNextToken(int|string|UnitEnum $type)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->lookahead !== null && $this->lookahead->isA($type);
    }

    /**
     * Checks whether any of the given tokens matches the current lookahead.
     *
     * @param list<T> $types
     *
     * @return bool
     *
     * @psalm-assert-if-true !=null $this->lookahead
     */
    public function isNextTokenAny(array $types)
    {
        return $this->lookahead !== null && $this->lookahead->isA(...$types);
    }

    /**
     * Moves to the next token in the input string.
     *
     * @return bool
     *
     * @psalm-assert-if-true !null $this->lookahead
     */
    public function moveNext()
    {
        $this->peek      = 0;
        $this->token     = $this->lookahead;
        $this->lookahead = isset($this->tokens[$this->position])
            ? $this->tokens[$this->position++] : null;

        return $this->lookahead !== null;
    }

    /**
     * Tells the lexer to skip input tokens until it sees a token with the given value.
     *
     * @param T $type The token type to skip until.
     *
     * @return void
     */
<<<<<<< HEAD
    public function skipUntil($type)
=======
    public function skipUntil(int|string|UnitEnum $type)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        while ($this->lookahead !== null && ! $this->lookahead->isA($type)) {
            $this->moveNext();
        }
    }

    /**
     * Checks if given value is identical to the given token.
     *
<<<<<<< HEAD
     * @param string     $value
     * @param int|string $token
     *
     * @return bool
     */
    public function isA($value, $token)
=======
     * @return bool
     */
    public function isA(string $value, int|string|UnitEnum $token)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        return $this->getType($value) === $token;
    }

    /**
     * Moves the lookahead token forward.
     *
     * @return Token<T, V>|null The next token or NULL if there are no more tokens ahead.
     */
    public function peek()
    {
        if (isset($this->tokens[$this->position + $this->peek])) {
            return $this->tokens[$this->position + $this->peek++];
        }

        return null;
    }

    /**
     * Peeks at the next token, returns it and immediately resets the peek.
     *
     * @return Token<T, V>|null The next token or NULL if there are no more tokens ahead.
     */
    public function glimpse()
    {
        $peek       = $this->peek();
        $this->peek = 0;

        return $peek;
    }

    /**
     * Scans the input string for tokens.
     *
     * @param string $input A query string.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function scan($input)
=======
    protected function scan(string $input)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (! isset($this->regex)) {
            $this->regex = sprintf(
                '/(%s)|%s/%s',
                implode(')|(', $this->getCatchablePatterns()),
                implode('|', $this->getNonCatchablePatterns()),
<<<<<<< HEAD
                $this->getModifiers()
=======
                $this->getModifiers(),
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            );
        }

        $flags   = PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_OFFSET_CAPTURE;
        $matches = preg_split($this->regex, $input, -1, $flags);

        if ($matches === false) {
            // Work around https://bugs.php.net/78122
            $matches = [[$input, 0]];
        }

        foreach ($matches as $match) {
            // Must remain before 'value' assignment since it can change content
            $firstMatch = $match[0];
            $type       = $this->getType($firstMatch);

            $this->tokens[] = new Token(
                $firstMatch,
                $type,
<<<<<<< HEAD
                $match[1]
=======
                $match[1],
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            );
        }
    }

    /**
     * Gets the literal for a given token.
     *
     * @param T $token
     *
     * @return int|string
     */
<<<<<<< HEAD
    public function getLiteral($token)
    {
        if ($token instanceof UnitEnum) {
            return get_class($token) . '::' . $token->name;
=======
    public function getLiteral(int|string|UnitEnum $token)
    {
        if ($token instanceof UnitEnum) {
            return $token::class . '::' . $token->name;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $className = static::class;

        $reflClass = new ReflectionClass($className);
        $constants = $reflClass->getConstants();

        foreach ($constants as $name => $value) {
            if ($value === $token) {
                return $className . '::' . $name;
            }
        }

        return $token;
    }

    /**
     * Regex modifiers
     *
     * @return string
     */
    protected function getModifiers()
    {
        return 'iu';
    }

    /**
     * Lexical catchable patterns.
     *
     * @return string[]
     */
    abstract protected function getCatchablePatterns();

    /**
     * Lexical non-catchable patterns.
     *
     * @return string[]
     */
    abstract protected function getNonCatchablePatterns();

    /**
     * Retrieve token type. Also processes the token value if necessary.
     *
<<<<<<< HEAD
     * @param string $value
     *
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * @return T|null
     *
     * @param-out V $value
     */
<<<<<<< HEAD
    abstract protected function getType(&$value);
=======
    abstract protected function getType(string &$value);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
