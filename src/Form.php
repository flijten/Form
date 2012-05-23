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

	/**
	 * @param FormElementInterface $Element
	 */
	public function addFormElement(FormElementInterface $Element)
	{
		$this->elements->addFormElement($Element);
	}

	/**
	 * @return bool
	 */
	public function isValid()
	{
		$valid = true;

		foreach ($this->elements as $FormElement) {
			if ( ! $FormElement->isValid()) {
				$valid = false;
				break;
			}
		}

		return $valid;
	}

	/**
	 * @return string
	 */
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
