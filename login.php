<?php
  require_once "lib/Session.php";
  Session::init();
  Session::isLoginTrue("login");
  include "inc/header.php";
?>
<section style="width: 35%;margin:0 auto; overflow:hidden;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Login Form</h3>
    </div>
    <div class="panel-body">
      <form id="loginForm" action="" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" id="username" class="form-control"/>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" id="password" class="form-control"/>
        </div>
        <div class="form-group">
          <input type="submit" name="login" id="login" class="btn btn-success" value="Login"/>
        </div>
      </form>
    </div>
  </div>
  <div class="alert alert-success">
	<p>Username: <b>demo</b></p>
	<p>Password: <b>password</b></p>
  </div>
</section>
<?php
  include "inc/footer.php";
?>
