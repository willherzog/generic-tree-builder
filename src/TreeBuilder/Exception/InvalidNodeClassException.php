<?php

namespace WHPHP\TreeBuilder\Exception;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
class InvalidNodeClassException extends \InvalidArgumentException
{
	public function __construct(string $expectedClass, string $actualClass, int $code = 0, \Throwable|null $previous = null)
	{
		$message = sprintf('The class "%s" either does not exist or does not implement %s.', $actualClass, $expectedClass);

		parent::__construct($message, $code, $previous);
	}
}
