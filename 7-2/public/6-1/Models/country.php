<?php
require_once(ROOT_PATH . '/Models/Db.php');
class Country extends Db
{
  public function __construct($dbh = null)
  {
    parent::__construct($dbh);
  }
  public function country_id(): array
  {
    $sql = 'SELECT id, name FROM countries';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
