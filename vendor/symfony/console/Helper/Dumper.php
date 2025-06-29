<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\VarDumper\Cloner\ClonerInterface;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class Dumper
{
<<<<<<< HEAD
    private $output;
    private $dumper;
    private $cloner;
    private \Closure $handler;

    public function __construct(OutputInterface $output, CliDumper $dumper = null, ClonerInterface $cloner = null)
=======
    private OutputInterface $output;
    private ?CliDumper $dumper;
    private ?ClonerInterface $cloner;
    private \Closure $handler;

    public function __construct(OutputInterface $output, ?CliDumper $dumper = null, ?ClonerInterface $cloner = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->output = $output;
        $this->dumper = $dumper;
        $this->cloner = $cloner;

        if (class_exists(CliDumper::class)) {
            $this->handler = function ($var): string {
<<<<<<< HEAD
                $dumper = $this->dumper ?? $this->dumper = new CliDumper(null, null, CliDumper::DUMP_LIGHT_ARRAY | CliDumper::DUMP_COMMA_SEPARATOR);
                $dumper->setColors($this->output->isDecorated());

                return rtrim($dumper->dump(($this->cloner ?? $this->cloner = new VarCloner())->cloneVar($var)->withRefHandles(false), true));
            };
        } else {
            $this->handler = function ($var): string {
                switch (true) {
                    case null === $var:
                        return 'null';
                    case true === $var:
                        return 'true';
                    case false === $var:
                        return 'false';
                    case \is_string($var):
                        return '"'.$var.'"';
                    default:
                        return rtrim(print_r($var, true));
                }
=======
                $dumper = $this->dumper ??= new CliDumper(null, null, CliDumper::DUMP_LIGHT_ARRAY | CliDumper::DUMP_COMMA_SEPARATOR);
                $dumper->setColors($this->output->isDecorated());

                return rtrim($dumper->dump(($this->cloner ??= new VarCloner())->cloneVar($var)->withRefHandles(false), true));
            };
        } else {
            $this->handler = fn ($var): string => match (true) {
                null === $var => 'null',
                true === $var => 'true',
                false === $var => 'false',
                \is_string($var) => '"'.$var.'"',
                default => rtrim(print_r($var, true)),
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            };
        }
    }

    public function __invoke(mixed $var): string
    {
        return ($this->handler)($var);
    }
}
