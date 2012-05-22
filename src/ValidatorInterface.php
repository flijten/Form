<?php
namespace src;

interface ValidatorInterface
{
	/**
	 * @param FormElementInterface $FormElement
	 */
	public function __construct(FormElementInterface $FormElement);

	/**
	 * @return boolean
	 */
	public function isValid();
}
