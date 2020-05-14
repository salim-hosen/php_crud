<?php
  require_once "lib/Session.php";
  Session::init();
  Session::isLoginFalse("login");
  include "inc/header.php";
?>
<section style="width: 98%;margin:0 auto; overflow:hidden;">
        <div class="panel panel-default left_panel" style="width:40%;float:left;margin-right:2%;">
          <div class="panel-heading">
            <h4>Add Employee</h4>
          </div>
          <div class="panel-body">
            <form id="empForm" action="" method="post">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control"/>
              </div>
              <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" id="id" class="form-control"/>
                <input type="hidden" name="emid" id="emid" value="-1" class="form-control"/>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" id="phone" class="form-control"/>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="email" class="form-control"/>
              </div>
              <div class="form-group">
                <label>Designation</label>
                <input type="text" name="designation" id="designation" class="form-control"/>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" id="addEmp" class="btn btn-primary" value="Add"/>
              </div>
            </form>
          </div>
        </div>
        <div class="panel panel-default right_panel" style="width:58%;float:right;">
          <div class="panel-heading table_head">
            <h4>Employee List</h4>
            <span>Search: <input type="search" id="search"/></span>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-stripped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th colspan='2'>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(!empty($empList)){
                      foreach ($empList as $key) {
                  ?>
                  <tr>
                    <td><?php echo $key['name'];?></td>
                    <td><?php echo $key['id'];?></td>
                    <td><?php echo $key['phone'];?></td>
                    <td><?php echo $key['email'];?></td>
                    <td><?php echo $key['designation'];?></td>
                    <td><button type="button" class="edit btn btn-success"  id="<?php echo $key['id'];?>">Edit</button></td>
                    <td><button type="button" class="delete btn btn-danger" id="<?php echo $key['id'];?>">Delete</button></td>
                  </tr>
                  <?php
                      }
                    }else{
                      echo "<td colspan='7'>No Data Available.</td>";
                    }
                  ?>
                </tbody>
              </table>
              <div class="Pagination text-center">
                <input type="hidden" value="<?php echo $totPage;?>" id="totPage"/>
                <button type="button" id="prev" style="display:none;" class="btn btn-primary">Previous</button>
                <?php
                  if($totPage > 1){
                ?>
                <button type="button" id="next" class="btn btn-primary">Next</button>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="custom-modal">
        <div id="modal-content">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2>Update Employee</h2>
              <span id="close">&times;</span>
            </div>
            <div class="alert alert-danger upFail text-center" style="display:none;margin:0;"></div>
            <div class="alert alert-success upSuccess text-center" style="display:none;margin:0;"></div>
            <div class="panel-body" style="clear:both;">
              <form id="upEmpForm" action="" method="post">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="upname" id="upname" class="form-control"/>
                </div>
                <div class="form-group">
                  <label>ID</label>
                  <input type="text" name="upid" id="upid" class="form-control"/>
                  <input type="hidden" name="emid" id="emid" class="form-control"/>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="upphone" id="upphone" class="form-control"/>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="upemail" id="upemail" class="form-control"/>
                </div>
                <div class="form-group">
                  <label>Designation</label>
                  <input type="text" name="updesignation" id="updesignation" class="form-control"/>
                </div>
                <div class="form-group">
                  <input type="submit" name="update" id="upEmp" class="btn btn-success" value="Update"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <section id="confirm-box">
        <div id="box-content">
          <p>Are You Sure to Delete?</p>
          <input type="submit" id="yes" class="btn btn-success" value="Yes" />
          <input type="submit" id="no" class="btn btn-danger" value="No" />
        </div>
      </section>
<?php
  include "inc/footer.php";
?>
