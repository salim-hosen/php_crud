<?php

  class Employee{
    private $db;
    private $valid;
    public function __construct($db,$validate){
      $this->db = $db;
      $this->valid = $validate;
    }


    public function insertEmployee(){
        $this->valid->validate('em_id')->isEmpty();
        $this->valid->validate('name')->isEmpty()->checkLength();
        $this->valid->validate('id')->isEmpty()->onlyNum()->isIdExists();
        $this->valid->validate('phone')->isEmpty()->checkLength();
        $this->valid->validate('email')->isEmpty()->checkEmail()->isEmailExists();
        $this->valid->validate('designation')->isEmpty();

        if($this->valid->submit()){

          $sql = "insert into tbl_employee(name,id,phone,email,designation)values(:name,:id,:phone,:email,:designation)";

          $data = array(
            "name" => $this->valid->value['name'],
            "id" => $this->valid->value['id'],
            "phone" => $this->valid->value['phone'],
            "email" => $this->valid->value['email'],
            "designation" => $this->valid->value['designation']
          );

          $res = $this->db->insert($sql,$data);

          if($res){
            $allEmp = $this->getEmployeeList();
            if($allEmp){
              $html = $this->tableData($allEmp);
              echo $html;
              exit();
            }else{
              echo "No Employee Available.";
              exit();
            }
          }else{
            echo "Failed to Insert Employee Data.";
            exit();
          }
        }
    }

    public function tableData($allEmp){
      $html = "";
      foreach ($allEmp as $key) {
        $html .= "<tr><td>".$key['name']."</td>";
        $html .= "<td>".$key['id']."</td>";
        $html .= "<td>".$key['phone']."</td>";
        $html .= "<td>".$key['email']."</td>";
        $html .= "<td>".$key['designation']."</td>";
        $html .= "<td><button type='button' id='".$key['id']."' class='edit btn btn-success'>Edit</button></td>";
        $html .= "<td><button type='button' id='".$key['id']."' class='delete btn btn-danger'>Delete</button></td></tr>";
      }
      return $html;
    }

    public function numOfEmployee(){
      $sql = "select * from tbl_employee";
      $res = $this->db->countRow($sql);
      return $res;
    }

    public function getEmployeeList($start=0){
      $sql = "select * from tbl_employee order by em_id desc limit ".$start.",6";
      $res = $this->db->select($sql);
      return $res;
    }

    public function prevANDnext($start){
      $res = $this->getEmployeeList($start);
      if($res){
        $html = $this->tableData($res);
        echo $html;
        exit();
      }else{
        echo "fail";
        exit();
      }
    }

    public function getSearchdData(){
      $data = htmlspecialchars($_POST['search']);
      $sql = "select * from tbl_employee where
      name like '%".$data."%' or"." id like '%".$data."%' or".
      " phone like '%".$data."%' or"." email like '%".$data."%' or".
      " designation like '%".$data."%'";
      $res = $this->db->select($sql);
      if($res){
        $html = $this->tableData($res);
        echo $html;
        exit();
      }else{
        echo "fail";
        exit();
      }
    }

    public function removeEmpData(){
      $id = htmlspecialchars($_POST['id']);
      $data = array("id" => $id);
      $sql = "delete from tbl_employee where id = :id";
      $res = $this->db->delete($sql,$data);
      if($res){
        $allEmp = $this->getEmployeeList();
        if($allEmp){
          $html = $this->tableData($allEmp);
          echo $html;
          exit();
        }else{
          echo "No Employee Available.";
          exit();
        }
        exit();
      }else{
        echo "Couldn't Delete.";
        exit();
      }
    }

    public function getUpEmpData(){
      $id = htmlspecialchars($_POST['id']);
      $data = array("id" => $id);
      $sql = "select * from tbl_employee where id=:id";
      $res = $this->db->select($sql,$data);
      if($res){
        $json = json_encode($res[0]);
        echo $json;
        exit();
      }else{
        echo "fail";
        exit();
      }
    }

    public function updateEmpData(){
      $this->valid->validate('em_id')->isEmpty();
      $this->valid->validate('name')->isEmpty()->checkLength();
      $this->valid->validate('id')->isEmpty()->onlyNum()->isIdExists();
      $this->valid->validate('phone')->isEmpty()->checkLength();
      $this->valid->validate('email')->isEmpty()->checkEmail()->isEmailExists();
      $this->valid->validate('designation')->isEmpty();

      if($this->valid->submit()){

        $sql = "update tbl_employee set name=:name,id=:id,phone=:phone,email=:email,designation=:designation where em_id=:em_id";
        $data = array(
          "name" => $this->valid->value['name'],
          "id" => $this->valid->value['id'],
          "phone" => $this->valid->value['phone'],
          "email" => $this->valid->value['email'],
          "designation" => $this->valid->value['designation'],
          "em_id" => $this->valid->value['em_id']
        );

        $res = $this->db->update($sql,$data);
        if($res){
          echo "success";
          exit();
        }else{
          echo "fail";
          exit();
        }
      }
    }
  }
?>
