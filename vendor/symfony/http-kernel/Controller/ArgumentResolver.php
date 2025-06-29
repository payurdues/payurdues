<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Controller;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;
=======
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\ValueResolver;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver;
<<<<<<< HEAD
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactoryInterface;
=======
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactoryInterface;
use Symfony\Component\HttpKernel\Exception\ResolverNotFoundException;
use Symfony\Contracts\Service\ServiceProviderInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

/**
 * Responsible for resolving the arguments passed to an action.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
final class ArgumentResolver implements ArgumentResolverInterface
{
<<<<<<< HEAD
    private $argumentMetadataFactory;
    private iterable $argumentValueResolvers;

    /**
     * @param iterable<mixed, ArgumentValueResolverInterface> $argumentValueResolvers
     */
    public function __construct(ArgumentMetadataFactoryInterface $argumentMetadataFactory = null, iterable $argumentValueResolvers = [])
    {
        $this->argumentMetadataFactory = $argumentMetadataFactory ?? new ArgumentMetadataFactory();
        $this->argumentValueResolvers = $argumentValueResolvers ?: self::getDefaultArgumentValueResolvers();
    }

    /**
     * {@inheritdoc}
     */
    public function getArguments(Request $request, callable $controller): array
    {
        $arguments = [];

        foreach ($this->argumentMetadataFactory->createArgumentMetadata($controller) as $metadata) {
            foreach ($this->argumentValueResolvers as $resolver) {
                if (!$resolver->supports($request, $metadata)) {
                    continue;
                }

                $resolved = $resolver->resolve($request, $metadata);

                $atLeastOne = false;
                foreach ($resolved as $append) {
                    $atLeastOne = true;
                    $arguments[] = $append;
                }

                if (!$atLeastOne) {
                    throw new \InvalidArgumentException(sprintf('"%s::resolve()" must yield at least one value.', get_debug_type($resolver)));
                }

                // continue to the next controller argument
                continue 2;
            }

            $representative = $controller;

            if (\is_array($representative)) {
                $representative = sprintf('%s::%s()', \get_class($representative[0]), $representative[1]);
            } elseif (\is_object($representative)) {
                $representative = \get_class($representative);
            }

            throw new \RuntimeException(sprintf('Controller "%s" requires that you provide a value for the "$%s" argument. Either the argument is nullable and no null value has been provided, no default value has been provided or because there is a non optional argument after this one.', $representative, $metadata->getName()));
=======
    private ArgumentMetadataFactoryInterface $argumentMetadataFactory;
    private iterable $argumentValueResolvers;
    private ?ContainerInterface $namedResolvers;

    /**
     * @param iterable<mixed, ArgumentValueResolverInterface|ValueResolverInterface> $argumentValueResolvers
     */
    public function __construct(?ArgumentMetadataFactoryInterface $argumentMetadataFactory = null, iterable $argumentValueResolvers = [], ?ContainerInterface $namedResolvers = null)
    {
        $this->argumentMetadataFactory = $argumentMetadataFactory ?? new ArgumentMetadataFactory();
        $this->argumentValueResolvers = $argumentValueResolvers ?: self::getDefaultArgumentValueResolvers();
        $this->namedResolvers = $namedResolvers;
    }

    public function getArguments(Request $request, callable $controller, ?\ReflectionFunctionAbstract $reflector = null): array
    {
        $arguments = [];

        foreach ($this->argumentMetadataFactory->createArgumentMetadata($controller, $reflector) as $metadata) {
            $argumentValueResolvers = $this->argumentValueResolvers;
            $disabledResolvers = [];

            if ($this->namedResolvers && $attributes = $metadata->getAttributesOfType(ValueResolver::class, $metadata::IS_INSTANCEOF)) {
                $resolverName = null;
                foreach ($attributes as $attribute) {
                    if ($attribute->disabled) {
                        $disabledResolvers[$attribute->resolver] = true;
                    } elseif ($resolverName) {
                        throw new \LogicException(sprintf('You can only pin one resolver per argument, but argument "$%s" of "%s()" has more.', $metadata->getName(), $this->getPrettyName($controller)));
                    } else {
                        $resolverName = $attribute->resolver;
                    }
                }

                if ($resolverName) {
                    if (!$this->namedResolvers->has($resolverName)) {
                        throw new ResolverNotFoundException($resolverName, $this->namedResolvers instanceof ServiceProviderInterface ? array_keys($this->namedResolvers->getProvidedServices()) : []);
                    }

                    $argumentValueResolvers = [
                        $this->namedResolvers->get($resolverName),
                        new RequestAttributeValueResolver(),
                        new DefaultValueResolver(),
                    ];
                }
            }

            foreach ($argumentValueResolvers as $name => $resolver) {
                if ((!$resolver instanceof ValueResolverInterface || $resolver instanceof TraceableValueResolver) && !$resolver->supports($request, $metadata)) {
                    continue;
                }
                if (isset($disabledResolvers[\is_int($name) ? $resolver::class : $name])) {
                    continue;
                }

                $count = 0;
                foreach ($resolver->resolve($request, $metadata) as $argument) {
                    ++$count;
                    $arguments[] = $argument;
                }

                if (1 < $count && !$metadata->isVariadic()) {
                    throw new \InvalidArgumentException(sprintf('"%s::resolve()" must yield at most one value for non-variadic arguments.', get_debug_type($resolver)));
                }

                if ($count) {
                    // continue to the next controller argument
                    continue 2;
                }

                if (!$resolver instanceof ValueResolverInterface) {
                    throw new \InvalidArgumentException(sprintf('"%s::resolve()" must yield at least one value.', get_debug_type($resolver)));
                }
            }

            throw new \RuntimeException(sprintf('Controller "%s" requires that you provide a value for the "$%s" argument. Either the argument is nullable and no null value has been provided, no default value has been provided or there is a non-optional argument after this one.', $this->getPrettyName($controller), $metadata->getName()));
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        return $arguments;
    }

    /**
     * @return iterable<int, ArgumentValueResolverInterface>
     */
    public static function getDefaultArgumentValueResolvers(): iterable
    {
        return [
            new RequestAttributeValueResolver(),
            new RequestValueResolver(),
            new SessionValueResolver(),
            new DefaultValueResolver(),
            new VariadicValueResolver(),
        ];
    }
<<<<<<< HEAD
=======

    private function getPrettyName($controller): string
    {
        if (\is_array($controller)) {
            if (\is_object($controller[0])) {
                $controller[0] = get_debug_type($controller[0]);
            }

            return $controller[0].'::'.$controller[1];
        }

        if (\is_object($controller)) {
            return get_debug_type($controller);
        }

        return $controller;
    }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
}
