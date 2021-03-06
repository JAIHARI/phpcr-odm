<?php

namespace Doctrine\ODM\PHPCR\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
use PHPCR\NodeInterface;

/**
 * This class represents an arbitrary node.
 *
 * It is used as a default document, for example with the ParentDocument annotation.
 * You can not use this to create nodes as it has no type annotation.
 *
 * @PHPCRODM\Document()
 */
class Generic
{
    /** @PHPCRODM\Id(strategy="parent") */
    protected $id;

    /** @PHPCRODM\Node */
    protected $node;

    /** @PHPCRODM\Nodename */
    protected $nodename;

    /** @PHPCRODM\ParentDocument */
    protected $parent;

    /**
     * @var Collection
     * @PHPCRODM\Children
     */
    protected $children;

    /**
     * @var Collection
     * @PHPCRODM\MixedReferrers
     */
    protected $referrers;

    /**
     * Id (path) of this document.
     *
     * @return string the id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * The node of for document.
     *
     * @return NodeInterface
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * The node name of the document.
     *
     * @return string
     */
    public function getNodename()
    {
        return $this->nodename;
    }

    /**
     * Set the node name of the document. (only mutable on new document before the persist).
     *
     * @param string $name the name of the document
     *
     * @return $this
     */
    public function setNodename($name)
    {
        $this->nodename = $name;

        return $this;
    }

    /**
     * The parent document of this document.
     *
     * @return object Folder document that is the parent of this node.
     */
    public function getParentDocument()
    {
        return $this->parent;
    }

    /**
     * Set the parent document of this document.
     *
     * @param object $parent Document that is the parent of this node..
     *
     * @return $this
     */
    public function setParentDocument($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * The children documents of this document.
     *
     * If there is information on the document type, the documents are of the
     * specified type, otherwise they will be Generic documents
     *
     * @return Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Sets the children.
     *
     * @param $children ArrayCollection
     *
     * @return $this
     */
    public function setChildren(ArrayCollection $children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * Add a child to this document.
     *
     * @param $child
     *
     * @return $this
     */
    public function addChild($child)
    {
        if (null === $this->children) {
            $this->children = new ArrayCollection();
        }

        $this->children->add($child);

        return $this;
    }

    /**
     * The documents having a reference to this document.
     *
     * If there is information on the document type, the documents are of the
     * specified type, otherwise they will be Generic documents
     *
     * @return Collection
     */
    public function getReferrers()
    {
        return $this->referrers;
    }

    /**
     * Sets the referrers.
     *
     * @param $referrers ArrayCollection
     *
     * @return $this;
     */
    public function setReferrers(ArrayCollection $referrers)
    {
        $this->referrers = $referrers;

        return $this;
    }

    /**
     * Add a referrer to this document.
     *
     * @param $referrer
     *
     * @return $this;
     */
    public function addReferrer($referrer)
    {
        if (null === $this->referrers) {
            $this->referrers = new ArrayCollection();
        }

        $this->referrers->add($referrer);

        return $this;
    }

    /**
     * String representation.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->nodename;
    }
}
