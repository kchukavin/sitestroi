
Передаём в форму значение поля с именем товара:

echo $this->htmleditor('<insert name="show_form" module="feedback" site_id="78" val1="Хотят узнать о: '. strip_tags($result['name']) .'">');
