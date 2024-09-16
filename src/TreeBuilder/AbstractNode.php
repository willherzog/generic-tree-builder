<?php

namespace WHPHP\TreeBuilder;

/**
 * A default node implementation; concrete leaf and branch classes may extend from this.
 */
abstract class AbstractNode implements NodeInterface
{
	private $parent;

	final public function setParent(NodeInterface $node): self
	{
		$this->parent = $node;

		return $this;
	}

	final public function hasParent(): bool
	{
		return $this->parent !== null;
	}

	final public function getParent(): ?NodeInterface
	{
		return $this->parent;
	}

	final public function end(): LeafNodeInterface|BranchNodeInterface|RootNodeInterface
	{
		if( !$this->hasParent() ) {
			throw new \LogicException('This method can only be called on child nodes.');
		}

		return $this->getParent();
	}
}
