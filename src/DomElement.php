<?php declare(strict_types=1);

namespace FeedBox\XmlManipulate;


final class DomElement
{
    private \DOMElement $element;

    public function __construct(\DOMElement $element)
    {
        $this->element = $element;
    }

    public function getElementByTagName(string $name, int $item = 0): ?DomElement
    {
        $nodes = $this->getElement()->getElementsByTagName($name);

        if ($nodes->length < $item) {
            return null;
        }

        $node = $nodes->item($item);

        if ($node === null) {
            return null;
        }

        return new self($node);
    }

    public function getValue(): string
    {
        return $this->getElement()->nodeValue;
    }

    public function getTagName(): string
    {
        return $this->getElement()->tagName;
    }

    public function getNodeName(): string
    {
        return $this->getElement()->nodeName;
    }

    public function getElement(): \DOMElement
    {
        return $this->element;
    }
}