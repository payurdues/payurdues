<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Provider;

use Symfony\Component\Translation\TranslatorBag;
use Symfony\Component\Translation\TranslatorBagInterface;

<<<<<<< HEAD
interface ProviderInterface
{
    public function __toString(): string;

=======
interface ProviderInterface extends \Stringable
{
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    /**
     * Translations available in the TranslatorBag only must be created.
     * Translations available in both the TranslatorBag and on the provider
     * must be overwritten.
     * Translations available on the provider only must be kept.
     */
    public function write(TranslatorBagInterface $translatorBag): void;

    public function read(array $domains, array $locales): TranslatorBag;

    public function delete(TranslatorBagInterface $translatorBag): void;
}
