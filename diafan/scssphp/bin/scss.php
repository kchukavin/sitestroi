<?php
require __DIR__ . '/../vendor/leafo/scssphp/scss.inc.php';
require __DIR__ . '/../vendor/leafo/scssphp/example/Server.php';

use Leafo\ScssPhp\Compiler;

$customDir = __DIR__ . '/../custom/tatartdom2017';

$tasks = array(
	array(
		'import_dir' => $customDir . '/css/sass/',
		'import_file' => 'styles_add.scss',
		'output_file' => $customDir . '/css/styles_add.css',
	),
	array(
		'import_dir' => $customDir . '/css/m_sass/',
		'import_file' => 'main.scss',
		'output_file' => $customDir . '/css/m/main.css',
	),
);


foreach ($tasks as $task) {
	$scss = new Compiler();
	$scss->setImportPaths($task['import_dir']);

	echo 'Compiling... ';
	file_put_contents($task['output_file'], $scss->compile('@import "'. $task['import_file'] .'";'));
	echo $task['output_file'] . ' done.<br>';
}

