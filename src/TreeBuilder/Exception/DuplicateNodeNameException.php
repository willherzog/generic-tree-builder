<?php

namespace WHPHP\TreeBuilder\Exception;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
class DuplicateNodeNameException extends \InvalidArgumentException implements TreeBuilderException
{
	public function __construct(string $branchName, int $code = 0, \Throwable|null $previous = null)
	{
		parent::__construct(sprintf('A node named "%s" already exists.', $branchName), $code, $previous);
	}
}
