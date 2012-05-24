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
		if ($FormElement instanceof \src\FormElements\FormElementText) {
			return str_replace(array('##formElementId##', '##formElementTitle##', '##formElementValue##'), array($FormElement->getId(), $FormElement->getTitle(), $FormElement->getValue()), $this->getFormElementTextTemplate());
		} else if ($FormElement instanceof \src\FormElements\FormElementInteger) {
			return str_replace(array('##formElementId##', '##formElementTitle##', '##formElementValue##'), array($FormElement->getId(), $FormElement->getTitle(), $FormElement->getValue()), $this->getFormElementIntegerTemplate());
		} else if ($FormElement instanceof \src\FormElements\FormElementHidden) {
			return str_replace(array('##formElementId##', '##formElementValue##'), array($FormElement->getId(), $FormElement->getValue()), $this->getFormElementHiddenTemplate());
		} else if ($FormElement instanceof \src\FormElements\FormElementSubmit) {
			return str_replace(array('##formElementId##', '##formElementTitle##'), array($FormElement->getId(), $FormElement->getTitle()), $this->getFormElementSubmitTemplate());
		}
	}

	private function getFormElementTextTemplate()
	{
		return '<label for="##formElementId##">##formElementTitle##</label><input id="##formElementId##" name="##formElementId##" type="text" value="##formElementValue##"/>';
	}

	private function getFormElementIntegerTemplate()
	{
		return '<label for="##formElementId##">##formElementTitle##</label><input id="##formElementId##" name="##formElementId##" type="text" value="##formElementValue##"/>';
	}

	private function getFormElementHiddenTemplate()
	{
		return '<input id="##formElementId##" name="##formElementId##" type="hidden" value="##formElementValue##"/>';
	}

	private function getFormElementSubmitTemplate()
	{
		return '<button id="##formElementId##" name="##formElementId##" type="submit">##formElementTitle##</button>';
	}
}
