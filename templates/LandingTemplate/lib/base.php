<?php

function block($name)
{
    global $config;
    include($config['base_dir'] . "/includes/block_head.php");
    
    $blockFile = $config['base_dir'] . "/blocks/". $name .".php";
    if (!file_exists($blockFile)) {
        file_put_contents($blockFile, '<div class="'.$name.'">' . $name . '</div>');
    }
    
    $styleFile = $config['base_dir'] . "/scss/_b_". $name .".scss";
    if (!file_exists($styleFile)) {
        file_put_contents($styleFile, '.' . $name . ' {}');
    }

    include($blockFile);
    include($config['base_dir'] . "/includes/block_foot.php");
}