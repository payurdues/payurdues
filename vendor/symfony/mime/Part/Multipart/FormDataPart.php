<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Part\Multipart;

use Symfony\Component\Mime\Exception\InvalidArgumentException;
use Symfony\Component\Mime\Part\AbstractMultipartPart;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\TextPart;

/**
 * Implements RFC 7578.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
final class FormDataPart extends AbstractMultipartPart
{
<<<<<<< HEAD
    private $fields = [];

    /**
     * @param array<string|array|DataPart> $fields
=======
    private array $fields = [];

    /**
     * @param array<string|array|TextPart> $fields
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function __construct(array $fields = [])
    {
        parent::__construct();

<<<<<<< HEAD
        foreach ($fields as $name => $value) {
            if (!\is_string($value) && !\is_array($value) && !$value instanceof TextPart) {
                throw new InvalidArgumentException(sprintf('A form field value can only be a string, an array, or an instance of TextPart ("%s" given).', get_debug_type($value)));
            }

            $this->fields[$name] = $value;
        }
=======
        $this->fields = $fields;

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        // HTTP does not support \r\n in header values
        $this->getHeaders()->setMaxLineLength(\PHP_INT_MAX);
    }

    public function getMediaSubtype(): string
    {
        return 'form-data';
    }

    public function getParts(): array
    {
        return $this->prepareFields($this->fields);
    }

    private function prepareFields(array $fields): array
    {
        $values = [];

        $prepare = function ($item, $key, $root = null) use (&$values, &$prepare) {
<<<<<<< HEAD
            if (\is_int($key) && \is_array($item)) {
=======
            if (null === $root && \is_int($key) && \is_array($item)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                if (1 !== \count($item)) {
                    throw new InvalidArgumentException(sprintf('Form field values with integer keys can only have one array element, the key being the field name and the value being the field value, %d provided.', \count($item)));
                }

                $key = key($item);
                $item = $item[$key];
            }

            $fieldName = null !== $root ? sprintf('%s[%s]', $root, $key) : $key;

            if (\is_array($item)) {
                array_walk($item, $prepare, $fieldName);

                return;
            }

<<<<<<< HEAD
=======
            if (!\is_string($item) && !$item instanceof TextPart) {
                throw new InvalidArgumentException(sprintf('The value of the form field "%s" can only be a string, an array, or an instance of TextPart, "%s" given.', $fieldName, get_debug_type($item)));
            }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $values[] = $this->preparePart($fieldName, $item);
        };

        array_walk($fields, $prepare);

        return $values;
    }

    private function preparePart(string $name, string|TextPart $value): TextPart
    {
        if (\is_string($value)) {
            return $this->configurePart($name, new TextPart($value, 'utf-8', 'plain', '8bit'));
        }

        return $this->configurePart($name, $value);
    }

    private function configurePart(string $name, TextPart $part): TextPart
    {
        static $r;

<<<<<<< HEAD
        if (null === $r) {
            $r = new \ReflectionProperty(TextPart::class, 'encoding');
            $r->setAccessible(true);
        }
=======
        $r ??= new \ReflectionProperty(TextPart::class, 'encoding');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        $part->setDisposition('form-data');
        $part->setName($name);
        // HTTP does not support \r\n in header values
        $part->getHeaders()->setMaxLineLength(\PHP_INT_MAX);
        $r->setValue($part, '8bit');

        return $part;
    }
}
