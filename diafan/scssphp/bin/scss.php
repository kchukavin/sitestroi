<?php
require __DIR__ . '/../vendor/leafo/scssphp/scss.inc.php';
require __DIR__ . '/../vendor/leafo/scssphp/example/Server.php';

use Leafo\ScssPhp\Compiler;

// CONFIG BEGIN

$LOGS = true;

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

// CONFIG END

writeLog('Processing:<br>');

foreach ($tasks as $task) {
	writeLog($task['import_dir'] . ' => ' . $task['output_file'] . "... ");
	$oldHash = loadHash($task['output_file'] . '.hash');
	$newHash = calcFilesHash($task['import_dir']);
	
	if ($oldHash === $newHash) {
		writeLog("No changes.\n");
		continue;
	}
	
	saveHash($task['output_file'] . '.hash', $newHash);
	
	$scss = new Compiler();
	$scss->setImportPaths($task['import_dir']);

	writeLog('Compiling... ');
	file_put_contents($task['output_file'], $scss->compile('@import "'. $task['import_file'] .'";'));
	writeLog(' done.<br>');
}


function loadHash($filename)
{
	if (!file_exists($filename)) return '';
	return file_get_contents($filename);
}

function saveHash($filename, $hash)
{
	return file_put_contents($filename, $hash);
}

function calcFilesHash($dir)
{
	$data = '';
	foreach (scandir($dir) as $filename) {
		$data .= filemtime($dir . '/' . $filename);
	}
	return md5($data);
}

function writeLog($msg)
{
	if ($LOGS) echo $msg;
}
