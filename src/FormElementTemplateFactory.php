<?php
namespace src;

class FormElementTemplateFactory
{
	public function getTemplate(FormElementInterface $FormElement)
	{
		if ($FormElement instanceof FormElementText) {
			return str_replace(array('##formElementId##', '##formElementTitle##'), array($FormElement->getId(), $FormElement->getTitle()), $this->getFormElementTextTemplate());
		}
	}

	private function getFormElementTextTemplate()
	{
		return '<label for="##formElementId##">##formElementTitle##</label><input type="text" />';
	}

	private function getFormElementIntegerTemplate()
	{
		return '<label for="##formElementId##">##formElementTitle##</label><input type="text" />';
	}
}
