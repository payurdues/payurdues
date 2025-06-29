<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Input;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\RuntimeException;

/**
 * Input is the base class for all concrete Input classes.
 *
 * Three concrete classes are provided by default:
 *
 *  * `ArgvInput`: The input comes from the CLI arguments (argv)
 *  * `StringInput`: The input is provided as a string
 *  * `ArrayInput`: The input is provided as an array
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class Input implements InputInterface, StreamableInputInterface
{
    protected $definition;
<<<<<<< HEAD
=======
    /** @var resource */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected $stream;
    protected $options = [];
    protected $arguments = [];
    protected $interactive = true;

<<<<<<< HEAD
    public function __construct(InputDefinition $definition = null)
=======
    public function __construct(?InputDefinition $definition = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (null === $definition) {
            $this->definition = new InputDefinition();
        } else {
            $this->bind($definition);
            $this->validate();
        }
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function bind(InputDefinition $definition)
    {
        $this->arguments = [];
        $this->options = [];
        $this->definition = $definition;

        $this->parse();
    }

    /**
     * Processes command line arguments.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    abstract protected function parse();

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function validate()
    {
        $definition = $this->definition;
        $givenArguments = $this->arguments;

<<<<<<< HEAD
        $missingArguments = array_filter(array_keys($definition->getArguments()), function ($argument) use ($definition, $givenArguments) {
            return !\array_key_exists($argument, $givenArguments) && $definition->getArgument($argument)->isRequired();
        });
=======
        $missingArguments = array_filter(array_keys($definition->getArguments()), fn ($argument) => !\array_key_exists($argument, $givenArguments) && $definition->getArgument($argument)->isRequired());
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        if (\count($missingArguments) > 0) {
            throw new RuntimeException(sprintf('Not enough arguments (missing: "%s").', implode(', ', $missingArguments)));
        }
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isInteractive(): bool
    {
        return $this->interactive;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setInteractive(bool $interactive)
    {
        $this->interactive = $interactive;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getArguments(): array
    {
        return array_merge($this->definition->getArgumentDefaults(), $this->arguments);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getArgument(string $name): mixed
    {
        if (!$this->definition->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

        return $this->arguments[$name] ?? $this->definition->getArgument($name)->getDefault();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setArgument(string $name, mixed $value)
    {
        if (!$this->definition->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

        $this->arguments[$name] = $value;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function hasArgument(string $name): bool
    {
        return $this->definition->hasArgument($name);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getOptions(): array
    {
        return array_merge($this->definition->getOptionDefaults(), $this->options);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getOption(string $name): mixed
    {
        if ($this->definition->hasNegation($name)) {
            if (null === $value = $this->getOption($this->definition->negationToName($name))) {
                return $value;
            }

            return !$value;
        }

        if (!$this->definition->hasOption($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" option does not exist.', $name));
        }

        return \array_key_exists($name, $this->options) ? $this->options[$name] : $this->definition->getOption($name)->getDefault();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setOption(string $name, mixed $value)
    {
        if ($this->definition->hasNegation($name)) {
            $this->options[$this->definition->negationToName($name)] = !$value;

            return;
        } elseif (!$this->definition->hasOption($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" option does not exist.', $name));
        }

        $this->options[$name] = $value;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function hasOption(string $name): bool
    {
        return $this->definition->hasOption($name) || $this->definition->hasNegation($name);
    }

    /**
     * Escapes a token through escapeshellarg if it contains unsafe chars.
     */
    public function escapeToken(string $token): string
    {
        return preg_match('{^[\w-]+$}', $token) ? $token : escapeshellarg($token);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @param resource $stream
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setStream($stream)
    {
        $this->stream = $stream;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return resource
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function getStream()
    {
        return $this->stream;
    }
}
