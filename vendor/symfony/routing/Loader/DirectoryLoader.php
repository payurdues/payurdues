<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Config\Resource\DirectoryResource;
use Symfony\Component\Routing\RouteCollection;

class DirectoryLoader extends FileLoader
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function load(mixed $file, string $type = null): mixed
=======
    public function load(mixed $file, ?string $type = null): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $path = $this->locator->locate($file);

        $collection = new RouteCollection();
        $collection->addResource(new DirectoryResource($path));

        foreach (scandir($path) as $dir) {
            if ('.' !== $dir[0]) {
                $this->setCurrentDir($path);
                $subPath = $path.'/'.$dir;
                $subType = null;

                if (is_dir($subPath)) {
                    $subPath .= '/';
                    $subType = 'directory';
                }

                $subCollection = $this->import($subPath, $subType, false, $path);
                $collection->addCollection($subCollection);
            }
        }

        return $collection;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function supports(mixed $resource, string $type = null): bool
    {
        // only when type is forced to directory, not to conflict with AnnotationLoader
=======
    public function supports(mixed $resource, ?string $type = null): bool
    {
        // only when type is forced to directory, not to conflict with AttributeLoader
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        return 'directory' === $type;
    }
}
