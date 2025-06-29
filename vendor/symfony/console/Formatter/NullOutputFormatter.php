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
 * @author Tien Xuan Vo <tien.xuan.vo@gmail.com>
 */
final class NullOutputFormatter implements OutputFormatterInterface
{
<<<<<<< HEAD
    private $style;

    /**
     * {@inheritdoc}
     */
=======
    private NullOutputFormatterStyle $style;

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function format(?string $message): ?string
    {
        return null;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getStyle(string $name): OutputFormatterStyleInterface
    {
        // to comply with the interface we must return a OutputFormatterStyleInterface
        return $this->style ?? $this->style = new NullOutputFormatterStyle();
    }

    /**
     * {@inheritdoc}
     */
=======
    public function getStyle(string $name): OutputFormatterStyleInterface
    {
        // to comply with the interface we must return a OutputFormatterStyleInterface
        return $this->style ??= new NullOutputFormatterStyle();
    }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function hasStyle(string $name): bool
    {
        return false;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isDecorated(): bool
    {
        return false;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setDecorated(bool $decorated): void
    {
        // do nothing
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function setStyle(string $name, OutputFormatterStyleInterface $style): void
    {
        // do nothing
    }
}
