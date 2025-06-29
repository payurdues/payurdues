<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette\Schema\Elements;

use Nette;
use Nette\Schema\Context;
use Nette\Schema\Helpers;


/**
 * @internal
 */
trait Base
{
<<<<<<< HEAD
	/** @var bool */
	private $required = false;

	/** @var mixed */
	private $default;

	/** @var callable|null */
	private $before;

	/** @var callable[] */
	private $transforms = [];

	/** @var string|null */
	private $deprecated;


	public function default($value): self
=======
	private bool $required = false;
	private mixed $default = null;

	/** @var ?callable */
	private $before;

	/** @var callable[] */
	private array $transforms = [];
	private ?string $deprecated = null;


	public function default(mixed $value): self
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
	{
		$this->default = $value;
		return $this;
	}


	public function required(bool $state = true): self
	{
		$this->required = $state;
		return $this;
	}


	public function before(callable $handler): self
	{
		$this->before = $handler;
		return $this;
	}


	public function castTo(string $type): self
	{
		return $this->transform(Helpers::getCastStrategy($type));
	}


	public function transform(callable $handler): self
	{
		$this->transforms[] = $handler;
		return $this;
	}


	public function assert(callable $handler, ?string $description = null): self
	{
		$expected = $description ?: (is_string($handler) ? "$handler()" : '#' . count($this->transforms));
		return $this->transform(function ($value, Context $context) use ($handler, $description, $expected) {
			if ($handler($value)) {
				return $value;
			}
			$context->addError(
				'Failed assertion ' . ($description ? "'%assertion%'" : '%assertion%') . ' for %label% %path% with value %value%.',
				Nette\Schema\Message::FailedAssertion,
<<<<<<< HEAD
				['value' => $value, 'assertion' => $expected]
=======
				['value' => $value, 'assertion' => $expected],
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
			);
		});
	}


	/** Marks as deprecated */
	public function deprecated(string $message = 'The item %path% is deprecated.'): self
	{
		$this->deprecated = $message;
		return $this;
	}


<<<<<<< HEAD
	public function completeDefault(Context $context)
=======
	public function completeDefault(Context $context): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
	{
		if ($this->required) {
			$context->addError(
				'The mandatory item %path% is missing.',
<<<<<<< HEAD
				Nette\Schema\Message::MissingItem
=======
				Nette\Schema\Message::MissingItem,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
			);
			return null;
		}

		return $this->default;
	}


<<<<<<< HEAD
	public function doNormalize($value, Context $context)
=======
	public function doNormalize(mixed $value, Context $context): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
	{
		if ($this->before) {
			$value = ($this->before)($value);
		}

		return $value;
	}


	private function doDeprecation(Context $context): void
	{
		if ($this->deprecated !== null) {
			$context->addWarning(
				$this->deprecated,
<<<<<<< HEAD
				Nette\Schema\Message::Deprecated
=======
				Nette\Schema\Message::Deprecated,
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
			);
		}
	}


<<<<<<< HEAD
	private function doTransform($value, Context $context)
=======
	private function doTransform(mixed $value, Context $context): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
	{
		$isOk = $context->createChecker();
		foreach ($this->transforms as $handler) {
			$value = $handler($value, $context);
			if (!$isOk()) {
				return null;
			}
		}
		return $value;
	}


	/** @deprecated use Nette\Schema\Validators::validateType() */
<<<<<<< HEAD
	private function doValidate($value, string $expected, Context $context): bool
=======
	private function doValidate(mixed $value, string $expected, Context $context): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
	{
		$isOk = $context->createChecker();
		Helpers::validateType($value, $expected, $context);
		return $isOk();
	}


	/** @deprecated use Nette\Schema\Validators::validateRange() */
<<<<<<< HEAD
	private static function doValidateRange($value, array $range, Context $context, string $types = ''): bool
=======
	private static function doValidateRange(mixed $value, array $range, Context $context, string $types = ''): bool
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
	{
		$isOk = $context->createChecker();
		Helpers::validateRange($value, $range, $context, $types);
		return $isOk();
	}


	/** @deprecated use doTransform() */
<<<<<<< HEAD
	private function doFinalize($value, Context $context)
=======
	private function doFinalize(mixed $value, Context $context): mixed
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
	{
		return $this->doTransform($value, $context);
	}
}
