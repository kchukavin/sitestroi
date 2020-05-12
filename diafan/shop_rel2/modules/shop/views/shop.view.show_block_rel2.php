<?php

if (! defined('DIAFAN'))
{
    $path = __FILE__;
	while(! file_exists($path.'/includes/404.php'))
	{
		$parent = dirname($path);
		if($parent == $path) exit;
		$path = $parent;
	}
	include $path.'/includes/404.php';
}

if(empty($result['rows'])) return false;


	echo '<div class="other_prod">
    <h3>'.$this->diafan->_('Аналоги').'</h3>
	<div class="other_prod_slider other_prod_analog">';
    foreach ($result['rows'] as $row)
    {		
    	echo '<div class="item">';
    	echo '<a href="'.BASE_PATH_HREF.$row["link"].'">';
        if(! empty($row["img"]))
    	{
    		echo '<span class="img">';
    		foreach ($row["img"] as $img)
    		{
    			echo '<img src="'.$img["src"].'" alt="'.$img["alt"].'" title="'.$img["title"].'" image_id="'.$img["id"].'" class="js_shop_img">';
    		}
    		echo '</span>';
    	}
    	echo '<span class="name">'.$row["name"].'</span>';
        
        echo '</a>';
    	echo '</div>';		
    }
	echo '</div>
    </div>';
