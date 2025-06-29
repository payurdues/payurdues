<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel;

<<<<<<< HEAD
use Symfony\Bridge\ProxyManager\LazyProxy\Instantiator\RuntimeInstantiator;
use Symfony\Bridge\ProxyManager\LazyProxy\PhpDumper\ProxyDumper;
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\Config\Builder\ConfigBuilderGenerator;
use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;
<<<<<<< HEAD
use Symfony\Component\Debug\DebugClassLoader as LegacyDebugClassLoader;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
=======
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\Compiler\RemoveBuildParametersPass;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Dumper\Preloader;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\ClosureLoader;
use Symfony\Component\DependencyInjection\Loader\DirectoryLoader;
use Symfony\Component\DependencyInjection\Loader\GlobFileLoader;
use Symfony\Component\DependencyInjection\Loader\IniFileLoader;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\ErrorHandler\DebugClassLoader;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\CacheWarmer\WarmableInterface;
use Symfony\Component\HttpKernel\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\AddAnnotatedClassesToCachePass;
use Symfony\Component\HttpKernel\DependencyInjection\MergeExtensionConfigurationPass;

// Help opcache.preload discover always-needed symbols
class_exists(ConfigCache::class);

/**
 * The Kernel is the heart of the Symfony system.
 *
 * It manages an environment made of bundles.
 *
 * Environment names must always start with a letter and
 * they must only contain letters and numbers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class Kernel implements KernelInterface, RebootableInterface, TerminableInterface
{
    /**
     * @var array<string, BundleInterface>
     */
    protected $bundles = [];

    protected $container;
    protected $environment;
    protected $debug;
    protected $booted = false;
    protected $startTime;

    private string $projectDir;
    private ?string $warmupDir = null;
    private int $requestStackSize = 0;
    private bool $resetServices = false;

    /**
     * @var array<string, bool>
     */
    private static array $freshCache = [];

<<<<<<< HEAD
    public const VERSION = '6.0.20';
    public const VERSION_ID = 60020;
    public const MAJOR_VERSION = 6;
    public const MINOR_VERSION = 0;
    public const RELEASE_VERSION = 20;
    public const EXTRA_VERSION = '';

    public const END_OF_MAINTENANCE = '01/2023';
    public const END_OF_LIFE = '01/2023';
=======
    public const VERSION = '6.4.20';
    public const VERSION_ID = 60420;
    public const MAJOR_VERSION = 6;
    public const MINOR_VERSION = 4;
    public const RELEASE_VERSION = 20;
    public const EXTRA_VERSION = '';

    public const END_OF_MAINTENANCE = '11/2026';
    public const END_OF_LIFE = '11/2027';
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    public function __construct(string $environment, bool $debug)
    {
        if (!$this->environment = $environment) {
            throw new \InvalidArgumentException(sprintf('Invalid environment provided to "%s": the environment cannot be empty.', get_debug_type($this)));
        }

        $this->debug = $debug;
    }

    public function __clone()
    {
        $this->booted = false;
        $this->container = null;
        $this->requestStackSize = 0;
        $this->resetServices = false;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function boot()
    {
        if (true === $this->booted) {
            if (!$this->requestStackSize && $this->resetServices) {
                if ($this->container->has('services_resetter')) {
                    $this->container->get('services_resetter')->reset();
                }
                $this->resetServices = false;
                if ($this->debug) {
                    $this->startTime = microtime(true);
                }
            }

            return;
        }

        if (null === $this->container) {
            $this->preBoot();
        }

        foreach ($this->getBundles() as $bundle) {
            $bundle->setContainer($this->container);
            $bundle->boot();
        }

        $this->booted = true;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function reboot(?string $warmupDir)
    {
        $this->shutdown();
        $this->warmupDir = $warmupDir;
        $this->boot();
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function terminate(Request $request, Response $response)
    {
        if (false === $this->booted) {
            return;
        }

        if ($this->getHttpKernel() instanceof TerminableInterface) {
            $this->getHttpKernel()->terminate($request, $response);
        }
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function shutdown()
    {
        if (false === $this->booted) {
            return;
        }

        $this->booted = false;

        foreach ($this->getBundles() as $bundle) {
            $bundle->shutdown();
            $bundle->setContainer(null);
        }

        $this->container = null;
        $this->requestStackSize = 0;
        $this->resetServices = false;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function handle(Request $request, int $type = HttpKernelInterface::MAIN_REQUEST, bool $catch = true): Response
    {
        if (!$this->booted) {
            $container = $this->container ?? $this->preBoot();

            if ($container->has('http_cache')) {
                return $container->get('http_cache')->handle($request, $type, $catch);
            }
        }

        $this->boot();
        ++$this->requestStackSize;
        $this->resetServices = true;

        try {
            return $this->getHttpKernel()->handle($request, $type, $catch);
        } finally {
            --$this->requestStackSize;
        }
    }

    /**
     * Gets an HTTP kernel from the container.
     */
    protected function getHttpKernel(): HttpKernelInterface
    {
        return $this->container->get('http_kernel');
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getBundles(): array
    {
        return $this->bundles;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getBundle(string $name): BundleInterface
    {
        if (!isset($this->bundles[$name])) {
            throw new \InvalidArgumentException(sprintf('Bundle "%s" does not exist or it is not enabled. Maybe you forgot to add it in the "registerBundles()" method of your "%s.php" file?', $name, get_debug_type($this)));
        }

        return $this->bundles[$name];
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function locateResource(string $name): string
    {
        if ('@' !== $name[0]) {
            throw new \InvalidArgumentException(sprintf('A resource name must start with @ ("%s" given).', $name));
        }

        if (str_contains($name, '..')) {
            throw new \RuntimeException(sprintf('File name "%s" contains invalid characters (..).', $name));
        }

        $bundleName = substr($name, 1);
        $path = '';
        if (str_contains($bundleName, '/')) {
            [$bundleName, $path] = explode('/', $bundleName, 2);
        }

        $bundle = $this->getBundle($bundleName);
        if (file_exists($file = $bundle->getPath().'/'.$path)) {
            return $file;
        }

        throw new \InvalidArgumentException(sprintf('Unable to find file "%s".', $name));
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getEnvironment(): string
    {
        return $this->environment;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * Gets the application root dir (path of the project's composer file).
     */
    public function getProjectDir(): string
    {
        if (!isset($this->projectDir)) {
            $r = new \ReflectionObject($this);

            if (!is_file($dir = $r->getFileName())) {
                throw new \LogicException(sprintf('Cannot auto-detect project dir for kernel of class "%s".', $r->name));
            }

            $dir = $rootDir = \dirname($dir);
            while (!is_file($dir.'/composer.json')) {
                if ($dir === \dirname($dir)) {
                    return $this->projectDir = $rootDir;
                }
                $dir = \dirname($dir);
            }
            $this->projectDir = $dir;
        }

        return $this->projectDir;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getContainer(): ContainerInterface
    {
        if (!$this->container) {
            throw new \LogicException('Cannot retrieve the container from a non-booted kernel.');
        }

        return $this->container;
    }

    /**
     * @internal
     */
<<<<<<< HEAD
    public function setAnnotatedClassCache(array $annotatedClasses)
=======
    public function setAnnotatedClassCache(array $annotatedClasses): void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        file_put_contents(($this->warmupDir ?: $this->getBuildDir()).'/annotations.map', sprintf('<?php return %s;', var_export($annotatedClasses, true)));
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getStartTime(): float
    {
        return $this->debug && null !== $this->startTime ? $this->startTime : -\INF;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getCacheDir(): string
    {
        return $this->getProjectDir().'/var/cache/'.$this->environment;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getBuildDir(): string
    {
        // Returns $this->getCacheDir() for backward compatibility
        return $this->getCacheDir();
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getLogDir(): string
    {
        return $this->getProjectDir().'/var/log';
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function getCharset(): string
    {
        return 'UTF-8';
    }

    /**
     * Gets the patterns defining the classes to parse and cache for annotations.
     */
    public function getAnnotatedClassesToCompile(): array
    {
        return [];
    }

    /**
     * Initializes bundles.
     *
<<<<<<< HEAD
=======
     * @return void
     *
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * @throws \LogicException if two bundles share a common name
     */
    protected function initializeBundles()
    {
        // init bundles
        $this->bundles = [];
        foreach ($this->registerBundles() as $bundle) {
            $name = $bundle->getName();
            if (isset($this->bundles[$name])) {
                throw new \LogicException(sprintf('Trying to register two bundles with the same name "%s".', $name));
            }
            $this->bundles[$name] = $bundle;
        }
    }

    /**
     * The extension point similar to the Bundle::build() method.
     *
     * Use this method to register compiler passes and manipulate the container during the building process.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function build(ContainerBuilder $container)
    {
    }

    /**
     * Gets the container class.
     *
     * @throws \InvalidArgumentException If the generated classname is invalid
     */
    protected function getContainerClass(): string
    {
        $class = static::class;
        $class = str_contains($class, "@anonymous\0") ? get_parent_class($class).str_replace('.', '_', ContainerBuilder::hash($class)) : $class;
        $class = str_replace('\\', '_', $class).ucfirst($this->environment).($this->debug ? 'Debug' : '').'Container';

        if (!preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $class)) {
            throw new \InvalidArgumentException(sprintf('The environment "%s" contains invalid characters, it can only contain characters allowed in PHP class names.', $this->environment));
        }

        return $class;
    }

    /**
     * Gets the container's base class.
     *
     * All names except Container must be fully qualified.
     */
    protected function getContainerBaseClass(): string
    {
        return 'Container';
    }

    /**
     * Initializes the service container.
     *
     * The built version of the service container is used when fresh, otherwise the
     * container is built.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function initializeContainer()
    {
        $class = $this->getContainerClass();
        $buildDir = $this->warmupDir ?: $this->getBuildDir();
        $cache = new ConfigCache($buildDir.'/'.$class.'.php', $this->debug);
        $cachePath = $cache->getPath();

        // Silence E_WARNING to ignore "include" failures - don't use "@" to prevent silencing fatal errors
<<<<<<< HEAD
        $errorLevel = error_reporting(\E_ALL ^ \E_WARNING);
=======
        $errorLevel = error_reporting();
        error_reporting($errorLevel & ~\E_WARNING);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        try {
            if (is_file($cachePath) && \is_object($this->container = include $cachePath)
                && (!$this->debug || (self::$freshCache[$cachePath] ?? $cache->isFresh()))
            ) {
                self::$freshCache[$cachePath] = true;
                $this->container->set('kernel', $this);
                error_reporting($errorLevel);

                return;
            }
        } catch (\Throwable $e) {
        }

        $oldContainer = \is_object($this->container) ? new \ReflectionClass($this->container) : $this->container = null;

        try {
            is_dir($buildDir) ?: mkdir($buildDir, 0777, true);

<<<<<<< HEAD
            if ($lock = fopen($cachePath.'.lock', 'w')) {
=======
            if ($lock = fopen($cachePath.'.lock', 'w+')) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                if (!flock($lock, \LOCK_EX | \LOCK_NB, $wouldBlock) && !flock($lock, $wouldBlock ? \LOCK_SH : \LOCK_EX)) {
                    fclose($lock);
                    $lock = null;
                } elseif (!is_file($cachePath) || !\is_object($this->container = include $cachePath)) {
                    $this->container = null;
<<<<<<< HEAD
                } elseif (!$oldContainer || \get_class($this->container) !== $oldContainer->name) {
=======
                } elseif (!$oldContainer || $this->container::class !== $oldContainer->name) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                    flock($lock, \LOCK_UN);
                    fclose($lock);
                    $this->container->set('kernel', $this);

                    return;
                }
            }
        } catch (\Throwable $e) {
        } finally {
            error_reporting($errorLevel);
        }

        if ($collectDeprecations = $this->debug && !\defined('PHPUNIT_COMPOSER_INSTALL')) {
            $collectedLogs = [];
            $previousHandler = set_error_handler(function ($type, $message, $file, $line) use (&$collectedLogs, &$previousHandler) {
                if (\E_USER_DEPRECATED !== $type && \E_DEPRECATED !== $type) {
                    return $previousHandler ? $previousHandler($type, $message, $file, $line) : false;
                }

                if (isset($collectedLogs[$message])) {
                    ++$collectedLogs[$message]['count'];

                    return null;
                }

                $backtrace = debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 5);
                // Clean the trace by removing first frames added by the error handler itself.
                for ($i = 0; isset($backtrace[$i]); ++$i) {
                    if (isset($backtrace[$i]['file'], $backtrace[$i]['line']) && $backtrace[$i]['line'] === $line && $backtrace[$i]['file'] === $file) {
                        $backtrace = \array_slice($backtrace, 1 + $i);
                        break;
                    }
                }
                for ($i = 0; isset($backtrace[$i]); ++$i) {
                    if (!isset($backtrace[$i]['file'], $backtrace[$i]['line'], $backtrace[$i]['function'])) {
                        continue;
                    }
                    if (!isset($backtrace[$i]['class']) && 'trigger_deprecation' === $backtrace[$i]['function']) {
                        $file = $backtrace[$i]['file'];
                        $line = $backtrace[$i]['line'];
                        $backtrace = \array_slice($backtrace, 1 + $i);
                        break;
                    }
                }

                // Remove frames added by DebugClassLoader.
                for ($i = \count($backtrace) - 2; 0 < $i; --$i) {
<<<<<<< HEAD
                    if (\in_array($backtrace[$i]['class'] ?? null, [DebugClassLoader::class, LegacyDebugClassLoader::class], true)) {
=======
                    if (DebugClassLoader::class === ($backtrace[$i]['class'] ?? null)) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
                        $backtrace = [$backtrace[$i + 1]];
                        break;
                    }
                }

                $collectedLogs[$message] = [
                    'type' => $type,
                    'message' => $message,
                    'file' => $file,
                    'line' => $line,
                    'trace' => [$backtrace[0]],
                    'count' => 1,
                ];

                return null;
            });
        }

        try {
            $container = null;
            $container = $this->buildContainer();
            $container->compile();
        } finally {
            if ($collectDeprecations) {
                restore_error_handler();

                @file_put_contents($buildDir.'/'.$class.'Deprecations.log', serialize(array_values($collectedLogs)));
                @file_put_contents($buildDir.'/'.$class.'Compiler.log', null !== $container ? implode("\n", $container->getCompiler()->getLog()) : '');
            }
        }

        $this->dumpContainer($cache, $container, $class, $this->getContainerBaseClass());

        if ($lock) {
            flock($lock, \LOCK_UN);
            fclose($lock);
        }

        $this->container = require $cachePath;
        $this->container->set('kernel', $this);

<<<<<<< HEAD
        if ($oldContainer && \get_class($this->container) !== $oldContainer->name) {
=======
        if ($oldContainer && $this->container::class !== $oldContainer->name) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            // Because concurrent requests might still be using them,
            // old container files are not removed immediately,
            // but on a next dump of the container.
            static $legacyContainers = [];
            $oldContainerDir = \dirname($oldContainer->getFileName());
            $legacyContainers[$oldContainerDir.'.legacy'] = true;
            foreach (glob(\dirname($oldContainerDir).\DIRECTORY_SEPARATOR.'*.legacy', \GLOB_NOSORT) as $legacyContainer) {
                if (!isset($legacyContainers[$legacyContainer]) && @unlink($legacyContainer)) {
                    (new Filesystem())->remove(substr($legacyContainer, 0, -7));
                }
            }

            touch($oldContainerDir.'.legacy');
        }

<<<<<<< HEAD
        $preload = $this instanceof WarmableInterface ? (array) $this->warmUp($this->container->getParameter('kernel.cache_dir')) : [];

        if ($this->container->has('cache_warmer')) {
            $preload = array_merge($preload, (array) $this->container->get('cache_warmer')->warmUp($this->container->getParameter('kernel.cache_dir')));
        }

        if ($preload && method_exists(Preloader::class, 'append') && file_exists($preloadFile = $buildDir.'/'.$class.'.preload.php')) {
=======
        $buildDir = $this->container->getParameter('kernel.build_dir');
        $cacheDir = $this->container->getParameter('kernel.cache_dir');
        $preload = $this instanceof WarmableInterface ? (array) $this->warmUp($cacheDir, $buildDir) : [];

        if ($this->container->has('cache_warmer')) {
            $cacheWarmer = $this->container->get('cache_warmer');

            if ($cacheDir !== $buildDir) {
                $cacheWarmer->enableOptionalWarmers();
            }

            $preload = array_merge($preload, (array) $cacheWarmer->warmUp($cacheDir, $buildDir));
        }

        if ($preload && file_exists($preloadFile = $buildDir.'/'.$class.'.preload.php')) {
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            Preloader::append($preloadFile, $preload);
        }
    }

    /**
     * Returns the kernel parameters.
     */
    protected function getKernelParameters(): array
    {
        $bundles = [];
        $bundlesMetadata = [];

        foreach ($this->bundles as $name => $bundle) {
<<<<<<< HEAD
            $bundles[$name] = \get_class($bundle);
=======
            $bundles[$name] = $bundle::class;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $bundlesMetadata[$name] = [
                'path' => $bundle->getPath(),
                'namespace' => $bundle->getNamespace(),
            ];
        }

        return [
            'kernel.project_dir' => realpath($this->getProjectDir()) ?: $this->getProjectDir(),
            'kernel.environment' => $this->environment,
            'kernel.runtime_environment' => '%env(default:kernel.environment:APP_RUNTIME_ENV)%',
<<<<<<< HEAD
=======
            'kernel.runtime_mode' => '%env(query_string:default:container.runtime_mode:APP_RUNTIME_MODE)%',
            'kernel.runtime_mode.web' => '%env(bool:default::key:web:default:kernel.runtime_mode:)%',
            'kernel.runtime_mode.cli' => '%env(not:default:kernel.runtime_mode.web:)%',
            'kernel.runtime_mode.worker' => '%env(bool:default::key:worker:default:kernel.runtime_mode:)%',
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            'kernel.debug' => $this->debug,
            'kernel.build_dir' => realpath($buildDir = $this->warmupDir ?: $this->getBuildDir()) ?: $buildDir,
            'kernel.cache_dir' => realpath($cacheDir = ($this->getCacheDir() === $this->getBuildDir() ? ($this->warmupDir ?: $this->getCacheDir()) : $this->getCacheDir())) ?: $cacheDir,
            'kernel.logs_dir' => realpath($this->getLogDir()) ?: $this->getLogDir(),
            'kernel.bundles' => $bundles,
            'kernel.bundles_metadata' => $bundlesMetadata,
            'kernel.charset' => $this->getCharset(),
            'kernel.container_class' => $this->getContainerClass(),
        ];
    }

    /**
     * Builds the service container.
     *
     * @throws \RuntimeException
     */
    protected function buildContainer(): ContainerBuilder
    {
        foreach (['cache' => $this->getCacheDir(), 'build' => $this->warmupDir ?: $this->getBuildDir(), 'logs' => $this->getLogDir()] as $name => $dir) {
            if (!is_dir($dir)) {
                if (false === @mkdir($dir, 0777, true) && !is_dir($dir)) {
                    throw new \RuntimeException(sprintf('Unable to create the "%s" directory (%s).', $name, $dir));
                }
            } elseif (!is_writable($dir)) {
                throw new \RuntimeException(sprintf('Unable to write in the "%s" directory (%s).', $name, $dir));
            }
        }

        $container = $this->getContainerBuilder();
        $container->addObjectResource($this);
        $this->prepareContainer($container);
        $this->registerContainerConfiguration($this->getContainerLoader($container));

        $container->addCompilerPass(new AddAnnotatedClassesToCachePass($this));

        return $container;
    }

    /**
     * Prepares the ContainerBuilder before it is compiled.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function prepareContainer(ContainerBuilder $container)
    {
        $extensions = [];
        foreach ($this->bundles as $bundle) {
            if ($extension = $bundle->getContainerExtension()) {
                $container->registerExtension($extension);
            }

            if ($this->debug) {
                $container->addObjectResource($bundle);
            }
        }

        foreach ($this->bundles as $bundle) {
            $bundle->build($container);
        }

        $this->build($container);

        foreach ($container->getExtensions() as $extension) {
            $extensions[] = $extension->getAlias();
        }

        // ensure these extensions are implicitly loaded
        $container->getCompilerPassConfig()->setMergePass(new MergeExtensionConfigurationPass($extensions));
    }

    /**
     * Gets a new ContainerBuilder instance used to build the service container.
     */
    protected function getContainerBuilder(): ContainerBuilder
    {
        $container = new ContainerBuilder();
        $container->getParameterBag()->add($this->getKernelParameters());

        if ($this instanceof ExtensionInterface) {
            $container->registerExtension($this);
        }
        if ($this instanceof CompilerPassInterface) {
            $container->addCompilerPass($this, PassConfig::TYPE_BEFORE_OPTIMIZATION, -10000);
        }
<<<<<<< HEAD
        if (class_exists(\ProxyManager\Configuration::class) && class_exists(RuntimeInstantiator::class)) {
            $container->setProxyInstantiator(new RuntimeInstantiator());
        }
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        return $container;
    }

    /**
     * Dumps the service container to PHP code in the cache.
     *
     * @param string $class     The name of the class to generate
     * @param string $baseClass The name of the container's base class
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected function dumpContainer(ConfigCache $cache, ContainerBuilder $container, string $class, string $baseClass)
    {
        // cache the container
        $dumper = new PhpDumper($container);

<<<<<<< HEAD
        if (class_exists(\ProxyManager\Configuration::class) && class_exists(ProxyDumper::class)) {
            $dumper->setProxyDumper(new ProxyDumper());
=======
        $buildParameters = [];
        foreach ($container->getCompilerPassConfig()->getPasses() as $pass) {
            if ($pass instanceof RemoveBuildParametersPass) {
                $buildParameters = array_merge($buildParameters, $pass->getRemovedParameters());
            }
        }

        $inlineFactories = false;
        if (isset($buildParameters['.container.dumper.inline_factories'])) {
            $inlineFactories = $buildParameters['.container.dumper.inline_factories'];
        } elseif ($container->hasParameter('container.dumper.inline_factories')) {
            trigger_deprecation('symfony/http-kernel', '6.3', 'Parameter "%s" is deprecated, use ".%1$s" instead.', 'container.dumper.inline_factories');
            $inlineFactories = $container->getParameter('container.dumper.inline_factories');
        }

        $inlineClassLoader = $this->debug;
        if (isset($buildParameters['.container.dumper.inline_class_loader'])) {
            $inlineClassLoader = $buildParameters['.container.dumper.inline_class_loader'];
        } elseif ($container->hasParameter('container.dumper.inline_class_loader')) {
            trigger_deprecation('symfony/http-kernel', '6.3', 'Parameter "%s" is deprecated, use ".%1$s" instead.', 'container.dumper.inline_class_loader');
            $inlineClassLoader = $container->getParameter('container.dumper.inline_class_loader');
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $content = $dumper->dump([
            'class' => $class,
            'base_class' => $baseClass,
            'file' => $cache->getPath(),
            'as_files' => true,
            'debug' => $this->debug,
<<<<<<< HEAD
=======
            'inline_factories' => $inlineFactories,
            'inline_class_loader' => $inlineClassLoader,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            'build_time' => $container->hasParameter('kernel.container_build_time') ? $container->getParameter('kernel.container_build_time') : time(),
            'preload_classes' => array_map('get_class', $this->bundles),
        ]);

        $rootCode = array_pop($content);
        $dir = \dirname($cache->getPath()).'/';
        $fs = new Filesystem();

        foreach ($content as $file => $code) {
            $fs->dumpFile($dir.$file, $code);
            @chmod($dir.$file, 0666 & ~umask());
        }
        $legacyFile = \dirname($dir.key($content)).'.legacy';
        if (is_file($legacyFile)) {
            @unlink($legacyFile);
        }

        $cache->write($rootCode, $container->getResources());
    }

    /**
     * Returns a loader for the container.
     */
    protected function getContainerLoader(ContainerInterface $container): DelegatingLoader
    {
        $env = $this->getEnvironment();
        $locator = new FileLocator($this);
        $resolver = new LoaderResolver([
            new XmlFileLoader($container, $locator, $env),
            new YamlFileLoader($container, $locator, $env),
            new IniFileLoader($container, $locator, $env),
            new PhpFileLoader($container, $locator, $env, class_exists(ConfigBuilderGenerator::class) ? new ConfigBuilderGenerator($this->getBuildDir()) : null),
            new GlobFileLoader($container, $locator, $env),
            new DirectoryLoader($container, $locator, $env),
            new ClosureLoader($container, $env),
        ]);

        return new DelegatingLoader($resolver);
    }

    private function preBoot(): ContainerInterface
    {
        if ($this->debug) {
            $this->startTime = microtime(true);
        }
        if ($this->debug && !isset($_ENV['SHELL_VERBOSITY']) && !isset($_SERVER['SHELL_VERBOSITY'])) {
<<<<<<< HEAD
            putenv('SHELL_VERBOSITY=3');
=======
            if (\function_exists('putenv')) {
                putenv('SHELL_VERBOSITY=3');
            }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            $_ENV['SHELL_VERBOSITY'] = 3;
            $_SERVER['SHELL_VERBOSITY'] = 3;
        }

        $this->initializeBundles();
        $this->initializeContainer();

        $container = $this->container;

        if ($container->hasParameter('kernel.trusted_hosts') && $trustedHosts = $container->getParameter('kernel.trusted_hosts')) {
            Request::setTrustedHosts($trustedHosts);
        }

        if ($container->hasParameter('kernel.trusted_proxies') && $container->hasParameter('kernel.trusted_headers') && $trustedProxies = $container->getParameter('kernel.trusted_proxies')) {
            Request::setTrustedProxies(\is_array($trustedProxies) ? $trustedProxies : array_map('trim', explode(',', $trustedProxies)), $container->getParameter('kernel.trusted_headers'));
        }

        return $container;
    }

    /**
     * Removes comments from a PHP source string.
     *
     * We don't use the PHP php_strip_whitespace() function
     * as we want the content to be readable and well-formatted.
<<<<<<< HEAD
     */
    public static function stripComments(string $source): string
    {
=======
     *
     * @deprecated since Symfony 6.4 without replacement
     */
    public static function stripComments(string $source): string
    {
        trigger_deprecation('symfony/http-kernel', '6.4', 'Method "%s()" is deprecated without replacement.', __METHOD__);

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        if (!\function_exists('token_get_all')) {
            return $source;
        }

        $rawChunk = '';
        $output = '';
        $tokens = token_get_all($source);
        $ignoreSpace = false;
        for ($i = 0; isset($tokens[$i]); ++$i) {
            $token = $tokens[$i];
            if (!isset($token[1]) || 'b"' === $token) {
                $rawChunk .= $token;
            } elseif (\T_START_HEREDOC === $token[0]) {
                $output .= $rawChunk.$token[1];
                do {
                    $token = $tokens[++$i];
                    $output .= isset($token[1]) && 'b"' !== $token ? $token[1] : $token;
                } while (\T_END_HEREDOC !== $token[0]);
                $rawChunk = '';
            } elseif (\T_WHITESPACE === $token[0]) {
                if ($ignoreSpace) {
                    $ignoreSpace = false;

                    continue;
                }

                // replace multiple new lines with a single newline
                $rawChunk .= preg_replace(['/\n{2,}/S'], "\n", $token[1]);
            } elseif (\in_array($token[0], [\T_COMMENT, \T_DOC_COMMENT])) {
                if (!\in_array($rawChunk[\strlen($rawChunk) - 1], [' ', "\n", "\r", "\t"], true)) {
                    $rawChunk .= ' ';
                }
                $ignoreSpace = true;
            } else {
                $rawChunk .= $token[1];

                // The PHP-open tag already has a new-line
                if (\T_OPEN_TAG === $token[0]) {
                    $ignoreSpace = true;
                } else {
                    $ignoreSpace = false;
                }
            }
        }

        $output .= $rawChunk;

        unset($tokens, $rawChunk);
        gc_mem_caches();

        return $output;
    }

    public function __sleep(): array
    {
        return ['environment', 'debug'];
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    public function __wakeup()
    {
        if (\is_object($this->environment) || \is_object($this->debug)) {
            throw new \BadMethodCallException('Cannot unserialize '.__CLASS__);
        }

        $this->__construct($this->environment, $this->debug);
    }
}
