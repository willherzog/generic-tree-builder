<?php

namespace WHPHP\TreeBuilder;

use WHPHP\TreeBuilder\Exception\InvalidNodeClassException;

/**
 * A default root node implementation which allows the leaf and branch classes to be specified in the constructor.
 *
 * @author Will Herzog <willherzog@gmail.com>
 */
final class RootNode implements RootNodeInterface
{
	private string $leafClass;
	private string $branchClass;

	private array $leaves = [];
	private array $branches = [];

	public function __construct(string $leafClass, string $branchClass)
	{
		if( class_exists($leafClass) && in_array(LeafNodeInterface::class, class_parents($leafClass), true) ) {
			$this->leafClass = $leafClass;
		} else {
			throw new InvalidNodeClassException(LeafNodeInterface::class, $leafClass);
		}

		if( class_exists($branchClass) && in_array(BranchNodeInterface::class, class_parents($branchClass), true) ) {
			$this->branchClass = $branchClass;
		} else {
			throw new InvalidNodeClassException(BranchNodeInterface::class, $branchClass);
		}
	}

	public function addLeaf(...$leafParams): LeafNodeInterface
	{
		$leaf = new $this->leafClass(...$leafParams);

		$leaf->setParent($this);

		$this->leaves[] = $leaf;

		return $leaf;
	}

	public function getLeaves(): iterable
	{
		return $this->leaves;
	}

	public function addBranch(string $branchName, ...$branchParams): BranchNodeInterface
	{
		$branch = new $this->branchClass(...$branchParams);

		if( !isset($this->branches[$branchName]) ) {
			$branch->setParent($this);

			$this->branches[$branchName] = $branch;
		} else {
			throw new \LogicException(sprintf('A branch named "%s" already exists.', $branchName));
		}

		return $branch;
	}

	public function hasBranch(string $branchName): bool
	{
		return isset($this->branches[$branchName]);
	}

	public function getBranch(string $branchName): ?BranchNodeInterface
	{
		if( isset($this->branches[$branchName]) ) {
			return $this->branches[$branchName];
		}

		return null;
	}

	public function getBranches(): iterable
	{
		return $this->branches;
	}

	public function getParent(): ?NodeInterface
	{
		return null;
	}
}
