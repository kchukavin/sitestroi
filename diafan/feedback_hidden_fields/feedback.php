
Добавить передачу атрибута val1:

	public function show_form($attributes)
	{
		$attributes = $this->get_attributes($attributes, 'site_id', 'template', 'val1');
