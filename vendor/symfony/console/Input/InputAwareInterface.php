<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Input;

/**
 * InputAwareInterface should be implemented by classes that depends on the
 * Console Input.
 *
 * @author Wouter J <waldio.webdesign@gmail.com>
 */
interface InputAwareInterface
{
    /**
     * Sets the Console Input.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setInput(InputInterface $input);
}
