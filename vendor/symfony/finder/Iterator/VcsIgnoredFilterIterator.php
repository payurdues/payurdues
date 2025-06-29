<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Iterator;

use Symfony\Component\Finder\Gitignore;

<<<<<<< HEAD
final class VcsIgnoredFilterIterator extends \FilterIterator
{
    /**
     * @var string
     */
    private $baseDir;
=======
/**
 * @extends \FilterIterator<string, \SplFileInfo>
 */
final class VcsIgnoredFilterIterator extends \FilterIterator
{
    private string $baseDir;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * @var array<string, array{0: string, 1: string}|null>
     */
<<<<<<< HEAD
    private $gitignoreFilesCache = [];
=======
    private array $gitignoreFilesCache = [];
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * @var array<string, bool>
     */
<<<<<<< HEAD
    private $ignoredPathsCache = [];

=======
    private array $ignoredPathsCache = [];

    /**
     * @param \Iterator<string, \SplFileInfo> $iterator
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function __construct(\Iterator $iterator, string $baseDir)
    {
        $this->baseDir = $this->normalizePath($baseDir);

<<<<<<< HEAD
=======
        foreach ([$this->baseDir, ...$this->parentDirectoriesUpwards($this->baseDir)] as $directory) {
            if (@is_dir("{$directory}/.git")) {
                $this->baseDir = $directory;
                break;
            }
        }

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        parent::__construct($iterator);
    }

    public function accept(): bool
    {
        $file = $this->current();

        $fileRealPath = $this->normalizePath($file->getRealPath());

        return !$this->isIgnored($fileRealPath);
    }

    private function isIgnored(string $fileRealPath): bool
    {
        if (is_dir($fileRealPath) && !str_ends_with($fileRealPath, '/')) {
            $fileRealPath .= '/';
        }

        if (isset($this->ignoredPathsCache[$fileRealPath])) {
            return $this->ignoredPathsCache[$fileRealPath];
        }

        $ignored = false;

<<<<<<< HEAD
        foreach ($this->parentsDirectoryDownward($fileRealPath) as $parentDirectory) {
=======
        foreach ($this->parentDirectoriesDownwards($fileRealPath) as $parentDirectory) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            if ($this->isIgnored($parentDirectory)) {
                // rules in ignored directories are ignored, no need to check further.
                break;
            }

            $fileRelativePath = substr($fileRealPath, \strlen($parentDirectory) + 1);

            if (null === $regexps = $this->readGitignoreFile("{$parentDirectory}/.gitignore")) {
                continue;
            }

            [$exclusionRegex, $inclusionRegex] = $regexps;

            if (preg_match($exclusionRegex, $fileRelativePath)) {
                $ignored = true;

                continue;
            }

            if (preg_match($inclusionRegex, $fileRelativePath)) {
                $ignored = false;
            }
        }

        return $this->ignoredPathsCache[$fileRealPath] = $ignored;
    }

    /**
     * @return list<string>
     */
<<<<<<< HEAD
    private function parentsDirectoryDownward(string $fileRealPath): array
    {
        $parentDirectories = [];

        $parentDirectory = $fileRealPath;
=======
    private function parentDirectoriesUpwards(string $from): array
    {
        $parentDirectories = [];

        $parentDirectory = $from;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        while (true) {
            $newParentDirectory = \dirname($parentDirectory);

            // dirname('/') = '/'
            if ($newParentDirectory === $parentDirectory) {
                break;
            }

<<<<<<< HEAD
            $parentDirectory = $newParentDirectory;

            if (0 !== strpos($parentDirectory, $this->baseDir)) {
                break;
            }

            $parentDirectories[] = $parentDirectory;
        }

        return array_reverse($parentDirectories);
=======
            $parentDirectories[] = $parentDirectory = $newParentDirectory;
        }

        return $parentDirectories;
    }

    private function parentDirectoriesUpTo(string $from, string $upTo): array
    {
        return array_filter(
            $this->parentDirectoriesUpwards($from),
            static fn (string $directory): bool => str_starts_with($directory, $upTo)
        );
    }

    /**
     * @return list<string>
     */
    private function parentDirectoriesDownwards(string $fileRealPath): array
    {
        return array_reverse(
            $this->parentDirectoriesUpTo($fileRealPath, $this->baseDir)
        );
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * @return array{0: string, 1: string}|null
     */
    private function readGitignoreFile(string $path): ?array
    {
        if (\array_key_exists($path, $this->gitignoreFilesCache)) {
            return $this->gitignoreFilesCache[$path];
        }

        if (!file_exists($path)) {
            return $this->gitignoreFilesCache[$path] = null;
        }

        if (!is_file($path) || !is_readable($path)) {
            throw new \RuntimeException("The \"ignoreVCSIgnored\" option cannot be used by the Finder as the \"{$path}\" file is not readable.");
        }

        $gitignoreFileContent = file_get_contents($path);

        return $this->gitignoreFilesCache[$path] = [
            Gitignore::toRegex($gitignoreFileContent),
            Gitignore::toRegexMatchingNegatedPatterns($gitignoreFileContent),
        ];
    }

    private function normalizePath(string $path): string
    {
        if ('\\' === \DIRECTORY_SEPARATOR) {
            return str_replace('\\', '/', $path);
        }

        return $path;
    }
}
