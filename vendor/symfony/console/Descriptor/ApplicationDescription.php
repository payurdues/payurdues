<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Descriptor;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\CommandNotFoundException;

/**
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class ApplicationDescription
{
    public const GLOBAL_NAMESPACE = '_global';

<<<<<<< HEAD
    private $application;
=======
    private Application $application;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    private ?string $namespace;
    private bool $showHidden;
    private array $namespaces;

    /**
     * @var array<string, Command>
     */
    private array $commands;

    /**
     * @var array<string, Command>
     */
    private array $aliases = [];

<<<<<<< HEAD
    public function __construct(Application $application, string $namespace = null, bool $showHidden = false)
=======
    public function __construct(Application $application, ?string $namespace = null, bool $showHidden = false)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->application = $application;
        $this->namespace = $namespace;
        $this->showHidden = $showHidden;
    }

    public function getNamespaces(): array
    {
        if (!isset($this->namespaces)) {
            $this->inspectApplication();
        }

        return $this->namespaces;
    }

    /**
     * @return Command[]
     */
    public function getCommands(): array
    {
        if (!isset($this->commands)) {
            $this->inspectApplication();
        }

        return $this->commands;
    }

    /**
     * @throws CommandNotFoundException
     */
    public function getCommand(string $name): Command
    {
        if (!isset($this->commands[$name]) && !isset($this->aliases[$name])) {
            throw new CommandNotFoundException(sprintf('Command "%s" does not exist.', $name));
        }

        return $this->commands[$name] ?? $this->aliases[$name];
    }

<<<<<<< HEAD
    private function inspectApplication()
=======
    private function inspectApplication(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->commands = [];
        $this->namespaces = [];

        $all = $this->application->all($this->namespace ? $this->application->findNamespace($this->namespace) : null);
        foreach ($this->sortCommands($all) as $namespace => $commands) {
            $names = [];

            /** @var Command $command */
            foreach ($commands as $name => $command) {
                if (!$command->getName() || (!$this->showHidden && $command->isHidden())) {
                    continue;
                }

                if ($command->getName() === $name) {
                    $this->commands[$name] = $command;
                } else {
                    $this->aliases[$name] = $command;
                }

                $names[] = $name;
            }

            $this->namespaces[$namespace] = ['id' => $namespace, 'commands' => $names];
        }
    }

    private function sortCommands(array $commands): array
    {
        $namespacedCommands = [];
        $globalCommands = [];
        $sortedCommands = [];
        foreach ($commands as $name => $command) {
            $key = $this->application->extractNamespace($name, 1);
            if (\in_array($key, ['', self::GLOBAL_NAMESPACE], true)) {
                $globalCommands[$name] = $command;
            } else {
                $namespacedCommands[$key][$name] = $command;
            }
        }

        if ($globalCommands) {
            ksort($globalCommands);
            $sortedCommands[self::GLOBAL_NAMESPACE] = $globalCommands;
        }

        if ($namespacedCommands) {
            ksort($namespacedCommands, \SORT_STRING);
            foreach ($namespacedCommands as $key => $commandsSet) {
                ksort($commandsSet);
                $sortedCommands[$key] = $commandsSet;
            }
        }

        return $sortedCommands;
    }
}
