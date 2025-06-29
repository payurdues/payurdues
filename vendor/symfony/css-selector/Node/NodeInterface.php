<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Node;

/**
 * Interface for nodes.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
<<<<<<< HEAD
interface NodeInterface
=======
interface NodeInterface extends \Stringable
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
{
    public function getNodeName(): string;

    public function getSpecificity(): Specificity;
<<<<<<< HEAD

    public function __toString(): string;
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
