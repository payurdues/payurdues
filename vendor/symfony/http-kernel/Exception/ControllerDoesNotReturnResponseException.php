<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Exception;

/**
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
class ControllerDoesNotReturnResponseException extends \LogicException
{
    public function __construct(string $message, callable $controller, string $file, int $line)
    {
        parent::__construct($message);

        if (!$controllerDefinition = $this->parseControllerDefinition($controller)) {
            return;
        }

        $this->file = $controllerDefinition['file'];
        $this->line = $controllerDefinition['line'];
        $r = new \ReflectionProperty(\Exception::class, 'trace');
<<<<<<< HEAD
        $r->setAccessible(true);
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        $r->setValue($this, array_merge([
            [
                'line' => $line,
                'file' => $file,
            ],
        ], $this->getTrace()));
    }

    private function parseControllerDefinition(callable $controller): ?array
    {
        if (\is_string($controller) && str_contains($controller, '::')) {
            $controller = explode('::', $controller);
        }

        if (\is_array($controller)) {
            try {
                $r = new \ReflectionMethod($controller[0], $controller[1]);

                return [
                    'file' => $r->getFileName(),
                    'line' => $r->getEndLine(),
                ];
<<<<<<< HEAD
            } catch (\ReflectionException $e) {
=======
            } catch (\ReflectionException) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                return null;
            }
        }

        if ($controller instanceof \Closure) {
            $r = new \ReflectionFunction($controller);

            return [
                'file' => $r->getFileName(),
                'line' => $r->getEndLine(),
            ];
        }

        if (\is_object($controller)) {
            $r = new \ReflectionClass($controller);

            try {
                $line = $r->getMethod('__invoke')->getEndLine();
<<<<<<< HEAD
            } catch (\ReflectionException $e) {
=======
            } catch (\ReflectionException) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                $line = $r->getEndLine();
            }

            return [
                'file' => $r->getFileName(),
                'line' => $line,
            ];
        }

        return null;
    }
}
