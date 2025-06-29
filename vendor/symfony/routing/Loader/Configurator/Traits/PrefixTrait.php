<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader\Configurator\Traits;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * @internal
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
trait PrefixTrait
{
<<<<<<< HEAD
    final protected function addPrefix(RouteCollection $routes, string|array $prefix, bool $trailingSlashOnRoot)
=======
    final protected function addPrefix(RouteCollection $routes, string|array $prefix, bool $trailingSlashOnRoot): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (\is_array($prefix)) {
            foreach ($prefix as $locale => $localePrefix) {
                $prefix[$locale] = trim(trim($localePrefix), '/');
            }
            foreach ($routes->all() as $name => $route) {
                if (null === $locale = $route->getDefault('_locale')) {
<<<<<<< HEAD
=======
                    $priority = $routes->getPriority($name) ?? 0;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                    $routes->remove($name);
                    foreach ($prefix as $locale => $localePrefix) {
                        $localizedRoute = clone $route;
                        $localizedRoute->setDefault('_locale', $locale);
                        $localizedRoute->setRequirement('_locale', preg_quote($locale));
                        $localizedRoute->setDefault('_canonical_route', $name);
                        $localizedRoute->setPath($localePrefix.(!$trailingSlashOnRoot && '/' === $route->getPath() ? '' : $route->getPath()));
<<<<<<< HEAD
                        $routes->add($name.'.'.$locale, $localizedRoute);
=======
                        $routes->add($name.'.'.$locale, $localizedRoute, $priority);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                    }
                } elseif (!isset($prefix[$locale])) {
                    throw new \InvalidArgumentException(sprintf('Route "%s" with locale "%s" is missing a corresponding prefix in its parent collection.', $name, $locale));
                } else {
                    $route->setPath($prefix[$locale].(!$trailingSlashOnRoot && '/' === $route->getPath() ? '' : $route->getPath()));
<<<<<<< HEAD
                    $routes->add($name, $route);
=======
                    $routes->add($name, $route, $routes->getPriority($name) ?? 0);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                }
            }

            return;
        }

        $routes->addPrefix($prefix);
        if (!$trailingSlashOnRoot) {
            $rootPath = (new Route(trim(trim($prefix), '/').'/'))->getPath();
            foreach ($routes->all() as $route) {
                if ($route->getPath() === $rootPath) {
                    $route->setPath(rtrim($rootPath, '/'));
                }
            }
        }
    }
}
