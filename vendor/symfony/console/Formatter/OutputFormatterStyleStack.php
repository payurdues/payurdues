<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Formatter;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Contracts\Service\ResetInterface;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class OutputFormatterStyleStack implements ResetInterface
{
    /**
     * @var OutputFormatterStyleInterface[]
     */
    private array $styles = [];

<<<<<<< HEAD
    private $emptyStyle;

    public function __construct(OutputFormatterStyleInterface $emptyStyle = null)
=======
    private OutputFormatterStyleInterface $emptyStyle;

    public function __construct(?OutputFormatterStyleInterface $emptyStyle = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->emptyStyle = $emptyStyle ?? new OutputFormatterStyle();
        $this->reset();
    }

    /**
     * Resets stack (ie. empty internal arrays).
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function reset()
    {
        $this->styles = [];
    }

    /**
     * Pushes a style in the stack.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function push(OutputFormatterStyleInterface $style)
    {
        $this->styles[] = $style;
    }

    /**
     * Pops a style from the stack.
     *
     * @throws InvalidArgumentException When style tags incorrectly nested
     */
<<<<<<< HEAD
    public function pop(OutputFormatterStyleInterface $style = null): OutputFormatterStyleInterface
    {
        if (empty($this->styles)) {
=======
    public function pop(?OutputFormatterStyleInterface $style = null): OutputFormatterStyleInterface
    {
        if (!$this->styles) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            return $this->emptyStyle;
        }

        if (null === $style) {
            return array_pop($this->styles);
        }

        foreach (array_reverse($this->styles, true) as $index => $stackedStyle) {
            if ($style->apply('') === $stackedStyle->apply('')) {
                $this->styles = \array_slice($this->styles, 0, $index);

                return $stackedStyle;
            }
        }

        throw new InvalidArgumentException('Incorrectly nested style tag found.');
    }

    /**
     * Computes current style with stacks top codes.
     */
    public function getCurrent(): OutputFormatterStyleInterface
    {
<<<<<<< HEAD
        if (empty($this->styles)) {
=======
        if (!$this->styles) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            return $this->emptyStyle;
        }

        return $this->styles[\count($this->styles) - 1];
    }

    /**
     * @return $this
     */
    public function setEmptyStyle(OutputFormatterStyleInterface $emptyStyle): static
    {
        $this->emptyStyle = $emptyStyle;

        return $this;
    }

    public function getEmptyStyle(): OutputFormatterStyleInterface
    {
        return $this->emptyStyle;
    }
}
