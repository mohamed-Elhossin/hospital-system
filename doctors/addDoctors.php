<?php include '../shared/head.php';
     include '../shared/nav.php';
     include '../genral/configDB.php';
     include '../genral/functions.php';

     if (isset($_POST['send'])) {
         $name = $_POST['name'];
         $filed = $_POST['filed'];

         $insert ="INSERT INTO `doctors` VALUES (NULL , '$name' , $filed)";
         $i =  mysqli_query($conn, $insert);
         testMessage($i, "Insert");
     }
// Select Fileds Table
$select = "SELECT * FROM fileds";
$s =  mysqli_query($conn, $select);

// Edit
$edit = false;
$name ="";
if (isset($_GET['edit'])) {
    $edit =true;
    $id = $_GET['edit'];
    $select = "SELECT * FROM doctors where id = $id";
    $ss =  mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $filed = $_POST['filed'];

        $update ="UPDATE `doctors` SET name= '$name' , filedID = $filed  where id = $id";
        $u =  mysqli_query($conn, $update);
        testMessage($u, "Updated");
    }
}
auth(1);
?>
<?php  if ($edit) :?>
<h1 class="text-center text-info display-2 b pt-5"> Edit Doctor : <?php echo $name?> </h1>
<?php else:?>
<h1 class="text-center text-primary display-2 b pt-5"> Add Doctor</h1>
<?php endif; ?>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="from-group">

                    <label for="">Doctor Name </label>
                    <input name="name" value="<?php echo $name?>" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="from-group">
                    <label>Filed ID </label>
                    <select name="filed" class="form-control">
                        <?php  foreach ($s as $fild) { ?>
                        <option value="<?php echo $fild['id']?>"> <?php echo $fild['filed']?> </option>
                        <?php }?>
                    </select>
                </div>
                <?php  if ($edit) :?>
                <button name="update" class="btn btn-danger m-3 mx-auto w-50 btn-block"> Update</button>
                <?php else: ?>
                <button name="send" class="btn btn-info m-3 mx-auto w-50 btn-block"> Send Data </button>
                <?php endif;?>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/script.php' ?>