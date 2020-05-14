<?php
  class Validate{
    protected $errors = array();
    protected $key;
    public $value = array();
    private $db;

    public function __construct($db){
      $this->db = $db;
    }

    public function validate($key){
      $this->key = $key;
      $this->value[$this->key] = trim($_POST[$this->key]);
      $this->value[$this->key] = stripcslashes($this->value[$this->key]);
      $this->value[$this->key] = htmlspecialchars($this->value[$this->key]);
      return $this;
    }

    public function isEmpty(){
      if(empty($this->value[$this->key])){
        $this->errors[$this->key] = "Input Field Should not be Empty.";
        echo $this->errors[$this->key];
        exit();
      }
      return $this;
    }

    public function checkLength(){
      if(strlen($this->value[$this->key])<5){
        $this->errors[$this->key] = ucfirst($this->key)." must be at least 5 characters long.";
        echo $this->errors[$this->key];
        exit();
      }
      return $this;
    }

    public function checkEmail(){
      if(!filter_var($this->value[$this->key],FILTER_VALIDATE_EMAIL)){
        $this->errors[$this->key] = "Invalid ".ucfirst($this->key)." Address.";
        echo $this->errors[$this->key];
        exit();
      }
      return $this;
    }

    public function isIdExists(){
        $sql = "select id from tbl_employee where id=:id and em_id != :em_id";
        $data = array("id" =>$this->value[$this->key],"em_id"=>$this->value['em_id']);
        $res = $this->db->select($sql,$data);

        if($res){
            $this->errors[$this->key] = ucfirst($this->key)." Already Exists.";
            echo $this->errors[$this->key];
            exit();
        }
        return $this;
    }

    public function isEmailExists(){
        $sql = "select email from tbl_employee where email=:email and em_id != :em_id";
        $data = array("email" =>$this->value[$this->key],"em_id"=>$this->value['em_id']);
        $res = $this->db->select($sql,$data);

        if($res){
            $this->errors[$this->key] = ucfirst($this->key)." Already Exists.";
            echo $this->errors[$this->key];
            exit();
        }
        return $this;
    }

    public function onlyNum(){
      if(!ctype_digit($this->value[$this->key])){
        echo "ID can Contains Numeric Character Only.";
        exit();
      }
      return $this;
    }

    public function submit(){
      if(empty($this->errors)){
        return true;
      }else{
        return false;
      }
    }

  }
?>
