<?php
require_once(ROOT_PATH . '/Models/Db.php');

class Users extends Db
{
  private $table = 'users';

  public function __construct($dbh = null)
  {
    parent::__construct($dbh);
  }

  public function signup()
  {
    $sql = 'INSERT INTO users (email,password,country_id) VALUES (:email,:password,:country_id)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
    $sth->bindValue(':country_id', $_POST['country_id'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function checkemail()
  {
    $sql = 'SELECT email FROM users WHERE email = :email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch();
    return $result;
  }

  public function login()
  {
    $sql = 'SELECT * FROM users WHERE email = :email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch();
    return $result;
  }

  public function adminrole()
  {
    $sql = 'UPDATE users SET role = 1 WHERE email = :email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->execute();
  }
}
