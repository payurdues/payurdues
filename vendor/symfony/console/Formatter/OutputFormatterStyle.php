<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Formatter;

use Symfony\Component\Console\Color;

/**
 * Formatter style class for defining styles.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class OutputFormatterStyle implements OutputFormatterStyleInterface
{
<<<<<<< HEAD
    private $color;
=======
    private Color $color;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    private string $foreground;
    private string $background;
    private array $options;
    private ?string $href = null;
    private bool $handlesHrefGracefully;

    /**
     * Initializes output formatter style.
     *
     * @param string|null $foreground The style foreground color name
     * @param string|null $background The style background color name
     */
<<<<<<< HEAD
    public function __construct(string $foreground = null, string $background = null, array $options = [])
=======
    public function __construct(?string $foreground = null, ?string $background = null, array $options = [])
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    {
        $this->color = new Color($this->foreground = $foreground ?: '', $this->background = $background ?: '', $this->options = $options);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function setForeground(string $color = null)
    {
=======
     * @return void
     */
    public function setForeground(?string $color = null)
    {
        if (1 > \func_num_args()) {
            trigger_deprecation('symfony/console', '6.2', 'Calling "%s()" without any arguments is deprecated, pass null explicitly instead.', __METHOD__);
        }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        $this->color = new Color($this->foreground = $color ?: '', $this->background, $this->options);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function setBackground(string $color = null)
    {
=======
     * @return void
     */
    public function setBackground(?string $color = null)
    {
        if (1 > \func_num_args()) {
            trigger_deprecation('symfony/console', '6.2', 'Calling "%s()" without any arguments is deprecated, pass null explicitly instead.', __METHOD__);
        }
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        $this->color = new Color($this->foreground, $this->background = $color ?: '', $this->options);
    }

    public function setHref(string $url): void
    {
        $this->href = $url;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setOption(string $option)
    {
        $this->options[] = $option;
        $this->color = new Color($this->foreground, $this->background, $this->options);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function unsetOption(string $option)
    {
        $pos = array_search($option, $this->options);
        if (false !== $pos) {
            unset($this->options[$pos]);
        }

        $this->color = new Color($this->foreground, $this->background, $this->options);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
=======
     * @return void
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function setOptions(array $options)
    {
        $this->color = new Color($this->foreground, $this->background, $this->options = $options);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function apply(string $text): string
    {
        $this->handlesHrefGracefully ??= 'JetBrains-JediTerm' !== getenv('TERMINAL_EMULATOR')
            && (!getenv('KONSOLE_VERSION') || (int) getenv('KONSOLE_VERSION') > 201100);
=======
    public function apply(string $text): string
    {
        $this->handlesHrefGracefully ??= 'JetBrains-JediTerm' !== getenv('TERMINAL_EMULATOR')
            && (!getenv('KONSOLE_VERSION') || (int) getenv('KONSOLE_VERSION') > 201100)
            && !isset($_SERVER['IDEA_INITIAL_DIRECTORY']);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

        if (null !== $this->href && $this->handlesHrefGracefully) {
            $text = "\033]8;;$this->href\033\\$text\033]8;;\033\\";
        }

        return $this->color->apply($text);
    }
}
