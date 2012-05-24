<?php

use src\Form;

class FormTest extends PHPUnit_Framework_TestCase
{
	public function testFormShouldReportSubmittedIfRequestInformationIsCorrect()
	{
		$formId = 'test_id';
		$_REQUEST['form_submitted_' . $formId] = 1;
		$Form = new Form($formId);

		$this->assertTrue($Form->isSubmitted());
	}

	public function testFormShouldReportNotSubmittedIfRequestInformationIsNotSet()
	{
		$formId = 'test_id';
		$Form = new Form('Title', $formId);

		$this->assertFalse($Form->isSubmitted());
	}
}
