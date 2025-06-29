<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\ControllerMetadata;

/**
 * Builds {@see ArgumentMetadata} objects based on the given Controller.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
final class ArgumentMetadataFactory implements ArgumentMetadataFactoryInterface
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function createArgumentMetadata(string|object|array $controller): array
    {
        $arguments = [];

        if (\is_array($controller)) {
            $reflection = new \ReflectionMethod($controller[0], $controller[1]);
            $class = $reflection->class;
        } elseif (\is_object($controller) && !$controller instanceof \Closure) {
            $reflection = new \ReflectionMethod($controller, '__invoke');
            $class = $reflection->class;
        } else {
            $reflection = new \ReflectionFunction($controller);
            if ($class = str_contains($reflection->name, '{closure}') ? null : (\PHP_VERSION_ID >= 80111 ? $reflection->getClosureCalledClass() : $reflection->getClosureScopeClass())) {
                $class = $class->name;
            }
        }

        foreach ($reflection->getParameters() as $param) {
=======
    public function createArgumentMetadata(string|object|array $controller, ?\ReflectionFunctionAbstract $reflector = null): array
    {
        $arguments = [];
        $reflector ??= new \ReflectionFunction($controller(...));

        foreach ($reflector->getParameters() as $param) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $attributes = [];
            foreach ($param->getAttributes() as $reflectionAttribute) {
                if (class_exists($reflectionAttribute->getName())) {
                    $attributes[] = $reflectionAttribute->newInstance();
                }
            }

<<<<<<< HEAD
            $arguments[] = new ArgumentMetadata($param->getName(), $this->getType($param, $class), $param->isVariadic(), $param->isDefaultValueAvailable(), $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null, $param->allowsNull(), $attributes);
=======
            $arguments[] = new ArgumentMetadata($param->getName(), $this->getType($param), $param->isVariadic(), $param->isDefaultValueAvailable(), $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null, $param->allowsNull(), $attributes);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        return $arguments;
    }

    /**
     * Returns an associated type to the given parameter if available.
     */
<<<<<<< HEAD
    private function getType(\ReflectionParameter $parameter, ?string $class): ?string
=======
    private function getType(\ReflectionParameter $parameter): ?string
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (!$type = $parameter->getType()) {
            return null;
        }
        $name = $type instanceof \ReflectionNamedType ? $type->getName() : (string) $type;

<<<<<<< HEAD
        if (null !== $class) {
            switch (strtolower($name)) {
                case 'self':
                    return $class;
                case 'parent':
                    return get_parent_class($class) ?: null;
            }
        }

        return $name;
=======
        return match (strtolower($name)) {
            'self' => $parameter->getDeclaringClass()?->name,
            'parent' => get_parent_class($parameter->getDeclaringClass()?->name ?? '') ?: null,
            default => $name,
        };
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }
}
