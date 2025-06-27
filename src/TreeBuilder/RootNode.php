<?php

namespace WHPHP\TreeBuilder;

use WHPHP\TreeBuilder\Exception\DuplicateNodeNameException;
use WHPHP\TreeBuilder\Exception\InvalidNodeClassException;

/**
 * A default root node implementation which allows the leaf and branch classes to be specified in the constructor.
 *
 * @author Will Herzog <willherzog@gmail.com>
 */
class RootNode implements RootNodeInterface
{
	private string $leafClass;
	private string $branchClass;

	private array $nodes = [];

	public function __construct(string $leafClass, string $branchClass)
	{
		if( class_exists($leafClass) && in_array(LeafNodeInterface::class, class_implements($leafClass), true) ) {
			$this->leafClass = $leafClass;
		} else {
			throw new InvalidNodeClassException(LeafNodeInterface::class, $leafClass);
		}

		if( class_exists($branchClass) && in_array(BranchNodeInterface::class, class_implements($branchClass), true) ) {
			$this->branchClass = $branchClass;
		} else {
			throw new InvalidNodeClassException(BranchNodeInterface::class, $branchClass);
		}
	}

	public function addLeaf(string $nodeName, ...$leafParams): LeafNodeInterface
	{
		$leaf = new $this->leafClass($nodeName, ...$leafParams);

		if( !isset($this->nodes[$nodeName]) ) {
			$leaf->setParent($this);

			$this->nodes[$nodeName] = $leaf;
		} else {
			throw new DuplicateNodeNameException($nodeName);
		}

		return $leaf;
	}

	public function addBranch(string $nodeName, ...$branchParams): BranchNodeInterface
	{
		$branch = new $this->branchClass($nodeName, ...$branchParams);

		if( !isset($this->nodes[$nodeName]) ) {
			$branch->setParent($this);

			$this->nodes[$nodeName] = $branch;
		} else {
			throw new DuplicateNodeNameException($nodeName);
		}

		return $branch;
	}

	public function hasNode(string $nodeName): bool
	{
		return isset($this->nodes[$nodeName]);
	}

	public function getNode(string $branchName): LeafNodeInterface|BranchNodeInterface|null
	{
		if( isset($this->nodes[$branchName]) ) {
			return $this->nodes[$branchName];
		}

		return null;
	}

	public function getNodes(): iterable
	{
		return $this->nodes;
	}

	final public function getParent(): null
	{
		return null;
	}
}
