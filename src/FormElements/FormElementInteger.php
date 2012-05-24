<?php
namespace src\FormElements;
use src\FormElements\FormElementBase;
use src\ValidatorInteger;

class FormElementInteger extends FormElementBase
{
	/**
	 * Returns an array of FormElementValidator Objects
	 * @return array
	 */
	public function getValidators()
	{
		$validators = parent::getValidators();

		$validators[] = new ValidatorInteger($this);

		return $validators;
	}
}
