<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette\Schema;


interface Schema
{
	/**
	 * Normalization.
	 * @return mixed
	 */
<<<<<<< HEAD
	function normalize($value, Context $context);
=======
	function normalize(mixed $value, Context $context);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

	/**
	 * Merging.
	 * @return mixed
	 */
<<<<<<< HEAD
	function merge($value, $base);
=======
	function merge(mixed $value, mixed $base);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

	/**
	 * Validation and finalization.
	 * @return mixed
	 */
<<<<<<< HEAD
	function complete($value, Context $context);
=======
	function complete(mixed $value, Context $context);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

	/**
	 * @return mixed
	 */
	function completeDefault(Context $context);
}
