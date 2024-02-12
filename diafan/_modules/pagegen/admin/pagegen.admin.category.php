<?php
/**
 * Редактирование категорий
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

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

/**
 * Pagegen_admin_category
 */
class Pagegen_admin_category extends Frame_admin
{
	/**
	 * @var string таблица в базе данных
	 */
	public $table = 'pagegen_category';

	/**
	 * @var array поля в базе данных для редактирования
	 */
	public $variables = array (
		'main' => array (
			'name' => array(
				'type' => 'text',
				'name' => 'Название',
				'help' => 'Используется в ссылках на категорию, заголовках.',
				'multilang' => true,
			),
			'act' => array(
				'type' => 'checkbox',
				'name' => 'Опубликовать на сайте',
				'help' => 'Если не отмечена, категорию не увидят посетители сайта.',
				'default' => true,
				'multilang' => true,
			),
			'params' => array(
				'type' => 'textarea',
				'name' => 'Параметры',
				'help' => 'Варианты параметров в JSON',
				'multilang' => false,
			),
			'hr2' => 'hr',
			'map' => array(
				'type' => 'module',
				'name' => 'Индексирование для карты сайта',
				'help' => 'Категория автоматически индексируется для карты сайта sitemap.xml.',
			),
		),
		'other_rows' => array (
			'site_id' => array(
				'type' => 'function',
				'name' => 'Раздел сайта',
				'help' => 'Перенос категории на другую страницу сайта, к которой прикреплен модуль (администратору сайта).',
			),			
			'title_seo' => array(
				'type' => 'title',
				'name' => 'Параметры SEO',
			),
			'title_meta' => array(
				'type' => 'text',
				'name' => 'Заголовок окна в браузере, тег Title',
				'help' => 'Если не заполнен, тег *Title* будет автоматически сформирован как «Название категории – Название страницы – Название сайта», либо согласно шаблонам автоформирования из настроек модуля (SEO-специалисту).',
				'multilang' => true,
			),
			'keywords' => array(
				'type' => 'textarea',
				'name' => 'Ключевые слова, тег Keywords',
				'help' => 'Если не заполнен, тег *Keywords* будет автоматически сформирован согласно шаблонам автоформирования из настроек модуля (SEO-специалисту).',
				'multilang' => true,
			),
			'descr' => array(
				'type' => 'textarea',
				'name' => 'Описание, тег Description',
				'help' => 'Если не заполнен, тег *Description* будет автоматически сформирован согласно шаблонам автоформирования из настроек модуля (SEO-специалисту).',
				'multilang' => true,
			),
			'name_tpl' => array(
				'type' => 'text',
				'name' => 'Название страницы (Шаблон для страниц)',
				'help' => '',
				'multilang' => false,
			),
			'title_meta_tpl' => array(
				'type' => 'text',
				'name' => 'Заголовок окна в браузере, тег Title (Шаблон для страниц)',
				'help' => '',
				'multilang' => false,
			),
			'keywords_tpl' => array(
				'type' => 'textarea',
				'name' => 'Ключевые слова, тег Keywords (Шаблон для страниц)',
				'help' => '',
				'multilang' => false,
			),
			'descr_tpl' => array(
				'type' => 'textarea',
				'name' => 'Описание, тег Description (Шаблон для страниц)',
				'help' => '',
				'multilang' => false,
			),
			'canonical' => array(
				'type' => 'text',
				'name' => 'Канонический тег',
				'help' => 'URL канонической страницы вида: *http://site.ru/psewdossylka/*, на которую переносится "ссылочный вес" данной страницы. Используется для страниц с похожим или дублирующимся контентом (SEO-специалисту).',
				'multilang' => true,
			),
			'rewrite' => array(
				'type' => 'function',
				'name' => 'Псевдоссылка',
				'help' => 'ЧПУ, т.е. адрес страницы вида: *http://site.ru/psewdossylka/*. Смотрите параметры сайта (SEO-специалисту).',
			),
			'noindex' => array(
				'type' => 'checkbox',
				'name' => 'Не индексировать',
				'help' => 'Запрет индексации текущей страницы, если отметить, у страницы выведется тег: `<meta name="robots" content="noindex">` (SEO-специалисту).'
			),
			'changefreq' => array(
				'type' => 'function',
				'name' => 'Changefreq',
				'help' => 'Вероятная частота изменения этой страницы. Это значение используется для генерирования файла sitemap.xml. Подробнее читайте в описании [XML-формата файла Sitemap](http://www.sitemaps.org/ru/protocol.html) (SEO-специалисту).',
			),
			'priority' => array(
				'type' => 'floattext',
				'name' => 'Priority',
				'help' => 'Приоритетность URL относительно других URL на Вашем сайте. Это значение используется для генерирования файла sitemap.xml. Подробнее читайте в описании [XML-формата файла Sitemap](http://www.sitemaps.org/ru/protocol.html) (SEO-специалисту).',
			),
			'title_show' => array(
				'type' => 'title',
				'name' => 'Параметры показа',
			),
			'sort' => array(
				'type' => 'function',
				'name' => 'Сортировка: установить перед',
				'help' => 'Редактирование порядка следования категории в списке. Поле доступно для редактирования только для категорий, отображаемых на сайте.',
			),
			'title_view' => array(
				'type' => 'title',
				'name' => 'Шаблоны',
			),
			'theme' => array(
				'type' => 'function',
				'name' => 'Шаблон страницы',
				'help' => 'Возможность подключить для страницы категории шаблон сайта отличный от основного (themes/site.php). Все шаблоны для сайта должны храниться в папке *themes* с расширением *.php* (например, themes/dizain_so_slajdom.php). Подробнее в [разделе «Шаблоны сайта»](http://www.diafan.ru/dokument/full-manual/templates/site/). (веб-мастеру и программисту, не меняйте этот параметр, если не уверены в результате!).',
			),
			'view' => array(
				'type' => 'function',
				'name' => 'Шаблон модуля',
				'help' => 'Шаблон вывода контента модуля на странице списка новостей в категории (веб-мастеру и программисту, не меняйте этот параметр, если не уверены в результате!).',
			),
			'view_rows' => array(
				'type' => 'function',
				'name' => 'Шаблон списка элементов',
				'help' => 'Шаблон вывода контента модуля на странице элементов списка в категории (веб-мастеру и программисту, не меняйте этот параметр, если не уверены в результате!). Значение параметра важно для AJAX.',
			),
			'view_element' => array(
				'type' => 'function',
				'name' => 'Шаблон страницы элемента',
				'help' => 'Шаблон вывода контента модуля на странице отдельной новости, вложенной в текущую категорию (веб-мастеру и программисту, не меняйте этот параметр, если не уверены в результате!).',
			),
			'view_gen' => array(
				'type' => 'function',
				'name' => 'Шаблон генерируемой страницы элемента',
				'help' => 'Шаблон вывода контента модуля на странице отдельной новости, вложенной в текущую категорию (веб-мастеру и программисту, не меняйте этот параметр, если не уверены в результате!).',
			),
			
		),
	);

	/**
	 * @var array поля в списка элементов
	 */
	public $variables_list = array (
		'checkbox' => '',
		'sort' => array(
			'name' => 'Сортировка',
			'type' => 'numtext',
			'sql' => true,
			'fast_edit' => true,
		),
		'name' => array(
			'name' => 'Название'
		),
		'count' => array(
            'type' => 'function',
			'name' => 'Количество страниц'
		),
		'control' => array(
            'type' => 'function',
			'name' => 'Управление'
		),
		'actions' => array(
			'view' => true,
			'act' => true,
			'trash' => true,
		),
	);

	/**
	 * @var array настройки модуля
	 */
	public $config = array (
		'category', // часть модуля - категории
		'element_site', // делит элементы по разделам (страницы сайта, к которым прикреплен модуль)
	);

	/**
	 * Выводит ссылку на добавление
	 * @return void
	 */
	public function show_add()
	{
		$this->diafan->addnew_init('Добавить категорию');
	}

	/**
	 * Выводит список категорий
	 * @return void
	 */
	public function show()
	{
		$this->diafan->list_row();
	}

	/**
	 * Выводит количество страниц
	 *
	 * @param array $row информация о текущем элементе списка
	 * @param array $var текущее поле
	 * @return string
	 */
	public function list_variable_count($row, $var)
	{
        $text = '<div>';
        $text .= DB::query_result("SELECT count(*) FROM {pagegen} WHERE cat_id=%d AND site_id=%d", $row['id'], $row['site_id']);
        $text .= '</div>';

		return $text;
	}

	/**
	 * Выводит управление
	 *
	 * @param array $row информация о текущем элементе списка
	 * @param array $var текущее поле
	 * @return string
	 */
	public function list_variable_control($row, $var)
	{
        $text = '<div>';
        $text .= '<div><a href="javascript:void(0)" action="generate" module="pagegen" class="action" site_id="'.$row['site_id'].'">Генерировать</a></div>';
        $text .= '<div><a href="javascript:void(0)" action="clear" module="pagegen" class="action" site_id="'.$row['site_id'].'">Очистить</a></div>';
        $text .= '</div>';

		return $text;
	}

	/**
	 * Редактирование поля "Шаблон генерируемой страницы"
	 * @return void
	 */
	public function edit_variable_view_gen()
	{
		$view_element = $this->diafan->values("view_gen");
		// значения для нового элемента передаются от родителя
		if($this->diafan->is_new && $this->diafan->variable_list('plus') && $this->diafan->_route->parent)
		{
			if(! isset($this->cache["parent_row"]))
			{
				$this->cache["parent_row"] = DB::query_fetch_array("SELECT * FROM {".$this->diafan->table."} WHERE id=%d LIMIT 1", $this->diafan->_route->parent);
			}
			if(! empty($this->cache["parent_row"]["view_element"]))
			{
				$view_element = $this->cache["parent_row"]["view_element"];
			}
		}
		$views = $this->diafan->get_views($this->diafan->_admin->module);
		if($this->diafan->is_new)
		{
			$site_id = $this->diafan->_route->site;
		}
		else
		{
			$site_id = $this->diafan->values('site_id');
		}
		if(! $general_selected = $this->diafan->configmodules("view_id", $this->diafan->_admin->module, $site_id))
		{
			$general_selected = 'id_gen';
		}

		echo '<div class="unit" id="view_gen">
			<div class="infofield">
				'.$this->diafan->variable_name().$this->diafan->help().'
			</div>';
			echo '
			<select name="view_gen" style="width:250px">
				<option value="">'.(! empty($views[$general_selected]) ? $views[$general_selected] : $this->diafan->_admin->module.'.view.id_gen.php').'</option>';
			foreach ($views as $key => $value)
			{
				if ($key == $general_selected)
				{
					continue;
				}
				echo '<option value="'.$key.'"'.($view_element == $key ? ' selected' : '' ).'>'.$value.'</option>';
			}
			echo '</select>
		</div>';
	}

}
