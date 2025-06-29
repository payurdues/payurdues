<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\ErrorHandler\Error;

class FatalError extends \Error
{
    private array $error;

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     *
     * @param array $error An array as returned by error_get_last()
     */
    public function __construct(string $message, int $code, array $error, int $traceOffset = null, bool $traceArgs = true, array $trace = null)
=======
     * @param array $error An array as returned by error_get_last()
     */
    public function __construct(string $message, int $code, array $error, ?int $traceOffset = null, bool $traceArgs = true, ?array $trace = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        parent::__construct($message, $code);

        $this->error = $error;

        if (null !== $trace) {
            if (!$traceArgs) {
                foreach ($trace as &$frame) {
                    unset($frame['args'], $frame['this'], $frame);
                }
            }
        } elseif (null !== $traceOffset) {
<<<<<<< HEAD
            if (\function_exists('xdebug_get_function_stack') && $trace = @xdebug_get_function_stack()) {
=======
            if (\function_exists('xdebug_get_function_stack') && \in_array(\ini_get('xdebug.mode'), ['develop', false], true) && $trace = @xdebug_get_function_stack()) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                if (0 < $traceOffset) {
                    array_splice($trace, -$traceOffset);
                }

                foreach ($trace as &$frame) {
                    if (!isset($frame['type'])) {
                        // XDebug pre 2.1.1 doesn't currently set the call type key http://bugs.xdebug.org/view.php?id=695
                        if (isset($frame['class'])) {
                            $frame['type'] = '::';
                        }
                    } elseif ('dynamic' === $frame['type']) {
                        $frame['type'] = '->';
                    } elseif ('static' === $frame['type']) {
                        $frame['type'] = '::';
                    }

                    // XDebug also has a different name for the parameters array
                    if (!$traceArgs) {
                        unset($frame['params'], $frame['args']);
                    } elseif (isset($frame['params']) && !isset($frame['args'])) {
                        $frame['args'] = $frame['params'];
                        unset($frame['params']);
                    }
                }

                unset($frame);
                $trace = array_reverse($trace);
            } else {
                $trace = [];
            }
        }

        foreach ([
            'file' => $error['file'],
            'line' => $error['line'],
            'trace' => $trace,
        ] as $property => $value) {
            if (null !== $value) {
                $refl = new \ReflectionProperty(\Error::class, $property);
<<<<<<< HEAD
                $refl->setAccessible(true);
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                $refl->setValue($this, $value);
            }
        }
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getError(): array
    {
        return $this->error;
    }
}
