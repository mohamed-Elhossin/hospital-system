<?php 



function testMessage($condation , $mess){
    if($condation){
        echo "<div class='col-6 mx-auto mt-5   alert alert-info'>
   <h1 class='text-center'>     $mess IS True </h1>
        </div>
        ";
    }else{
        echo "<div class='col-6 mx-auto mt-5   alert alert-danger'>
        <h1 class='text-center'>     $mess IS Fasle </h1>
             </div>
             ";
    }

}

function auth($role  ,$role2 = 0){
    if ($_SESSION['admin']) {
        if($_SESSION['role'] == $role || $_SESSION['role'] == 0 || $_SESSION['role'] == $role2  ){
        }else{
            header("location: /hospital/admin/login.php");
        }
    } else {
        header("location: /hospital/admin/login.php");
    }
}

?>