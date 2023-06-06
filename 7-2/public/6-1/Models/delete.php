<?php
require_once(ROOT_PATH . '/Models/Db.php');
class Delete extends Db
{
  public function __construct($dbh = null)
  {
    parent::__construct($dbh);
  }
  public function logical_del($id = 0)
  {
    $sql = 'UPDATE players SET del_flg = 1
    WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
  }
}
