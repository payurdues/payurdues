<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * CsvFileLoader loads translations from CSV files.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class CsvFileLoader extends FileLoader
{
    private string $delimiter = ';';
    private string $enclosure = '"';
<<<<<<< HEAD
    private string $escape = '\\';

    /**
     * {@inheritdoc}
     */
=======
    private string $escape = '';

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    protected function loadResource(string $resource): array
    {
        $messages = [];

        try {
            $file = new \SplFileObject($resource, 'rb');
        } catch (\RuntimeException $e) {
            throw new NotFoundResourceException(sprintf('Error opening file "%s".', $resource), 0, $e);
        }

        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);
        $file->setCsvControl($this->delimiter, $this->enclosure, $this->escape);

        foreach ($file as $data) {
            if (false === $data) {
                continue;
            }

<<<<<<< HEAD
            if ('#' !== substr($data[0], 0, 1) && isset($data[1]) && 2 === \count($data)) {
=======
            if (!str_starts_with($data[0], '#') && isset($data[1]) && 2 === \count($data)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                $messages[$data[0]] = $data[1];
            }
        }

        return $messages;
    }

    /**
     * Sets the delimiter, enclosure, and escape character for CSV.
<<<<<<< HEAD
     */
    public function setCsvControl(string $delimiter = ';', string $enclosure = '"', string $escape = '\\')
=======
     *
     * @return void
     */
    public function setCsvControl(string $delimiter = ';', string $enclosure = '"', string $escape = '')
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->escape = $escape;
    }
}
