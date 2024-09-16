<?php

namespace WHPHP\TreeBuilder;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
interface LeafNodeInterface extends NodeInterface
{
	public function setParent(NodeInterface $node): NodeInterface;

	public function hasParent(): bool;
}
