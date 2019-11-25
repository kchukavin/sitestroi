<?php

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
    /* and some other tasks:
    array(
        'import_dir' => 'custom/my/scss/',
        'import_file' => 'styles.scss',
        'output_dir' => 'custom/my/css/',
        'output_file' => 'generated.css',
    ),
    */
);

// CONFIG END
