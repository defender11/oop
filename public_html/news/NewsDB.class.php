<?php
  include "INewsDB.class.php";

class NewsDB implements INewsDB {
  const DB_NAME = 'news.db';
  protected $_db;

  public function saveNews($title, $category, $description, $source) {}
  public function getNews() {}
  public function deleteNews($id) {}

  public function __construct () {
    echo "Класс создан";
    $this->_db = new SQLite3(self::DB_NAME);
  }

  public function __destruct () {
    echo "<br />Класс удален";
    unset($this->_db);
  }
}

  $news = new NewsDB();

?>