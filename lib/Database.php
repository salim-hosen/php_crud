<?php
  class Database{
    private $servername = "localhost";
    private $dbname     = "db_crud";
    private $username   = "root";
    private $password   = "";
    public $con = NULL;

    public function __construct(){
      $this->conDB();
    }

    public function conDB(){
      try{
        $this->con = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname,$this->username,$this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
      }
    }


    public function select($sql,$data=array()){
      $query = $this->con->prepare($sql);
      if(!empty($data) && is_array($data)){
        foreach ($data as $key => $value) {
          $query->bindValue(":$key",$value);
        }
      }
      $query->execute();
      $res = $query->fetchAll(PDO::FETCH_ASSOC);
      return $res?$res:false;
    }

    public function update($sql,$data=array()){
      $query = $this->con->prepare($sql);
      if(!empty($data) && is_array($data)){
        foreach ($data as $key => $value) {
          $query->bindValue(":$key",$value);
        }
      }
      $res = $query->execute();
      return $res?true:false;
    }

    public function countRow($sql,$data=array()){
      $query = $this->con->prepare($sql);
      if(!empty($data) && is_array($data)){
        foreach ($data as $key => $value) {
          $query->bindValue(":$key",$value);
        }
      }
      $query->execute();
      $res = $query->rowCount();
      return $res?$res:false;
    }

    public function insert($sql,$data=array()){
      $query = $this->con->prepare($sql);
      if(!empty($data) && is_array($data)){
        foreach ($data as $key => $value) {
          $query->bindValue(":$key",$value);
        }
      }
      $res = $query->execute();
      return $res?true:false;
    }

    public function delete($sql,$data=array()){
      $query = $this->con->prepare($sql);
      if(!empty($data) && is_array($data)){
        foreach ($data as $key => $value) {
          $query->bindValue(":$key",$value);
        }
      }
      $res = $query->execute();
      return $res?true:false;
    }

  }
?>
