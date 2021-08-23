<?php include '../shared/head.php';
     include '../shared/nav.php';
     include '../genral/configDB.php';
     include '../genral/functions.php';

    $select = "SELECT fileds.filed filed , doctors.id  ,doctors.name  FROM doctors JOIN fileds 
ON doctors.filedID = fileds.id";
    $s = mysqli_query($conn, $select);

   if (isset($_GET['delete'])) {
       $id= $_GET['delete'];
       $delete = "DELETE FROM doctors WHERE id = $id";
       $d= mysqli_query($conn, $delete);
       testMessage($d, "DELETE");
   }
   auth(1);
?>
<h1 class="text-center text-primary display-1 b pt-5"> Liss Doctors</h1>


<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Filed ID</th>
                    <th> Action </th>
                </tr>
                <?php foreach ($s as $doctor) { ?>
                <tr>
                    <td><?php  echo $doctor['id'];?> </td>
                    <td><?php  echo $doctor['name'];?> </td>
                    <td><?php  echo $doctor['filed'];?> </td>
                    <td> <a href="listDoctors.php?delete=<?php echo $doctor['id']?>" class="btn btn-danger">Delete </a> 
                  <a href="/hospital/doctors/addDoctors.php?edit=<?php echo $doctor['id']?>" class="btn btn-info">Edit </a> 
                </td>
              

                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>


<?php include '../shared/script.php' ?>