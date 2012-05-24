<?php

namespace src;
use src\FormElementAggregator;

class Form implements FormElementAggregator
{
	private $elements;
	private $id;

	public function __construct($id)
	{
		$this->elements = new FormElementCollection();
		$this->id = $id;
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
		$string = '<form id="' . $this->id . '">' ;

		$TemplateFactory = new FormElementTemplateFactory();

		foreach ($this->elements as $FormElement) {
			$string .= $TemplateFactory->getTemplate($FormElement);
		}

		$string .= '</form>';

		return $string;
	}
}
