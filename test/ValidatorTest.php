<?php
use src\Form;
use src\ValidatorInteger;
use src\FormElements\FormElementInteger;
use src\FormElements\FormElementText;

class ValidatorTest extends PHPUnit_Framework_TestCase
{
	public function testInvalidElementShouldFailCompleteForm()
	{
		$Form = new Form('id');

		$TextElement = new FormElementText('text field');
		$TextElement->setValue('text value');
		$Form->addFormElement($TextElement);

		$IntegerElement = new FormElementInteger('integer field');
		$IntegerElement->setValue('text value');

		$Form->addFormElement($IntegerElement);

		$this->assertFalse($Form->isValid());
	}

	public function testValidElementsShouldResultInValidForm()
	{
		$Form = new Form('id');
		$TextElement = new FormElementText('text field');
		$TextElement->setValue('text value');
		$Form->addFormElement($TextElement);

		$IntegerElement = new FormElementInteger('integer field');
		$IntegerElement->setValue(123);
		$Form->addFormElement($IntegerElement);


		$this->assertTrue($Form->isValid());
	}

	public function testValidatorIntegerShouldFailOnText()
	{
		$FormElementInteger = new FormElementInteger('Integer');
		$FormElementInteger->setValue('asd');
		$Validator = new ValidatorInteger($FormElementInteger);

		$this->assertFalse($Validator->isValid());
	}

	public function testValidatorIntegerShouldFailFloatingPointNumbers()
	{
		$FormElementInteger = new FormElementInteger('Integer');
		$FormElementInteger->setValue(123.15);
		$Validator = new ValidatorInteger($FormElementInteger);

		$this->assertFalse($Validator->isValid());
	}

	public function testValidatorIntegerShouldSucceedOnIntegers()
	{
		$FormElementInteger = new FormElementInteger('Integer');
		$FormElementInteger->setValue(123);
		$Validator = new ValidatorInteger($FormElementInteger);

		$this->assertTrue($Validator->isValid());
	}
}
