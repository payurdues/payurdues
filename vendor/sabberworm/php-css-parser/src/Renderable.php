<?php

namespace Sabberworm\CSS;

interface Renderable
{
    /**
     * @return string
<<<<<<< HEAD
=======
     *
     * @deprecated in V8.8.0, will be removed in V9.0.0. Use `render` instead.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function __toString();

    /**
     * @param OutputFormat|null $oOutputFormat
     *
     * @return string
     */
    public function render($oOutputFormat);

    /**
     * @return int
     */
    public function getLineNo();
}
