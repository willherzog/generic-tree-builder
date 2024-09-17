<?php

namespace WHPHP\TreeBuilder;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
interface NodeInterface
{
	public function getParent(): NodeInterface|RootNodeInterface|null;

	public function end(): LeafNodeInterface|BranchNodeInterface|RootNodeInterface;
}
