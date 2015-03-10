<?php
  $title = $news->clearStr($_POST['title']);
  $cat = $news->clearInt($_POST['category']);
  $desc = $news->clearStr($_POST['description']);
  $source = $news->clearStr($_POST['source']);

  if(empty($title) || empty($desc) || empty($source) ) {
    $errMsg = 'Заполните все поля формы';
  } else {
      if(!$news->saveNews($title, $cat, $desc, $source)) {
        $errMsg='Ошибка при записи';
      }else {
        header('Location: news.php');
        exit;
      }
  }
?>