<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\String\Slugger;

use Symfony\Component\String\AbstractUnicodeString;

/**
 * Creates a URL-friendly slug from a given string.
 *
 * @author Titouan Galopin <galopintitouan@gmail.com>
 */
interface SluggerInterface
{
    /**
     * Creates a slug for the given string and locale, using appropriate transliteration when needed.
     */
<<<<<<< HEAD
    public function slug(string $string, string $separator = '-', string $locale = null): AbstractUnicodeString;
=======
    public function slug(string $string, string $separator = '-', ?string $locale = null): AbstractUnicodeString;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
