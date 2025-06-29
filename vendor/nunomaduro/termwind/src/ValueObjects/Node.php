<?php

declare(strict_types=1);

namespace Termwind\ValueObjects;

use Generator;

/**
 * @internal
 */
final class Node
{
    /**
     * A value object with helper methods for working with DOM node.
     */
<<<<<<< HEAD
    public function __construct(private \DOMNode $node)
    {
    }
=======
    public function __construct(private \DOMNode $node) {}
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

    /**
     * Gets the value of the node.
     */
    public function getValue(): string
    {
        return $this->node->nodeValue ?? '';
    }

    /**
     * Gets child nodes of the node.
     *
     * @return Generator<Node>
     */
    public function getChildNodes(): Generator
    {
        foreach ($this->node->childNodes as $node) {
<<<<<<< HEAD
            yield new static($node);
=======
            yield new self($node);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
        }
    }

    /**
     * Checks if the node is a text.
     */
    public function isText(): bool
    {
        return $this->node instanceof \DOMText;
    }

    /**
     * Checks if the node is a comment.
     */
    public function isComment(): bool
    {
        return $this->node instanceof \DOMComment;
    }

    /**
     * Compares the current node name with a given name.
     */
    public function isName(string $name): bool
    {
        return $this->getName() === $name;
    }

    /**
     * Returns the current node type name.
     */
    public function getName(): string
    {
        return $this->node->nodeName;
    }

    /**
     * Returns value of [class] attribute.
     */
    public function getClassAttribute(): string
    {
        return $this->getAttribute('class');
    }

    /**
     * Returns value of attribute with a given name.
     */
    public function getAttribute(string $name): string
    {
        if ($this->node instanceof \DOMElement) {
            return $this->node->getAttribute($name);
        }

        return '';
    }

    /**
     * Checks if the node is empty.
     */
    public function isEmpty(): bool
    {
        return $this->isText() && preg_replace('/\s+/', '', $this->getValue()) === '';
    }

    /**
     * Gets the previous sibling from the node.
     */
    public function getPreviousSibling(): static|null
    {
        $node = $this->node;

        while ($node = $node->previousSibling) {
<<<<<<< HEAD
            $node = new static($node);
=======
            $node = new self($node);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

            if ($node->isEmpty()) {
                $node = $node->node;

                continue;
            }

            if (! $node->isComment()) {
                return $node;
            }

            $node = $node->node;
        }

<<<<<<< HEAD
        return is_null($node) ? null : new static($node);
=======
        return is_null($node) ? null : new self($node);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Gets the next sibling from the node.
     */
    public function getNextSibling(): static|null
    {
        $node = $this->node;

        while ($node = $node->nextSibling) {
<<<<<<< HEAD
            $node = new static($node);
=======
            $node = new self($node);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5

            if ($node->isEmpty()) {
                $node = $node->node;

                continue;
            }

            if (! $node->isComment()) {
                return $node;
            }

            $node = $node->node;
        }

<<<<<<< HEAD
        return is_null($node) ? null : new static($node);
=======
        return is_null($node) ? null : new self($node);
>>>>>>> 4c2526d8c3461b141e11c9b74940c69c0053e8f5
    }

    /**
     * Checks if the node is the first child.
     */
    public function isFirstChild(): bool
    {
        return is_null($this->getPreviousSibling());
    }

    /**
     * Gets the inner HTML representation of the node including child nodes.
     */
    public function getHtml(): string
    {
        $html = '';
        foreach ($this->node->childNodes as $child) {
            if ($child->ownerDocument instanceof \DOMDocument) {
                $html .= $child->ownerDocument->saveXML($child);
            }
        }

        return html_entity_decode($html);
    }

    /**
     * Converts the node to a string.
     */
    public function __toString(): string
    {
        if ($this->isComment()) {
            return '';
        }

        if ($this->getValue() === ' ') {
            return ' ';
        }

        if ($this->isEmpty()) {
            return '';
        }

        $text = preg_replace('/\s+/', ' ', $this->getValue()) ?? '';

        if (is_null($this->getPreviousSibling())) {
            $text = ltrim($text);
        }

        if (is_null($this->getNextSibling())) {
            $text = rtrim($text);
        }

        return $text;
    }
}
