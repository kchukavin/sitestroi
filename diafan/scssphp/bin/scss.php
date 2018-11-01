<?php
require __DIR__ . '/../vendor/leafo/scssphp/scss.inc.php';
require __DIR__ . '/../vendor/leafo/scssphp/example/Server.php';

use Leafo\ScssPhp\Compiler;

// CONFIG BEGIN

$LOGS = false;

$rootDir = fixWindowsPath(__DIR__) . '/../';

$tasks = array(
	array(
		'import_dir' => 'custom/my/scss/',
		'import_file' => 'styles.scss',
		'output_dir' => 'custom/my/css/',
		'output_file' => 'generated.css',
	),
);

// CONFIG END

writeLog('Processing:<br>');

foreach ($tasks as $task) {
	$outputFile = $rootDir . $task['output_dir'] . $task['output_file'];
	$hashFile = $outputFile . '.hash';
	$importDir = $rootDir . $task['import_dir'];

	writeLog($task['import_dir'] . ' => ' . $task['output_file'] . "... ");
	$oldHash = loadHash($hashFile);
	$newHash = calcFilesHash($importDir);
	
	if ($oldHash === $newHash) {
		writeLog("No changes.\n");
		continue;
	}
	
	saveHash($hashFile, $newHash);
	
	$scss = new Compiler();
	$scss->setImportPaths($importDir);
	$scss->setSourceMap(Compiler::SOURCE_MAP_FILE);
	$scss->setSourceMapOptions(array(
	    //'sourceRoot' => realpath($task['import_dir']),
	    'sourceMapWriteTo' => $outputFile . '.map',
	    'sourceMapURL' => $task['output_file'] . '.map',
	    'sourceMapBasepath' => $importDir,
	    'sourceMapRootpath' => '/' . $task['import_dir'],
	));

	writeLog('Compiling... ');
	file_put_contents($outputFile, $scss->compile('@import "'. $task['import_file'] .'";'));
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

function scanFileTimes($target)
{
	$r = array();

	if(is_dir($target)) {

		$files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

		foreach($files as $file)
		{
			$r = array_merge($r, scanFileTimes($file));
		}
	} else {
		$r[] = filemtime($target);
	}

	return $r;
}

function calcFilesHash($dir)
{
	$data = implode(scanFileTimes($dir));
	return md5($data);
}


function fixWindowsPath($path, $addEndSlash = false)
{
    $slash = ($addEndSlash) ? '/' : '';

    if (! empty($path)) {
        $path = str_replace('\\', '/', $path);
        $path = rtrim($path, '/') . $slash;
    }

    return $path;
}

function writeLog($msg)
{
	global $LOGS;
	if ($LOGS) echo $msg;
}
