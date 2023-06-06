<?php
require_once(ROOT_PATH . '/Models/Player.php');
require_once(ROOT_PATH . '/Models/Goal.php');
require_once(ROOT_PATH . '/Models/delete.php');
require_once(ROOT_PATH . '/Models/country.php');
require_once(ROOT_PATH . '/Models/Edit.php');
require_once(ROOT_PATH . '/Models/user.php');

class PlayerController
{
  private $Player;
  private $request;
  private $Goal;
  private $Delete;
  private $Edit;
  private $Users;

  public function  __construct()
  {
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;
    $this->Player = new Player();

    $dbh = $this->Player->get_db_handler();
    $this->Goal = new Goal($dbh);

    $dbh = $this->Player->get_db_handler();
    $this->Delete = new Delete($dbh);

    $dbh = $this->Player->get_db_handler();
    $this->Country = new Country($dbh);

    $dbh = $this->Player->get_db_handler();
    $this->Edit = new Edit($dbh);

    $this->Users = new Users($dbh);
  }
  public function index()
  {
    $page = 0;
    if (isset($this->request['get']['page'])) {
      $page = $this->request['get']['page'];
    }
    $players = $this->Player->findAll($page);
    $players_count = $this->Player->countAll();

    $params = [
      'players' => $players,
      'pages' => $players_count / 20
    ];
    return $params;
  }

  public function normal()
  {
    $page = 0;
    if (isset($this->request['get']['page'])) {
      $page = $this->request['get']['page'];
    }
    $players = $this->Player->findCountryId($page);
    $players_count = $this->Player->countId();

    $param = [
      'players' => $players,
      'pages' => $players_count / 20
    ];
    return $param;
  }

  public function view()
  {
    if (empty($this->request['get']['id'])) {
      echo '指定のパラメータが不正です。 このページを表示できません。 ';
      exit;
    }
    $player = $this->Player->findById($this->request['get']['id']);
    $params = [
      'player' => $player
    ];
    return $params;
  }

  public function goal()
  {
    if (empty($this->request['get']['id'])) {
      echo '指定のパラメータが不正です。 このページを表示できません。';
      exit;
    }
    $goal = $this->Goal->goalhistory($this->request['get']['id']);
    $g_params = [
      'goals' => $goal
    ];
    return $g_params;
  }

  public function delete()
  {
    if (!empty($this->request['post']['delete'])) {
      $this->Delete->logical_del($this->request['post']['delete']);
    }
  }
  public function country()
  {
    $country = $this->Country->country_id();
    $c_params = [
      'country' => $country
    ];
    return $c_params;
  }

  public function edit($id, $country, $uniform_num, $position, $name, $club, $birth, $height, $weight)
  {
    $this->Edit->edit_table($id, $country, $uniform_num, $position, $name, $club, $birth, $height, $weight);
  }

  public function tmp()
  {
    $this->Player->delete_tmp();
    $this->Player->update_tmp();
  }

  public function signup()
  {
    if (empty($this->request['post'])) {
      echo '指定のパラメータが不正です。このページを表示できません。';
      exit;
    }
    $users = $this->Users->signup($this->request['post']);
  }

  public function checkemail()
  {
    if (empty($this->request['post'])) {
      echo '指定のパラメータが不正です。このページを表示できません。';
      exit;
    }
    $users = $this->Users->checkemail($this->request['post']);
    $_SESSION['params'] = $users;
  }

  public function login()
  {
    if (empty($this->request['post'])) {
      echo '指定のパラメータが不正です。このページを表示できません。';
      exit;
    }
    $users = $this->Users->login($this->request['post']);
    $_SESSION['params'] = $users;
  }

  public function admin()
  {
    if (!empty($this->request['post'])) {
      $this->Users->adminrole($this->request['post']);
    }
  }
}
