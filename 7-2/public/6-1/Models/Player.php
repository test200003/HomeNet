<?php
require_once(ROOT_PATH . '/Models/Db.php');

class Player extends Db
{
  private $table = 'players';

  public function __construct($dbh = null)
  {
    parent::__construct($dbh);
  }




  public function findById($id = 0): array
  {
    $sql =
      'SELECT players.*,countries.name AS "country" FROM players   LEFT JOIN countries  ON countries.id =players.country_id ';
    $sql .= ' WHERE players.id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function findCountryId($page = 0): array
  {
    $sql =
      'SELECT players.*,countries.name AS "country" FROM players   LEFT JOIN countries  ON countries.id =players.country_id ';
    $sql .= ' WHERE country_id = :country_id';
    $sql .= ' LIMIT 20 OFFSET ' . (20 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':country_id', $_SESSION['country_id'], PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  public function countAll(): Int
  {
    $sql = 'SELECT count(*) as count FROM players';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
  }
  public function countId(): Int
  {
    $sql =
      'SELECT count(*) as count FROM players   LEFT JOIN countries  ON countries.id =players.country_id ';
    $sql .= ' WHERE country_id = :country_id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':country_id', $_SESSION['country_id'], PDO::PARAM_INT);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
  }
  public function findAll($page = 0): array
  {
    $sql = 'SELECT p.*,c.name AS "country" FROM players p JOIN countries c ON c.id = p.country_id
    WHERE del_flg = 0';
    $sql .= ' LIMIT 20 OFFSET ' . (20 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function delete_tmp()
  {
    $sql = 'DELETE FROM players_tmp';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
  }

  public function update_tmp()
  {
    $sql = 'INSERT INTO players_tmp SELECT c.name,p.uniform_num,p.position,p.name,p.club,p.birth,p.height,p.weight FROM players p
    LEFT JOIN countries c ON p.country_id = c.id AND del_flg = 0  ORDER BY p.id';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
  }
}
