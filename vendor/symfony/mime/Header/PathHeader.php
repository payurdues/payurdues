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

use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Exception\RfcComplianceException;

/**
 * A Path Header, such a Return-Path (one address).
 *
 * @author Chris Corbyn
 */
final class PathHeader extends AbstractHeader
{
<<<<<<< HEAD
    private $address;
=======
    private Address $address;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(string $name, Address $address)
    {
        parent::__construct($name);

        $this->setAddress($address);
    }

    /**
     * @param Address $body
     *
     * @throws RfcComplianceException
     */
<<<<<<< HEAD
    public function setBody(mixed $body)
=======
    public function setBody(mixed $body): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->setAddress($body);
    }

    public function getBody(): Address
    {
        return $this->getAddress();
    }

<<<<<<< HEAD
    public function setAddress(Address $address)
=======
    public function setAddress(Address $address): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->address = $address;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getBodyAsString(): string
    {
<<<<<<< HEAD
        return '<'.$this->address->toString().'>';
=======
        return '<'.$this->address->getEncodedAddress().'>';
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
