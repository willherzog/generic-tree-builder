<?php

namespace WHPHP\TreeBuilder;

/**
 * @author Will Herzog <willherzog@gmail.com>
 */
interface RootNodeInterface extends NodeInterface
{
	public function addLeaf(...$leafParams): LeafNodeInterface;

	public function getLeaves(): iterable;

	public function addBranch(string $branchName, ...$branchParams): BranchNodeInterface;

	public function hasBranch(string $branchName): bool;

	public function getBranch(string $branchName): ?BranchNodeInterface;

	public function getBranches(): iterable;
}
