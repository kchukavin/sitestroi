<?php


class GetPageData
{
	protected function getUrl()
	{
		$request = trim($_SERVER['REDIRECT_URL'], '/');
		return $request . '_data';
	}
	
	public function getProp($name)
	{
		return DB::query_result("SELECT s.[". $name ."] FROM {rewrite} as r, {site} as s WHERE r.rewrite = '%s' and r.module_name = 'site' and r.element_id = s.id", $this->getUrl());
	}
}

