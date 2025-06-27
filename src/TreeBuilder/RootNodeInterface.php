<?php

namespace WHPHP\TreeBuilder;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
interface RootNodeInterface
{
	public function addLeaf(string $nodeName, ...$leafParams): LeafNodeInterface;

	public function addBranch(string $nodeName, ...$branchParams): BranchNodeInterface;

	public function hasNode(string $nodeName): bool;

	public function getNode(string $nodeName): LeafNodeInterface|BranchNodeInterface|null;

	public function getNodes(): iterable;

	public function getParent(): null;
}
