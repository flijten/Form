<?php
namespace src;
use Iterator;
use ArrayAccess;
class FormElementCollection implements Iterator
{
	/**
	 * @var int
	 */
	private $position;

	/**
	 * @var array
	 */
	private $elements;

	/**
	 * @param array $elements
	 */
	public function __construct(array $elements = array())
	{
		$this->elements = $elements;
		$this->position = 0;
	}

	/**
	 * @param FormElementInterface $Element
	 */
	public function addFormElement(FormElementInterface $Element)
	{
		$this->elements[] = $Element;
	}

	/**
	 * @param 	int $position
	 * @return 	FormElementInterface
	 */
	public function getElementAt($position)
	{
		return $this->elements[$position - 1];
	}

	//iterator functions

	public function next()
	{
		++$this->position;
	}

	public function key()
	{
		return $this->position;
	}

	public function valid()
	{
		return isset($this->elements[$this->position]);
	}

	public function rewind()
	{
		$this->position = 0;
	}

	public function current()
	{
		return $this->elements[$this->position];
	}
}
