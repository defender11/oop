<?php
header("Content-Type: text/html;charset=utf-8");
	// Создание парсера
	$sax = xml_parser_create('utf-8');
	// Назначение обработчиков начальных и конечных тегов
	xml_set_element_handler($sax, 'onStart', 'onEnd');
	//  Назначение обработчика текстового содержимого
	xml_set_character_data_handler($sax, 'onText');
	// Функция обработчик начальных тегов
	function onStart($parser, $tag, $attr) {
		if($tag != 'BOOK' and $tag != 'CATALOG')
			echo '<td>';
		if($tag == 'BOOK')
			echo '<tr>';
	}
	// Функция обработчик закрывающих тегов
	function onEnd($parser, $tag) {
		if($tag != 'BOOK' and $tag != 'CATALOG')
			echo '</td>';
		if($tag == 'BOOK')
			echo '</tr>';
	}
	// Функция обработчик текстового содержимого
	function onText($parser, $text) {
		echo $text;
	}
?>
<html>
	<head>
		<title>Каталог</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<h1>Каталог книг</h1>
	<table border="0" width="100%">
		<tr>
			<th>Автор</th>
			<th>Название</th>
			<th>Год издания</th>
			<th>Цена, руб</th>
		</tr>
	<?php
		xml_parse($sax, file_get_contents('catalog.xml'));
		xml_error_string(xml_get_error_code($sax));
	?>
	</table>
	</body>
</html>