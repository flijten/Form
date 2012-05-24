<?php
namespace src;

class FormElementTemplateFactory
{

	/**
	 * @todo This is not OCP, adding an element should be easier. FormElements should offer the array with possible tokens and values for it themselves?
	 * @todo ofcourse, the templates will be replaces with a serious template engine soon (Twig?)
	 * @param FormElementInterface $FormElement
	 * @return mixed
	 */
	public function getTemplate(FormElementInterface $FormElement)
	{
		if ($FormElement instanceof FormElementText) {
			return str_replace(array('##formElementId##', '##formElementTitle##', '##formElementValue##'), array($FormElement->getId(), $FormElement->getTitle(), $FormElement->getValue()), $this->getFormElementTextTemplate());
		} else if ($FormElement instanceof FormElementInteger) {
			return str_replace(array('##formElementId##', '##formElementTitle##', '##formElementValue##'), array($FormElement->getId(), $FormElement->getTitle(), $FormElement->getValue()), $this->getFormElementIntegerTemplate());
		} else if ($FormElement instanceof FormElementHidden) {
			return str_replace(array('##formElementId##', '##formElementValue##'), array($FormElement->getId(), $FormElement->getValue()), $this->getFormElementHiddenTemplate());
		}
	}

	private function getFormElementTextTemplate()
	{
		return '<label for="##formElementId##">##formElementTitle##</label><input id="##formElementId##" type="text" value="##formElementValue##"/>';
	}

	private function getFormElementIntegerTemplate()
	{
		return '<label for="##formElementId##">##formElementTitle##</label><input id="##formElementId##" type="text" value="##formElementValue##"/>';
	}

	private function getFormElementHiddenTemplate()
	{
		return '<input id="##formElementId##" type="hidden" value="##formElementValue##"/>';
	}
}
