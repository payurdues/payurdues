<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Attribute;

/**
<<<<<<< HEAD
 * Service tag to autoconfigure controllers.
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
=======
 * Autoconfigures controllers as services by applying
 * the `controller.service_arguments` tag to them.
 *
 * This enables injecting services as method arguments in addition
 * to other conventional dependency injection strategies.
 */
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_FUNCTION)]
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
class AsController
{
    public function __construct()
    {
    }
}
