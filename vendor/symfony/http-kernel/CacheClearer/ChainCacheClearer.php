<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\CacheClearer;

/**
 * ChainCacheClearer.
 *
 * @author Dustin Dobervich <ddobervich@gmail.com>
 *
 * @final
 */
class ChainCacheClearer implements CacheClearerInterface
{
    private iterable $clearers;

    /**
     * @param iterable<mixed, CacheClearerInterface> $clearers
     */
    public function __construct(iterable $clearers = [])
    {
        $this->clearers = $clearers;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function clear(string $cacheDir)
=======
    public function clear(string $cacheDir): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        foreach ($this->clearers as $clearer) {
            $clearer->clear($cacheDir);
        }
    }
}
