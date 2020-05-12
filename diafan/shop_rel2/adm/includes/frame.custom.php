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
 * Frame_admin
 *
 * Каркас административной части
 */
class Frame_admin extends Diafan
{

	replace public function init()
	{
		Custom::inc("adm/includes/theme.php");

		$this->diafan->prepare_config();
		$this->legacy();

		if(empty($_POST["id"]) && ! empty($_POST["group_action"]))
		{
			$_SESSION["group_action"][$this->diafan->_admin->rewrite] = $_POST["group_action"];
		}
		if (! empty($_POST["action"]))
		{
			if(! empty($_POST["module"]))
			{
				Custom::inc("adm/includes/action.php");
				$this->action_object = new Action_admin($this->diafan);
				$this->action_object->init();
			}
			else
			{
				switch ($_POST["action"])
				{
					case 'save':
						Custom::inc("adm/includes/save.php");
						$this->action_object = new Save_admin($this->diafan);
						$this->diafan->set_get_nav();
						$this->diafan->save();
						return;
	
					case 'validate':
						Custom::inc("adm/includes/validate.php");
						$this->action_object = new Validate_admin($this->diafan);
						$this->validate();
						return;
	
					case 'trash':
					case 'delete':
						Custom::inc("adm/includes/del.php");
						$this->action_object = new Del_admin($this->diafan);
						$this->diafan->del();
						return;
	
					case 'restore':
						Custom::inc("adm/includes/del.php");
						$this->action_object = new Del_admin($this->diafan);
						$this->diafan->restore();
						return;
	
					case 'unblock':
					case 'block':
						Custom::inc("adm/includes/act.php");
						$this->action_object = new Act_admin($this->diafan);
						$this->act();
						return;
	
					case 'move':
						Custom::inc("adm/includes/move.php");
						$this->action_object = new Move_admin($this->diafan);
						$this->move();
						return;
	
					case 'move_parent':
						Custom::inc("adm/includes/move.php");
						$this->action_object = new Move_admin($this->diafan);
						$this->move_parent();
						return;
	
					case 'move_page':
						Custom::inc("adm/includes/move.php");
						$this->action_object = new Move_admin($this->diafan);
						$this->move_page();
						return;
	
					case 'show_rel_elements':
						$this->_theme = new Theme_admin($this->diafan);
	
					case 'rel_elements':
					case 'delete_rel_element':
						Custom::inc("adm/includes/rel_elements.php");
						$this->action_object = new Rel_elements_admin($this->diafan);
						$this->ajax();
                        
                    case 'show_rel2_elements':
						$this->_theme = new Theme_admin($this->diafan);
	
					case 'rel2_elements':
					case 'delete_rel2_element':
						Custom::inc("adm/includes/rel2_elements.php");
						$this->action_object = new rel2_elements_admin($this->diafan);
						$this->ajax(); 
                        
					case 'auth':
						break;
	
					default:
						Custom::inc("adm/includes/action.php");
						$this->action_object = new Action_admin($this->diafan);
						$this->diafan->set_get_nav();
						$this->action_object->init();
				}
			}
		}

		$this->_theme = new Theme_admin($this->diafan);

		// если конфигурация, то открывается форма редактирования
		$this->diafan->config("only_edit", $this->diafan->config("config") || $this->diafan->config("only_edit"));

		if ($this->diafan->is_action("edit"))
		{
			Custom::inc("adm/includes/edit.php");
			$this->action_object = new Edit_admin($this->diafan);
			$this->diafan->set_get_nav();
			ob_start();
			$this->edit();
			$this->module_contents = ob_get_contents();
			ob_end_clean();
		}
		else
		{
			Custom::inc("adm/includes/show.php");
			$this->action_object = new Show_admin($this->diafan);
			if($this->diafan->_users->id)
			{
				if (! empty($_POST['ajax']) && $_POST['ajax'] == 'expand')
				{
					$this->ajax_expand();
				}
				ob_start();
				$this->prepare_variables();
				$this->diafan->set_get_nav();
				$this->show();
				$this->module_contents = ob_get_contents();
				ob_end_clean();
			}
		}
		$this->show_theme();
	}


}