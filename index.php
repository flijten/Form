<?php
require_once __DIR__ . '/src/AutoLoader.php';
\src\AutoLoader::register();

$Form = new \src\Form();
$Form->addFormElement( new \src\FormElementText('Test') );
$Form->addFormElement( new \src\FormElementInteger('Test') );

echo $Form;

