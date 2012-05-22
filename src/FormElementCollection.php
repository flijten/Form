<?php
namespace src;
use Iterator;
class FormElementCollection implements Iterator
{
	private $position;
	private $elements;

	public function __construct(array $elements = array())
	{
		$this->elements = $elements;
		$this->position = 0;
	}

	public function addElement(FormElementInterface $Element)
	{
		$this->elements[] = $Element;
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
