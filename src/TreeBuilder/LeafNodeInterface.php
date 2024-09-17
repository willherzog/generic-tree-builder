<?php

namespace WHPHP\TreeBuilder;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
interface LeafNodeInterface extends NodeInterface
{
	public function setParent(NodeInterface|RootNodeInterface $node): static;

	public function hasParent(): bool;
}
