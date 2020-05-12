<?php
/**
 * @package    DIAFAN.CMS
 *
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2016 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
{
	$path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}

/**
 * Edit_functions_admin
 *
 * Функции редактирования полей
 */
class Edit_functions_admin extends Diafan
{	


    new public function edit_variable_rel2_elements()
	{
	    $rel_two_sided = $this->diafan->configmodules("rel2_two_sided", $this->diafan->_admin->module, (! empty($this->values["site_id"]) ? $this->values["site_id"] : $this->diafan->_route->site));

        
        if($this->diafan->variable_list("name", "variable"))
		{
			$name = $this->diafan->variable_list("name", "variable");
		}
		else
		{
			$name = 'name';
		}
		echo '
		<div class="unit" id="rel2_elements" rel2_two_sided="'.($rel_two_sided ? 'true' : '').'">
			<div class="infofield">'.$this->diafan->variable_name().$this->diafan->help().'</div>
				<div class="rel2_elements">';
		if ( ! $this->diafan->is_new)
		{
            $rows = DB::query_fetch_all("SELECT s.id, s.[".$name."], s.site_id FROM {".$this->diafan->table."} AS s"
					." INNER JOIN {".$this->diafan->table."_rel2} AS r ON s.id=r.rel2_element_id AND r.element_id=%d"
					.($rel_two_sided ? " OR s.id=r.element_id AND r.rel2_element_id=".$this->diafan->id : "")
                    ." WHERE s.trash='0' GROUP BY s.id",
					$this->diafan->id
				);
			foreach ($rows as $row)
			{
				$link = $this->diafan->_route->link($row["site_id"], $row["id"], $this->diafan->table);
				if($this->diafan->is_variable("images") || $this->diafan->is_variable("image"))
				{
					$row_img = DB::query_fetch_array("SELECT name, folder_num FROM {images} WHERE element_id=%d AND module_name='%s' AND element_type='element' AND trash='0' ORDER BY sort ASC LIMIT 1", $row["id"], $this->diafan->table);
				}
				echo '
				<div class="rel2_element" element_id="'.$this->diafan->id.'" rel2_id="'.$row["id"].'">'
					.(! empty($row_img) ? '<img src="'.BASE_PATH.USERFILES.'/small/'.($row_img["folder_num"] ? $row_img["folder_num"].'/' : '').$row_img["name"].'">' : '').$this->diafan->short_text($row[$name], 50)
					.'
					<div class="rel2_element_actions">
						<a href="'.BASE_PATH.$link.'" target="_blank"><i class="fa fa-laptop"></i> '.$this->diafan->_('Посмотреть на сайте').'</a>
						<a href="javascript:void(0)" confirm="'.$this->diafan->_('Вы действительно хотите удалить запись?').'" action="delete_rel2_element" class="delete"><i class="fa fa-times-circle"></i> '.$this->diafan->_('Удалить').'</a>
					</div>
				</div>';
			}
		}
		echo '</div>
			<a href="javascript:void(0)" class="rel2_module_plus btn btn_small btn_blue plink">
				<i class="fa fa-plus-square"></i> '.$this->diafan->_('Добавить').'
			</a>
			<div class="hide ipopup" id="rel2_module_container"></div>
		</div>';
	}


}
