<?php
namespace src;

class ValidatorInteger implements ValidatorInterface
{
	/**
	 * @var FormElementInterface
	 */
	private $FormElement;

	/**
	 * @param FormElementInterface $FormElement
	 */
	public function __construct(FormElementInterface $FormElement)
	{
		$this->FormElement = $FormElement;
	}

	/**
	 * @return boolean
	 */
	public function isValid()
	{
		$value = $this->FormElement->getValue();

		return (filter_var($value, FILTER_VALIDATE_INT) !== false);
	}

}