<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Header;

/**
 * A Date MIME Header.
 *
 * @author Chris Corbyn
 */
final class DateHeader extends AbstractHeader
{
    private \DateTimeImmutable $dateTime;

    public function __construct(string $name, \DateTimeInterface $date)
    {
        parent::__construct($name);

        $this->setDateTime($date);
    }

    /**
     * @param \DateTimeInterface $body
     */
<<<<<<< HEAD
    public function setBody(mixed $body)
=======
    public function setBody(mixed $body): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->setDateTime($body);
    }

    public function getBody(): \DateTimeImmutable
    {
        return $this->getDateTime();
    }

    public function getDateTime(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

    /**
     * Set the date-time of the Date in this Header.
     *
     * If a DateTime instance is provided, it is converted to DateTimeImmutable.
     */
<<<<<<< HEAD
    public function setDateTime(\DateTimeInterface $dateTime)
    {
        if ($dateTime instanceof \DateTime) {
            $immutable = new \DateTimeImmutable('@'.$dateTime->getTimestamp());
            $dateTime = $immutable->setTimezone($dateTime->getTimezone());
        }
        $this->dateTime = $dateTime;
=======
    public function setDateTime(\DateTimeInterface $dateTime): void
    {
        $this->dateTime = \DateTimeImmutable::createFromInterface($dateTime);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    public function getBodyAsString(): string
    {
<<<<<<< HEAD
        return $this->dateTime->format(\DateTime::RFC2822);
=======
        return $this->dateTime->format(\DateTimeInterface::RFC2822);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
