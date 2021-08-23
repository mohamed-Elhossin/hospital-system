<?php
  include '../shared/head.php';
     include '../shared/nav.php';
     include '../genral/configDB.php';
     include '../genral/functions.php';
if (isset($_POST['regist'])) {
    $name = $_POST['userName'];
    $password = $_POST['password'];
    $role = $_POST['role'];
     $insert = "INSERT INTO `admin` VALUES (NULL, '$name', '$password' , $role) ";
    $i = mysqli_query($conn, $insert);
    header("location:/hospital/admin/login.php");
}
auth(0);
    ?>
<h1 class="text-center text-primary display-2 b pt-5">Registration Page</h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="from-group">
                 <label for=""> Admin Name</label>
                 <input type="text" name="userName" class="form-control">
                </div>
                <div class="from-group">
                 <label for=""> Admin Password</label>
                 <input type="text" name="password" class="form-control">
                </div>
                <div class="from-group">
                 <label for=""> Admin Role</label>
                <select name="role"  class="form-control">
              <option value="0"> All Access</option>
              <option value="1"> ALL Access Without admin</option>
              <option value="2"> Simi Access</option>
                </select>
                </div>
                <button name="regist" class="btn btn-danger m-3 mx-auto w-50 btn-block"> Login</button>

            </form>
        </div>
    </div>
</div>


 <?php
 include '../shared/script.php';?>