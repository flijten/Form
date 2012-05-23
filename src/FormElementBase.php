<?php
namespace src;
use src\FormElementInterface;

class FormElementBase implements FormElementInterface
{
	private $title;

	private $id;

	private $value;

	private static $lastGeneratedId = 0;

	function __construct($title, $id = null)
	{
		$this->title = $title;

		if (is_null($id)) {
			$id = $this->generateId();
		}

		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	public function setValue($value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function isValid()
	{
		$valid = true;

		foreach ($this->getValidators() as $Validator) {
			if ( ! $Validator->isValid()) {
				$valid = false;
				break;
			}
		}

		return $valid;
	}

	/**
	 * Returns an array of FormElementValidator Objects
	 * @return array
	 */
	public function getValidators()
	{
		return array();
	}

	private function generateId()
	{
		FormElementBase::$lastGeneratedId++;
		return 'form_id_' . FormElementBase::$lastGeneratedId;
	}
}
