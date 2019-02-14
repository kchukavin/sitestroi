<?php

$LOGS = false;

$rootDir = fixWindowsPath(__DIR__) . '/../';

$tasks = array(
	array(
		'import_dir' => 'app/sass/',
		'import_file' => 'main.scss',
		'output_dir' => 'app/css/',
		'output_file' => 'generated.css',
	),
	array(
		'import_dir' => 'app/sass/',
		'import_file' => 'm_main.scss',
		'output_dir' => 'app/css/',
		'output_file' => 'm_generated.css',
	),
);

