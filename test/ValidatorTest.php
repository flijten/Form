<?php
use src\ValidatorInteger;
use src\FormElementInteger;

class ValidatorTest extends PHPUnit_Framework_TestCase
{
	public function testValidatorIntegerShouldFailOnText()
	{
		$FormElementInteger = new \src\FormElementInteger('Integer');
		$FormElementInteger->setValue('asd');
		$Validator = new ValidatorInteger($FormElementInteger);

		$this->assertFalse($Validator->isValid());
	}

	public function testValidatorIntegerShouldFailFloatingPointNumbers()
	{
		$FormElementInteger = new \src\FormElementInteger('Integer');
		$FormElementInteger->setValue(123.15);
		$Validator = new ValidatorInteger($FormElementInteger);

		$this->assertFalse($Validator->isValid());
	}

	public function testValidatorIntegerShouldSucceedOnIntegers()
	{
		$FormElementInteger = new \src\FormElementInteger('Integer');
		$FormElementInteger->setValue(123);
		$Validator = new ValidatorInteger($FormElementInteger);

		$this->assertTrue($Validator->isValid());
	}
}
