<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Fragment;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerReference;

/**
<<<<<<< HEAD
 * Interface implemented by rendering strategies able to generate an URL for a fragment.
=======
 * Interface implemented by rendering strategies able to generate a URL for a fragment.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
 *
 * @author Kévin Dunglas <kevin@dunglas.fr>
 */
interface FragmentUriGeneratorInterface
{
    /**
     * Generates a fragment URI for a given controller.
     *
     * @param bool $absolute Whether to generate an absolute URL or not
     * @param bool $strict   Whether to allow non-scalar attributes or not
     * @param bool $sign     Whether to sign the URL or not
     */
<<<<<<< HEAD
    public function generate(ControllerReference $controller, Request $request = null, bool $absolute = false, bool $strict = true, bool $sign = true): string;
=======
    public function generate(ControllerReference $controller, ?Request $request = null, bool $absolute = false, bool $strict = true, bool $sign = true): string;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
