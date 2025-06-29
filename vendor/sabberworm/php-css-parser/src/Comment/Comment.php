<?php

namespace Sabberworm\CSS\Comment;

use Sabberworm\CSS\OutputFormat;
use Sabberworm\CSS\Renderable;

class Comment implements Renderable
{
    /**
     * @var int
<<<<<<< HEAD
=======
     *
     * @internal since 8.8.0
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected $iLineNo;

    /**
     * @var string
<<<<<<< HEAD
=======
     *
     * @internal since 8.8.0
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    protected $sComment;

    /**
     * @param string $sComment
     * @param int $iLineNo
     */
    public function __construct($sComment = '', $iLineNo = 0)
    {
        $this->sComment = $sComment;
        $this->iLineNo = $iLineNo;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->sComment;
    }

    /**
     * @return int
     */
    public function getLineNo()
    {
        return $this->iLineNo;
    }

    /**
     * @param string $sComment
     *
     * @return void
     */
    public function setComment($sComment)
    {
        $this->sComment = $sComment;
    }

    /**
     * @return string
<<<<<<< HEAD
=======
     *
     * @deprecated in V8.8.0, will be removed in V9.0.0. Use `render` instead.
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
     */
    public function __toString()
    {
        return $this->render(new OutputFormat());
    }

    /**
     * @param OutputFormat|null $oOutputFormat
     *
     * @return string
     */
    public function render($oOutputFormat)
    {
        return '/*' . $this->sComment . '*/';
    }
}
