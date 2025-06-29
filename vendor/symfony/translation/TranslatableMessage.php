<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @author Nate Wiebe <nate@northern.co>
 */
class TranslatableMessage implements TranslatableInterface
{
    private string $message;
    private array $parameters;
    private ?string $domain;

<<<<<<< HEAD
    public function __construct(string $message, array $parameters = [], string $domain = null)
=======
    public function __construct(string $message, array $parameters = [], ?string $domain = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->message = $message;
        $this->parameters = $parameters;
        $this->domain = $domain;
    }

    public function __toString(): string
    {
        return $this->getMessage();
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

<<<<<<< HEAD
    public function trans(TranslatorInterface $translator, string $locale = null): string
    {
        return $translator->trans($this->getMessage(), array_map(
            static function ($parameter) use ($translator, $locale) {
                return $parameter instanceof TranslatableInterface ? $parameter->trans($translator, $locale) : $parameter;
            },
=======
    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return $translator->trans($this->getMessage(), array_map(
            static fn ($parameter) => $parameter instanceof TranslatableInterface ? $parameter->trans($translator, $locale) : $parameter,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $this->getParameters()
        ), $this->getDomain(), $locale);
    }
}
