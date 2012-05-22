<?php
namespace src;

interface FormElementInterface
{
	public function __construct($title, $id = null);

	/**
	 * @return string
	 */
	public function getId();

	/**
	 * @return string
	 */
	public function getTitle();

	/**
	 * @return mixed
	 */
	public function getValue();

	/**
	 * @param $value
	 */
	public function setValue($value);

	/**
	 * Returns an array of FormElementValidator Objects
	 * @return array
	 */
	public function getValidators();
}
