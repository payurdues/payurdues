<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Dumper;

use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\Dumper\ContextProvider\ContextProviderInterface;

/**
 * @author Kévin Thérage <therage.kevin@gmail.com>
 */
class ContextualizedDumper implements DataDumperInterface
{
<<<<<<< HEAD
    private $wrappedDumper;
=======
    private DataDumperInterface $wrappedDumper;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    private array $contextProviders;

    /**
     * @param ContextProviderInterface[] $contextProviders
     */
    public function __construct(DataDumperInterface $wrappedDumper, array $contextProviders)
    {
        $this->wrappedDumper = $wrappedDumper;
        $this->contextProviders = $contextProviders;
    }

<<<<<<< HEAD
    public function dump(Data $data)
    {
        $context = [];
        foreach ($this->contextProviders as $contextProvider) {
            $context[\get_class($contextProvider)] = $contextProvider->getContext();
        }

        $this->wrappedDumper->dump($data->withContext($context));
=======
    /**
     * @return string|null
     */
    public function dump(Data $data)
    {
        $context = $data->getContext();
        foreach ($this->contextProviders as $contextProvider) {
            $context[$contextProvider::class] = $contextProvider->getContext();
        }

        return $this->wrappedDumper->dump($data->withContext($context));
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
