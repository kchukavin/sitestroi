	foreach ($result["rows"] as $row) //вывод полей из конструктора форм
	{
		if (strpos($row["text"], '//HIDDEN') !== false) {
			$val = '';
			if (preg_match('#//VALUE\:(\S+)\s?#', $row["text"], $m)) {
				$val = $result['attributes'][$m[1]];
			}
			echo '<input type="hidden" name="p'.$row["id"].'" value="'.$val.'">';
			continue;
		}
