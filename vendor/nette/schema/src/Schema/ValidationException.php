<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette\Schema;

use Nette;


/**
 * Validation error.
 */
class ValidationException extends Nette\InvalidStateException
{
	/** @var Message[] */
<<<<<<< HEAD
	private $messages;
=======
	private array $messages;
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5


	/**
	 * @param  Message[]  $messages
	 */
	public function __construct(?string $message, array $messages = [])
	{
		parent::__construct($message ?: $messages[0]->toString());
		$this->messages = $messages;
	}


	/**
	 * @return string[]
	 */
	public function getMessages(): array
	{
		$res = [];
		foreach ($this->messages as $message) {
			$res[] = $message->toString();
		}

		return $res;
	}


	/**
	 * @return Message[]
	 */
	public function getMessageObjects(): array
	{
		return $this->messages;
	}
}
