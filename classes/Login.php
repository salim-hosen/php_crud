<?php
  require_once "lib/Session.php";
  class Login{
    private $db;
    private $valid;
    public function __construct($db,$validate){
      $this->db = $db;
      $this->valid = $validate;
    }

    public function matchLogin(){
      $this->valid->validate('username')->isEmpty();
      $this->valid->validate('password')->isEmpty();

      $username = $this->valid->value['username'];
      $password = $this->valid->value['password'];

      if($this->valid->submit()){
        $data = array("username" => $username,"pass" => md5($password));
        $sql = "select * from tbl_register where username=:username and pass=:pass";
        $res = $this->db->select($sql,$data);
        if($res){
          Session::init();
          Session::set("login",true);
          Session::set("username",$res[0]['username']);
          Session::set("userId",$res[0]['id']);
          echo "success";
          exit();
        }else{
          echo "Username and Password didn't Match.";
          exit();
        }
      }
    }
  }
?>
