<?php
namespace src;
require_once __DIR__ . '/src/AutoLoader.php';
\src\AutoLoader::register();

$Form = new \src\Form('testForm');
$Form->addFormElement( new \src\FormElements\FormElementText('Test') );
$FormElementInteger = new \src\FormElements\FormElementInteger('Integer');
$FormElementInteger->setValue(123);
$Form->addFormElement( $FormElementInteger );
$Form->addFormElement( new \src\FormElements\FormElementSubmit('Versturen!') );
echo $Form;

if ($Form->isSubmitted()) {
	r($_REQUEST);
}