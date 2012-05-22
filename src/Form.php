<?php

namespace src;
use src\FormElementAggregator;

class Form implements FormElementAggregator
{
	private $elements;

	public function __construct()
	{
		$this->elements = new FormElementCollection();
	}

	public function addFormElement(FormElementInterface $Element)
	{
		$this->elements->addElement($Element);
	}

	public function __toString()
	{
		$string = '';

		$TemplateFactory = new FormElementTemplateFactory();

		foreach ($this->elements as $FormElement) {
			$string .= $TemplateFactory->getTemplate($FormElement);
		}

		return $string;
	}
}
