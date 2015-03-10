<?php
  $res = $news->getNews();
  $cnt = count($res);

  echo '<p>Всего последних новостей: '.$cnt.' </p>';
  if (!is_array($res)) {
      echo 'Проблема с выводом новостей';
      exit;
  }elseif ($cnt == 0 ) {
      echo 'Новостей нет';
      exit;
  }else {
  foreach ($res as $value) {
    $id = $value['id'];
    $title = $value['title'];
    $cat = $value['category'];
    $desc = nl2br($value['description']);
    $dt = date('d-m-Y H:i:s', $value['datetime']);

    echo <<<LABEL
    <hr>
    <h3>$title</h3>
    <p>$desc<br />[$cat] @ $dt </p>
    <p align='right'>
      <a href='news.php?del=$id'>Удалить</a>
    </p>
LABEL;
  }
}
?>