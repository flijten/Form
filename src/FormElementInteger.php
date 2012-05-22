<?php
namespace src;
use src\FormElementBase;

class FormElementInteger extends FormElementBase
{
	public function getValidators()
	{
		$validators = parent::getValidators();

		$validators[] = new ValidatorInteger($this);

		return $validators;
	}
}
