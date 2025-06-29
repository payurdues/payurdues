<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Iterator;

<<<<<<< HEAD
=======
use Symfony\Component\Finder\SplFileInfo;

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
/**
 * PathFilterIterator filters files by path patterns (e.g. some/special/dir).
 *
 * @author Fabien Potencier  <fabien@symfony.com>
 * @author Włodzimierz Gajda <gajdaw@gajdaw.pl>
 *
<<<<<<< HEAD
 * @extends MultiplePcreFilterIterator<string, \SplFileInfo>
=======
 * @extends MultiplePcreFilterIterator<string, SplFileInfo>
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 */
class PathFilterIterator extends MultiplePcreFilterIterator
{
    /**
     * Filters the iterator values.
     */
    public function accept(): bool
    {
        $filename = $this->current()->getRelativePathname();

        if ('\\' === \DIRECTORY_SEPARATOR) {
            $filename = str_replace('\\', '/', $filename);
        }

        return $this->isAccepted($filename);
    }

    /**
     * Converts strings to regexp.
     *
     * PCRE patterns are left unchanged.
     *
     * Default conversion:
     *     'lorem/ipsum/dolor' ==>  'lorem\/ipsum\/dolor/'
     *
     * Use only / as directory separator (on Windows also).
     *
     * @param string $str Pattern: regexp or dirname
     */
    protected function toRegex(string $str): string
    {
        return $this->isRegex($str) ? $str : '/'.preg_quote($str, '/').'/';
    }
}
