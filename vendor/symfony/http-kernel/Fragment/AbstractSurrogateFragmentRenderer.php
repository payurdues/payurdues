<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Fragment;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
<<<<<<< HEAD
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpKernel\HttpCache\SurrogateInterface;
use Symfony\Component\HttpKernel\UriSigner;
=======
use Symfony\Component\HttpFoundation\UriSigner;
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpKernel\HttpCache\SurrogateInterface;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

/**
 * Implements Surrogate rendering strategy.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class AbstractSurrogateFragmentRenderer extends RoutableFragmentRenderer
{
<<<<<<< HEAD
    private $surrogate;
    private $inlineStrategy;
    private $signer;
=======
    private ?SurrogateInterface $surrogate;
    private FragmentRendererInterface $inlineStrategy;
    private ?UriSigner $signer;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * The "fallback" strategy when surrogate is not available should always be an
     * instance of InlineFragmentRenderer.
     *
     * @param FragmentRendererInterface $inlineStrategy The inline strategy to use when the surrogate is not supported
     */
<<<<<<< HEAD
    public function __construct(SurrogateInterface $surrogate = null, FragmentRendererInterface $inlineStrategy, UriSigner $signer = null)
=======
    public function __construct(?SurrogateInterface $surrogate, FragmentRendererInterface $inlineStrategy, ?UriSigner $signer = null)
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->surrogate = $surrogate;
        $this->inlineStrategy = $inlineStrategy;
        $this->signer = $signer;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     *
=======
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     * Note that if the current Request has no surrogate capability, this method
     * falls back to use the inline rendering strategy.
     *
     * Additional available options:
     *
     *  * alt: an alternative URI to render in case of an error
     *  * comment: a comment to add when returning the surrogate tag
<<<<<<< HEAD
=======
     *  * absolute_uri: whether to generate an absolute URI or not. Default is false
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     *
     * Note, that not all surrogate strategies support all options. For now
     * 'alt' and 'comment' are only supported by ESI.
     *
     * @see Symfony\Component\HttpKernel\HttpCache\SurrogateInterface
     */
    public function render(string|ControllerReference $uri, Request $request, array $options = []): Response
    {
        if (!$this->surrogate || !$this->surrogate->hasSurrogateCapability($request)) {
<<<<<<< HEAD
=======
            $request->attributes->set('_check_controller_is_allowed', -1); // @deprecated, switch to true in Symfony 7

>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
            if ($uri instanceof ControllerReference && $this->containsNonScalars($uri->attributes)) {
                throw new \InvalidArgumentException('Passing non-scalar values as part of URI attributes to the ESI and SSI rendering strategies is not supported. Use a different rendering strategy or pass scalar values.');
            }

            return $this->inlineStrategy->render($uri, $request, $options);
        }

<<<<<<< HEAD
        if ($uri instanceof ControllerReference) {
            $uri = $this->generateSignedFragmentUri($uri, $request);
=======
        $absolute = $options['absolute_uri'] ?? false;

        if ($uri instanceof ControllerReference) {
            $uri = $this->generateSignedFragmentUri($uri, $request, $absolute);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $alt = $options['alt'] ?? null;
        if ($alt instanceof ControllerReference) {
<<<<<<< HEAD
            $alt = $this->generateSignedFragmentUri($alt, $request);
=======
            $alt = $this->generateSignedFragmentUri($alt, $request, $absolute);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }

        $tag = $this->surrogate->renderIncludeTag($uri, $alt, $options['ignore_errors'] ?? false, $options['comment'] ?? '');

        return new Response($tag);
    }

<<<<<<< HEAD
    private function generateSignedFragmentUri(ControllerReference $uri, Request $request): string
    {
        return (new FragmentUriGenerator($this->fragmentPath, $this->signer))->generate($uri, $request);
=======
    private function generateSignedFragmentUri(ControllerReference $uri, Request $request, bool $absolute): string
    {
        return (new FragmentUriGenerator($this->fragmentPath, $this->signer))->generate($uri, $request, $absolute);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    private function containsNonScalars(array $values): bool
    {
        foreach ($values as $value) {
            if (\is_scalar($value) || null === $value) {
                continue;
            }

            if (!\is_array($value) || $this->containsNonScalars($value)) {
                return true;
            }
        }

        return false;
    }
}
