<?php
require_once(ROOT_PATH . '/Models/Db.php');
class Edit extends Db
{
  public function __construct($dbh = null)
  {
    parent::__construct($dbh);
  }
  public function edit_table($id, $country, $uniform_num, $position, $name, $club, $birth, $height, $weight)
  {
    $sql =
    'UPDATE players SET country_id = :country,uniform_num = :uniform_num,position = :position,name = :name,club = :club,birth = :birth,height = :height,weight = :weight  WHERE id = :id';

    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->bindParam(':country', $country, PDO::PARAM_INT);
    $sth->bindParam(':uniform_num', $uniform_num, PDO::PARAM_INT);
    $sth->bindParam(':position', $position, PDO::PARAM_STR);
    $sth->bindParam(':name', $name, PDO::PARAM_STR);
    $sth->bindParam(':club', $club, PDO::PARAM_STR);
    $sth->bindParam(':birth', $birth, PDO::PARAM_STR);
    $sth->bindParam(':height', $height, PDO::PARAM_INT);
    $sth->bindParam(':weight', $weight, PDO::PARAM_INT);
    $sth->execute();
  }
}
