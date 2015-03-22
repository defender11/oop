<?php
  include "INewsDB.class.php";

class NewsDB implements INewsDB {
  const DB_NAME = 'news.db';
  const RSS_NAME = "rss.xml";
  const RSS_TITLE = "Новостная лента";
  const RSS_LINK = "http://oop/public_html/news/news.php";

  protected $_db;

  public function __construct () {
    if (!is_file(self::DB_NAME)) {
      $this->_db = new SQLite3(self::DB_NAME);

      $sql = "CREATE TABLE msgs(
                                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                                        title TEXT,
                                        category INTEGER,
                                        description TEXT,
                                        source TEXT,
                                        datetime INTEGER
                                      )";
      $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
      $sql = "CREATE TABLE category(
                                        id INTEGER,
                                        name TEXT
                                      )";
      $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
      $sql = "INSERT INTO category(id, name)
                                SELECT 1 as id, 'Политика' as name
                                UNION SELECT 2 as id, 'Культура' as name
                                UNION SELECT 3 as id, 'Спорт' as name";
      $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
    } else {
      $this->_db = new SQLite3(self::DB_NAME);
    }
  }

  public function __destruct () {
    unset($this->_db);
  }

  public function clearStr($data){
    $data = trim(strip_tags($data));
    return $this->_db->escapeString($data);
  }
  public function clearInt($data){
    return abs((int)$data);
  }

  public function saveNews($title, $category, $description, $source) {
    try {
      $dt = time();
      $sql = "INSERT INTO msgs (title, category, description, source, datetime) VALUES ('$title', $category, '$description', '$source', $dt)";
      $res = $this->_db->query($sql);
      if(!$this->_db->lastErrorMsg())
        throw new Exception ($this->_db->lastErrorMsg());
      $this->createRSS();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  protected function db2Arr($data) {
      $arr = array();
      while ($row = $data->fetchArray(SQLITE3_ASSOC))
          $arr[] = $row;
      return $arr;
  }

  public function getNews() {
    try{
      $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime FROM msgs, category WHERE category.id=msgs.category ORDER BY msgs.id DESC";
      $res = $this->_db->query($sql);
      if(!$res)
        throw new Exception ($this->_db->lastErrorMsg());
      return $this->db2Arr($res);
    } catch (Exception $e) {
      return false;
    }
  }

  public function deleteNews($id) {
    try {
      $sql = "DELETE FROM msgs WHERE id=$id";
      $res = $this->_db->query($sql);

      if (!$res)
        throw new Exception($this->_db->lastErrorMsg());
      return true;
    }catch (Exception $e) {
      // $e->getMessage();
      return false;
    }
  }
  public function createRSS() {
    $dom = new DomDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;
    $dom->preserveWhiteSpace = false;
    $rss = $dom->createElement('rss');
    $dom->appendChild($rss);
    $channel = $dom->createElement('channel');
    $rss->appendChild($channel);
    $title = $dom->createElement('title', self::RSS_TITLE);
    $link = $dom->createElement('link', self::RSS_LINK);
    $channel->appendChild($title);
    $channel->appendChild($link);
    $lenta = $this->getNews();
    if (!$lenta) return false;
    foreach ($lenta as $item) {
      $i = $dom->createElement('item');
      $title = $dom->createElement('title', $item['title']);
      $category = $dom->createElement('category', $item['category']);
      $description = $dom->createElement('description', $item['description']);
      $txt = self::RSS_LINK.'?id='.$item['id'];
      $link = $dom->createElement('link', $txt);
      $dt = date('r', $item['datetime']);
      $pd = $dom->createElement('pubDate', $dt);
      $i->appendChild($title);
      $i->appendChild($link);
      $i->appendChild($description);
      $i->appendChild($pd);
      $i->appendChild($category);
      $channel->appendChild($i);
    }
    $dom->save(self::RSS_NAME);


  }
}

?>