<?php 
  include '../shared/head.php';
     include '../shared/nav.php';
     include '../genral/configDB.php';
     include '../genral/functions.php';
if (isset($_POST['login'])) {
    $userName=   $_POST['userName'];
    $password=   $_POST['password'];
    $select= "SELECT * from `admin` WHERE name = '$userName' AND password = '$password' ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $num = mysqli_num_rows($s);
    if ($num > 0) {
        echo "<h1 class='text-center text-primary  b pt-5'> True Admin</h1 ";
        $_SESSION['admin'] =  $userName;
        $_SESSION['role']=  $row['role'];
       header("location:/hospital/");
    } else {
        echo "<h1 class='text-center text-primary  b pt-5'> False Admin</h1>
    ";
    }
    //  Row == 1 OR == 0
}


?>
<h1 class="text-center text-primary display-2 b pt-5">Login Page</h1>

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
                <button name="login" class="btn btn-danger m-3 mx-auto w-50 btn-block"> Login</button>

            </form>
        </div>
    </div>
</div>
<?php include '../shared/script.php' ?>