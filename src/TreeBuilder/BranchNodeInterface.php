<?php

namespace WHPHP\TreeBuilder;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
interface BranchNodeInterface extends LeafNodeInterface
{
	public function addLeaf(...$leafParams): LeafNodeInterface;

	public function getLeaves(): iterable;

	public function addBranch(...$branchParams): BranchNodeInterface;

	public function getBranches(): iterable;
}
