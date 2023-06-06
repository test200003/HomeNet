<?php
require_once(ROOT_PATH . '/Models/Db.php');
class Goal extends Db
{
  private $table = 'goals';

  public function __construct($dbh = null)
  {
    parent::__construct($dbh);
  }

  public function goalhistory($id = 0): array
  {
    $sql = 'SELECT g.goal_time AS "goaltime",c.name AS "enemy",p.kickoff FROM goals g
    LEFT JOIN pairings p ON p.id = g.pairing_id
    LEFT JOIN countries c ON c.id = p.enemy_country_id
    WHERE g.player_id = :id ORDER BY kickoff, goaltime';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);

    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
