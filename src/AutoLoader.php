<?php
namespace src;

function r($input)
{
	echo "<pre>";
	echo print_r($input, true);
	echo "</pre>";
}

class AutoLoader
{
	public static function register()
	{
		spl_autoload_register(__NAMESPACE__ . '\AutoLoader::loadClass');
	}

	public static function loadClass($className)
	{
		$path = __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';

		if (file_exists($path)) {
			require_once $path;
		}
	}
}
