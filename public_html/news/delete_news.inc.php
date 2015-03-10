<?php
    $idDel = $news->clearInt($_GET['del']);
    if($idDel) {
      if(!$news->deleteNews($idDel))
         $errMsg='Не удалось удалить, проблема с базой данных';
      header('Location: news.php');
  }

?>