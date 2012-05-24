<?php
use src\FormElements\FormElementText;

class ElementCollectionTest extends PHPUnit_Framework_TestCase
{
	public function testElementShouldBeAggregatedInOrderOfAddition()
	{
		$elementTitle1 = 'element 1';
		$elementTitle2 = 'element 2';

		$ElementCollection = new \src\FormElementCollection();
		$ElementCollection->addFormElement(new FormElementText($elementTitle1));
		$ElementCollection->addFormElement(new FormElementText($elementTitle2));

		$Element1 = $ElementCollection->getElementAt(1);
		$this->assertSame($elementTitle1, $Element1->getTitle());
		$Element2 = $ElementCollection->getElementAt(2);
		$this->assertSame($elementTitle2, $Element2->getTitle());
	}
}
