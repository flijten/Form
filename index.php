<?php
require_once __DIR__ . '/src/AutoLoader.php';
\src\AutoLoader::register();

$Form = new \src\Form();
$Form->addFormElement( new \src\FormElementText('Test') );
$FormElementInteger = new \src\FormElementInteger('Integer');
$FormElementInteger->setValue('asd');
$Form->addFormElement( $FormElementInteger );

echo $Form;

var_dump($Form->isValid());

