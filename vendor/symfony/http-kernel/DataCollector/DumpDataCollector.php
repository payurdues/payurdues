<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Debug\FileLinkFormatter;
=======
use Symfony\Component\ErrorHandler\ErrorRenderer\FileLinkFormatter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Server\Connection;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @final
 */
class DumpDataCollector extends DataCollector implements DataDumperInterface
{
<<<<<<< HEAD
    private $stopwatch = null;
=======
    private ?Stopwatch $stopwatch = null;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    private string|FileLinkFormatter|false $fileLinkFormat;
    private int $dataCount = 0;
    private bool $isCollected = true;
    private int $clonesCount = 0;
    private int $clonesIndex = 0;
    private array $rootRefs;
    private string $charset;
<<<<<<< HEAD
    private $requestStack;
    private $dumper;
    private mixed $sourceContextProvider;

    public function __construct(Stopwatch $stopwatch = null, string|FileLinkFormatter $fileLinkFormat = null, string $charset = null, RequestStack $requestStack = null, DataDumperInterface|Connection $dumper = null)
=======
    private ?RequestStack $requestStack;
    private DataDumperInterface|Connection|null $dumper;
    private mixed $sourceContextProvider;
    private bool $webMode;

    public function __construct(?Stopwatch $stopwatch = null, string|FileLinkFormatter|null $fileLinkFormat = null, ?string $charset = null, ?RequestStack $requestStack = null, DataDumperInterface|Connection|null $dumper = null, ?bool $webMode = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $fileLinkFormat = $fileLinkFormat ?: \ini_get('xdebug.file_link_format') ?: get_cfg_var('xdebug.file_link_format');
        $this->stopwatch = $stopwatch;
        $this->fileLinkFormat = $fileLinkFormat instanceof FileLinkFormatter && false === $fileLinkFormat->format('', 0) ? false : $fileLinkFormat;
        $this->charset = $charset ?: \ini_get('php.output_encoding') ?: \ini_get('default_charset') ?: 'UTF-8';
        $this->requestStack = $requestStack;
        $this->dumper = $dumper;
<<<<<<< HEAD
=======
        $this->webMode = $webMode ?? !\in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        // All clones share these properties by reference:
        $this->rootRefs = [
            &$this->data,
            &$this->dataCount,
            &$this->isCollected,
            &$this->clonesCount,
        ];

        $this->sourceContextProvider = $dumper instanceof Connection && isset($dumper->getContextProviders()['source']) ? $dumper->getContextProviders()['source'] : new SourceContextProvider($this->charset);
    }

    public function __clone()
    {
        $this->clonesIndex = ++$this->clonesCount;
    }

<<<<<<< HEAD
    public function dump(Data $data)
    {
        if ($this->stopwatch) {
            $this->stopwatch->start('dump');
        }

        ['name' => $name, 'file' => $file, 'line' => $line, 'file_excerpt' => $fileExcerpt] = $this->sourceContextProvider->getContext();

        if ($this->dumper instanceof Connection) {
            if (!$this->dumper->write($data)) {
                $this->isCollected = false;
            }
        } elseif ($this->dumper) {
            $this->doDump($this->dumper, $data, $name, $file, $line);
        } else {
            $this->isCollected = false;
        }

        if (!$this->dataCount) {
            $this->data = [];
        }
        $this->data[] = compact('data', 'name', 'file', 'line', 'fileExcerpt');
        ++$this->dataCount;

        if ($this->stopwatch) {
            $this->stopwatch->stop('dump');
        }
    }

    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
    public function dump(Data $data): ?string
    {
        $this->stopwatch?->start('dump');

        ['name' => $name, 'file' => $file, 'line' => $line, 'file_excerpt' => $fileExcerpt] = $this->sourceContextProvider->getContext();

        if (!$this->dumper || $this->dumper instanceof Connection && !$this->dumper->write($data)) {
            $this->isCollected = false;
        }

        $context = $data->getContext();
        $label = $context['label'] ?? '';
        unset($context['label']);
        $data = $data->withContext($context);

        if ($this->dumper && !$this->dumper instanceof Connection) {
            $this->doDump($this->dumper, $data, $name, $file, $line, $label);
        }

        if (!$this->dataCount) {
            $this->data = [];
        }
        $this->data[] = compact('data', 'name', 'file', 'line', 'fileExcerpt', 'label');
        ++$this->dataCount;

        $this->stopwatch?->stop('dump');

        return null;
    }

    public function collect(Request $request, Response $response, ?\Throwable $exception = null): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        if (!$this->dataCount) {
            $this->data = [];
        }

        // Sub-requests and programmatic calls stay in the collected profile.
        if ($this->dumper || ($this->requestStack && $this->requestStack->getMainRequest() !== $request) || $request->isXmlHttpRequest() || $request->headers->has('Origin')) {
            return;
        }

        // In all other conditions that remove the web debug toolbar, dumps are written on the output.
        if (!$this->requestStack
            || !$response->headers->has('X-Debug-Token')
            || $response->isRedirection()
<<<<<<< HEAD
            || ($response->headers->has('Content-Type') && !str_contains($response->headers->get('Content-Type'), 'html'))
            || 'html' !== $request->getRequestFormat()
            || false === strripos($response->getContent(), '</body>')
        ) {
            if ($response->headers->has('Content-Type') && str_contains($response->headers->get('Content-Type'), 'html')) {
=======
            || ($response->headers->has('Content-Type') && !str_contains($response->headers->get('Content-Type') ?? '', 'html'))
            || 'html' !== $request->getRequestFormat()
            || false === strripos($response->getContent(), '</body>')
        ) {
            if ($response->headers->has('Content-Type') && str_contains($response->headers->get('Content-Type') ?? '', 'html')) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                $dumper = new HtmlDumper('php://output', $this->charset);
                $dumper->setDisplayOptions(['fileLinkFormat' => $this->fileLinkFormat]);
            } else {
                $dumper = new CliDumper('php://output', $this->charset);
<<<<<<< HEAD
                if (method_exists($dumper, 'setDisplayOptions')) {
                    $dumper->setDisplayOptions(['fileLinkFormat' => $this->fileLinkFormat]);
                }
            }

            foreach ($this->data as $dump) {
                $this->doDump($dumper, $dump['data'], $dump['name'], $dump['file'], $dump['line']);
=======
                $dumper->setDisplayOptions(['fileLinkFormat' => $this->fileLinkFormat]);
            }

            foreach ($this->data as $dump) {
                $this->doDump($dumper, $dump['data'], $dump['name'], $dump['file'], $dump['line'], $dump['label'] ?? '');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            }
        }
    }

<<<<<<< HEAD
    public function reset()
    {
        if ($this->stopwatch) {
            $this->stopwatch->reset();
        }
        $this->data = [];
=======
    public function reset(): void
    {
        $this->stopwatch?->reset();
        parent::reset();
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        $this->dataCount = 0;
        $this->isCollected = true;
        $this->clonesCount = 0;
        $this->clonesIndex = 0;
    }

    /**
     * @internal
     */
    public function __sleep(): array
    {
        if (!$this->dataCount) {
            $this->data = [];
        }

        if ($this->clonesCount !== $this->clonesIndex) {
            return [];
        }

        $this->data[] = $this->fileLinkFormat;
        $this->data[] = $this->charset;
        $this->dataCount = 0;
        $this->isCollected = true;

        return parent::__sleep();
    }

    /**
     * @internal
     */
<<<<<<< HEAD
    public function __wakeup()
=======
    public function __wakeup(): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        parent::__wakeup();

        $charset = array_pop($this->data);
        $fileLinkFormat = array_pop($this->data);
        $this->dataCount = \count($this->data);
        foreach ($this->data as $dump) {
            if (!\is_string($dump['name']) || !\is_string($dump['file']) || !\is_int($dump['line'])) {
                throw new \BadMethodCallException('Cannot unserialize '.__CLASS__);
            }
        }

        self::__construct($this->stopwatch, \is_string($fileLinkFormat) || $fileLinkFormat instanceof FileLinkFormatter ? $fileLinkFormat : null, \is_string($charset) ? $charset : null);
    }

    public function getDumpsCount(): int
    {
        return $this->dataCount;
    }

    public function getDumps(string $format, int $maxDepthLimit = -1, int $maxItemsPerDepth = -1): array
    {
        $data = fopen('php://memory', 'r+');

        if ('html' === $format) {
            $dumper = new HtmlDumper($data, $this->charset);
            $dumper->setDisplayOptions(['fileLinkFormat' => $this->fileLinkFormat]);
        } else {
            throw new \InvalidArgumentException(sprintf('Invalid dump format: "%s".', $format));
        }
        $dumps = [];

        if (!$this->dataCount) {
            return $this->data = [];
        }

        foreach ($this->data as $dump) {
            $dumper->dump($dump['data']->withMaxDepth($maxDepthLimit)->withMaxItemsPerDepth($maxItemsPerDepth));
            $dump['data'] = stream_get_contents($data, -1, 0);
            ftruncate($data, 0);
            rewind($data);
            $dumps[] = $dump;
        }

        return $dumps;
    }

    public function getName(): string
    {
        return 'dump';
    }

    public function __destruct()
    {
        if (0 === $this->clonesCount-- && !$this->isCollected && $this->dataCount) {
            $this->clonesCount = 0;
            $this->isCollected = true;

            $h = headers_list();
            $i = \count($h);
            array_unshift($h, 'Content-Type: '.\ini_get('default_mimetype'));
            while (0 !== stripos($h[$i], 'Content-Type:')) {
                --$i;
            }

<<<<<<< HEAD
            if (!\in_array(\PHP_SAPI, ['cli', 'phpdbg'], true) && stripos($h[$i], 'html')) {
=======
            if ($this->webMode) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                $dumper = new HtmlDumper('php://output', $this->charset);
                $dumper->setDisplayOptions(['fileLinkFormat' => $this->fileLinkFormat]);
            } else {
                $dumper = new CliDumper('php://output', $this->charset);
<<<<<<< HEAD
                if (method_exists($dumper, 'setDisplayOptions')) {
                    $dumper->setDisplayOptions(['fileLinkFormat' => $this->fileLinkFormat]);
                }
=======
                $dumper->setDisplayOptions(['fileLinkFormat' => $this->fileLinkFormat]);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            }

            foreach ($this->data as $i => $dump) {
                $this->data[$i] = null;
<<<<<<< HEAD
                $this->doDump($dumper, $dump['data'], $dump['name'], $dump['file'], $dump['line']);
=======
                $this->doDump($dumper, $dump['data'], $dump['name'], $dump['file'], $dump['line'], $dump['label'] ?? '');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            }

            $this->data = [];
            $this->dataCount = 0;
        }
    }

<<<<<<< HEAD
    private function doDump(DataDumperInterface $dumper, Data $data, string $name, string $file, int $line)
    {
        if ($dumper instanceof CliDumper) {
            $contextDumper = function ($name, $file, $line, $fmt) {
=======
    private function doDump(DataDumperInterface $dumper, Data $data, string $name, string $file, int $line, string $label): void
    {
        if ($dumper instanceof CliDumper) {
            $contextDumper = function ($name, $file, $line, $fmt, $label) {
                $this->line = '' !== $label ? $this->style('meta', $label).' in ' : '';

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                if ($this instanceof HtmlDumper) {
                    if ($file) {
                        $s = $this->style('meta', '%s');
                        $f = strip_tags($this->style('', $file));
                        $name = strip_tags($this->style('', $name));
                        if ($fmt && $link = \is_string($fmt) ? strtr($fmt, ['%f' => $file, '%l' => $line]) : $fmt->format($file, $line)) {
                            $name = sprintf('<a href="%s" title="%s">'.$s.'</a>', strip_tags($this->style('', $link)), $f, $name);
                        } else {
                            $name = sprintf('<abbr title="%s">'.$s.'</abbr>', $f, $name);
                        }
                    } else {
                        $name = $this->style('meta', $name);
                    }
<<<<<<< HEAD
                    $this->line = $name.' on line '.$this->style('meta', $line).':';
                } else {
                    $this->line = $this->style('meta', $name).' on line '.$this->style('meta', $line).':';
=======
                    $this->line .= $name.' on line '.$this->style('meta', $line).':';
                } else {
                    $this->line .= $this->style('meta', $name).' on line '.$this->style('meta', $line).':';
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                }
                $this->dumpLine(0);
            };
            $contextDumper = $contextDumper->bindTo($dumper, $dumper);
<<<<<<< HEAD
            $contextDumper($name, $file, $line, $this->fileLinkFormat);
        } else {
            $cloner = new VarCloner();
            $dumper->dump($cloner->cloneVar($name.' on line '.$line.':'));
=======
            $contextDumper($name, $file, $line, $this->fileLinkFormat, $label);
        } else {
            $cloner = new VarCloner();
            $dumper->dump($cloner->cloneVar(('' !== $label ? $label.' in ' : '').$name.' on line '.$line.':'));
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }
        $dumper->dump($data);
    }
}
