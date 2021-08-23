<?php include '../shared/head.php';
     include '../shared/nav.php';
     include '../genral/configDB.php';
     include '../genral/functions.php';

     $select = "SELECT * FROM fileds";
     $s =  mysqli_query($conn, $select);

   if (isset($_GET['delete'])) {
       $id= $_GET['delete'];
       $delete = "DELETE FROM fileds WHERE id = $id";
       $d= mysqli_query($conn, $delete);
       testMessage($d, "DELETE");
   }
   auth(1 , 2);
?>
<h1 class="text-center text-primary display-1 b pt-5"> Liss Doctors</h1>


<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>

                    <th> Action </th>
                </tr>
                <?php foreach ($s as $filed) { ?>
                <tr>
                    <td><?php  echo $filed['id'];?> </td>
                    <td><?php  echo $filed['filed'];?> </td>
                    <td> <a href="listFiled.php?delete=<?php echo $filed['id']?>" class="btn btn-danger">Delete </a>
                        <a href="addFiled.php?edit=<?php echo $filed['id']?>" class="btn btn-info">Edit </a>
                    </td>

                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>


<?php include '../shared/script.php' ?>