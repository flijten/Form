<?php

namespace src;
use src\FormElementAggregator;
use src\FormElements\FormElementHidden;

class Form implements FormElementAggregator
{
	private $elements;
	private $id;

	public function __construct($id)
	{
		$this->id = $id;
		$SubmissionCheck = new FormElementHidden('hidden name??', 'form_submitted_' . $this->id);
		$SubmissionCheck->setValue(1);
		$this->elements = new FormElementCollection();
		$this->elements->addFormElement($SubmissionCheck);
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

	public function isSubmitted()
	{
		return isset($_REQUEST['form_submitted_' . $this->id]);
	}

	/**
	 * @todo all logic should go to a renderer class.
	 * Maybe toString should not be used at all? Renderer::render($Form) ??
	 *
	 * @return string
	 */
	public function __toString()
	{
		$string = '<form id="' . $this->id . '" method="post">' ;

		$TemplateFactory = new FormElementTemplateFactory();

		foreach ($this->elements as $FormElement) {
			$string .= $TemplateFactory->getTemplate($FormElement);
		}

		$string .= '</form>';

		return $string;
	}
}
