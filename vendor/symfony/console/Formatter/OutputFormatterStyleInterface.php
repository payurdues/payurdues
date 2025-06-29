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

/**
 * Formatter style interface for defining styles.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface OutputFormatterStyleInterface
{
    /**
     * Sets style foreground color.
<<<<<<< HEAD
     */
    public function setForeground(string $color = null);

    /**
     * Sets style background color.
     */
    public function setBackground(string $color = null);

    /**
     * Sets some specific style option.
=======
     *
     * @return void
     */
    public function setForeground(?string $color);

    /**
     * Sets style background color.
     *
     * @return void
     */
    public function setBackground(?string $color);

    /**
     * Sets some specific style option.
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setOption(string $option);

    /**
     * Unsets some specific style option.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function unsetOption(string $option);

    /**
     * Sets multiple style options at once.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setOptions(array $options);

    /**
     * Applies the style to a given text.
     */
    public function apply(string $text): string;
}
