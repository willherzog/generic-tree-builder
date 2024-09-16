<?php

namespace WHPHP\TreeBuilder;

/**
 * Interface for tree builders.
 *
 * @author Will Herzog <willherzog@gmail.com>
 */
interface TreeBuilderInterface
{
	/**
	 * Returns the root node; primary extension point for a tree builder.
	 */
	public function getRootNode(): RootNodeInterface;

	/**
	 * Returns all current tree nodes; primary output method for a tree builder.
	 */
	public function getTreeNodes(): iterable;
}
