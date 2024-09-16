<?php

namespace WHPHP\TreeBuilder;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
interface NodeInterface
{
	public function getParent(): ?NodeInterface;

	public function end(): LeafNodeInterface|BranchNodeInterface|RootNodeInterface;
}
